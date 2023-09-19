'use strict';

/**
 * Search for information from a CNPJ
 */
class Cnpj{
    /**
     * @since 1.0.0
     * 
     * @param {object} elementClick 
     * @param {object} elementCnpj 
     * @returns {void}
     */
    constructor(elementClick, elementCnpj){
        this.elementClick = elementClick;
        this.elementCnpj = elementCnpj;
    }
    
    /**
     * Get information
     * 
     * @since 1.0.0
     * 
     * @returns {void}
     */
    getInfos(){
        this.elementClick.click(() => {
            let cnpj = this.elementCnpj.val();
            cnpj = cnpj.match(/[0-9]/gi);
            cnpj = cnpj !== null ? cnpj.join('') : ''; 

            if(cnpj.length == 14){
                $.ajax({
                    url: `https://www.receitaws.com.br/v1/cnpj/${cnpj}`,
                    type: 'GET',
                    crossDomain: true,
                    dataType: 'jsonp',
                    success: function(response){
                        if(response.status == 'ERROR'){
                            Message.create(response.message, 'danger');
                        }else{
                            $('#name_company').val(response.nome);
                            $('#street_company').val(response.logradouro);
                            $('[name="city_company"]').val(response.municipio);
                            $('#street_number_company').val(response.numero);
                            $('#neighborhood_company').val(response.bairro);
                            $('#cep_company').val(response.cep);
                            $('#complement_company').val(response.complemento);

                            const options = document.querySelector('#uf_company').querySelectorAll('option');

                            options.forEach((option) => {
                                if(option.value == response.uf) {
                                    $(option).attr('selected', true);
                                }
                            });
                        }
                    },
                    error: function(error) {
                        console.error(error);
                        Message.create('Houve um erro inesperado ao realizar a consulta!', 'danger');
                    },
                });
            }else{
                Message.create('O campo CNPJ está incompleto!', 'danger');
            }
        });
    }
}
