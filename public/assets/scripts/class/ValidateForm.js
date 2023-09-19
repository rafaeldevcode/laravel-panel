'use strict';

/**
 * @since 1.0.0
 *
 * Validate fields form
 */
class ValidateForm{
    constructor(){
        this.fields = document.querySelectorAll('[required]');
    }

    /**
     * @returns {void}
     */
    init(){
        for(let field of this.fields){
            field.addEventListener('invalid', (event) => {
                event.preventDefault();
                this.customValidation(event);
            });

            if($(field).attr('type') !== 'checkbox' || $(field).attr('type') !== 'radio'){
                field.addEventListener('blur', (event) => this.customValidation(event));
            }
        }
    }

    /**
     *
     * @param {object} event
     */
    customValidation(event){
        let field = event.target;
        this.validateField(field);
    }

    /**
     * @since 1.0.0
     *
     * @param {*} field
     * @returns {void}
     */
    validateField(field){
        const error = this.verifyError(field);

        if(error){
            const message = this.customMessage(error, field);

            this.setCustomMessage(message, field);
        }else{
            this.setCustomMessage(false, field);
        }
    }

    /**
     *
     * @param {*} field
     * @returns {boolean}
     */
    verifyError(field){
        let foundError = false;

        for(let error in field.validity){
            if(field.validity[error] && !field.validity.valid){
                foundError = error;
            }
        }

        return foundError;
    }

    /**
     * @since 1.0.0
     *
     * @param {string} typeError
     * @param {*} field
     * @returns {string}
     */
    customMessage(typeError, field){
        const valueMissing = this.getMessage('valueMissing');

        const message = {
            text: {
                valueMissing: valueMissing
            },
            email: {
                valueMissing: valueMissing,
                typeMismatch: this.getMessage('typeMismatch')
            }
        }

        if(message[field.type]){
            return message[field.type][typeError];
        }else{
            return valueMissing;
        }
    }

    /**
     * @since 1.0.0
     *
     * @param {string} message
     * @param {*} field
     * @returns {void}
     */
    setCustomMessage(message, field){
        if(field){
            const spanError = field.parentNode.querySelector('span.validit');

            if(message){
                $(spanError).html(`${message} <i class="bi bi-x-circle-fill"></i>`);
                $(spanError).attr('data-valid', 'false')
            }else{
                $(spanError).html('Válido! <i class="bi bi-check-circle-fill"></i>');
                $(spanError).attr('data-valid', 'true')
            }
        }
    }

    /**
     * @since 1.0.0
     *
     * @param {string} phoneId
     * @returns {void}
     */
    validatePhoneNotEmpty(phoneId){
        document.getElementById(phoneId).addEventListener('input', (event) => {
            const phone = event.target;

            if(phone.value == ''){
                phone.required = false;
                phone.classList.add('telefone');
            }else{
                phone.required = true;
                phone.classList.remove('telefone');
            }
        });
    }

    /**
     * @since 1.0.0
     *
     * @param {string} typeMessage
     * @returns {string}
     */
    getMessage(typeMessage){
        const messages = {
            valueMissing: 'Por favor, preencha este campo!',
            typeMismatch: 'Por favor, digite um email válido!',
            formSentFailed: "Houve um erro inesperado ao realizar o envio!"
        }

        return messages[typeMessage];
    }
}
