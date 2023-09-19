'use strict';

/**
 * Search all cities and states in Brazil
 */
class Location{
    /**
     * Search all cities in Brazil
     * 
     * @since 1.0.0
     * 
     * @param {string|array} selector
     * @returns {void}
     */
    static citys(selector){
        selector = Array.isArray(selector) ? selector : [selector];
    
        $.get('https://servicodados.ibge.gov.br/api/v1/localidades/distritos?view=nivelado', (response) => {
            const citys = [];
    
            response.forEach((res) => {
                !citys.includes(res['municipio-nome']) ? citys.push(res['municipio-nome']) : null;
            });
    
            selector.forEach((item) => {
                citys.forEach((city) => {
                    const option = $('<option />');
                    option.text(city);
    
                    $(item).append(option);
                });
            });
        });
    }
    
    /**
     * Search all states in Brazil
     * 
     * @since 1.0.0
     * 
     * @returns {void}
     */
    static states(){
        $.get('https://servicodados.ibge.gov.br/api/v1/localidades/estados?view=nivelado', (response) => {
            response.forEach((state) => {
                const option = $('<option />');
                option.text(`${state['UF-nome']} - ${state['UF-sigla']}`);

                $('#uf').append(option);
            });
        });
    }
}
