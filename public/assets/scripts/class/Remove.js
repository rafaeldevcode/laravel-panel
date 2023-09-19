'use strict';

/**
 * Remove items
 */
class Remove{
    /**
     * @returns {void}
     */
    constructor(){
        this.buttons = document.querySelectorAll('[data-button="delete"]');
    }

    /**
     * Start deletion process
     *
     * @since 1.0.0
     *
     * @returns {void}
     */
    init(){
        this.disableEnableButton();

        this.buttons.forEach((button) => {
            $(button).click((event) => {
                this.removeItem(event);
            });
        });

        $('[data-button="select-several"]').click((event) => {
            this.selectSeveral(event);
        });

        $('[data-button="delete-several"]').click((event) => {
            this.removeAllItems(event);
        });

        $('[data-button="delete-enable"').click(() => {
            this.disableEnableButton();
        });
    }

    /**
     * Open modal to confirm item deletion
     *
     * @since 1.0.0
     *
     * @param {object} event
     * @returns {void}
     */
    removeItem(event){
        const button = $(event.target).attr('data-button') ? event.target : event.target.parentNode;
        const route = $(button).attr('data-route');
        const message = $(button).attr('data-message-delete');
        const modalLabel = $('#modalDeleteItemLabel');
        const formSubmit = $('[data-submit="delete"]');
        const id = $(button).attr('data-delete-id');
        const input = $('<input />')
        input.attr({
            hidden: true,
            name: 'ids[]',
            value: id
        });

        this.removeInputs(formSubmit.find('input'));

        modalLabel.text(message);

        formSubmit.attr('action', route);
        formSubmit.attr('method', 'POST');
        formSubmit.append(input);

        Modal.open('delete');

        $('[data-submit="button"]').click(() => {
            formSubmit.submit();
        });
    }

    /**
     * Open modal to confirm the deletion of several items
     *
     * @since 1.0.0
     *
     * @param {object} event
     * @returns {void}
     */
    removeAllItems(event){
        const allItems = [];
        const button = event.target;
        const route = $(button).attr('data-route');
        const modalLabel = $('#modalDeleteItemLabel');
        const itemsDelete = document.querySelectorAll('[data-button="delete-enable"]');
        const message = $(itemsDelete[0]).attr('data-message-delete');
        const formSubmit = $('[data-submit="delete"]');

        this.removeInputs(formSubmit.find('input'));

        formSubmit.attr('action', route);
        formSubmit.attr('method', 'POST');

        itemsDelete.forEach((item)=>{
            if(item.checked){

                const input = $('<input />')
                    input.attr({
                        hidden: true,
                        name: 'ids[]',
                        value: $(item).val()
                    });

                    formSubmit.append(input);
            }
        });

        modalLabel.text(message);
        Modal.open('delete');

        $('[data-submit="button"]').click(() => {
            formSubmit.submit();
        });
    }

    /**
     * Select several items
     *
     * @param {object}
     * @returns {void}
     */
    selectSeveral(event){
        this.disableEnableButton();

        const input = event.target;
        const inputs = document.querySelectorAll('[data-button="delete-enable"]');
        const btnDeleteAll = $('#deleteAll');

        if(input.checked){
            inputs.forEach((input)=>{
                input.checked = true;
            });

            btnDeleteAll.attr('disabled', false);
        }else{
            inputs.forEach((input)=>{
                input.checked = false;
            });

            btnDeleteAll.attr('disabled', true);
        }
    }

    /**
     * Disable or enable delete button
     *
     * @since 1.0.0
     *
     * @returns {void}
     */
    disableEnableButton(){
        const inputs = document.querySelectorAll('[data-button="delete-enable"]');
        const btnDeleteAll = $('#deleteAll');
        const checkeds = [];

        inputs.forEach((input)=>{
            checkeds.push(input.checked);
        })

        if(this.inArray(true, checkeds)){
            btnDeleteAll.attr('disabled', false);
        }else{
            btnDeleteAll.attr('disabled', true);
        };
    }

    /**
     * Remove inputs from modal that has already been closed
     *
     * @since 1.0.0
     *
     * @param {object} inputs
     * @returns {void}
     */
    removeInputs(inputs){
        for (let i = 0; i < inputs.length; i++) {
            if($(inputs[i]).attr('name') !== '_token'){
                inputs[i].remove();
            }
        }
    }

    /**
     * Check if an item exists in an array
     *
     * @since 1.0.0
     *
     * @param {string} value
     * @param {array} array
     * @returns {boolean}
     */
    inArray(value, array) {
        var length = array.length;

        for(var i = 0; i < length; i++) {
            if(array[i] == value) return true;
        }

        return false;
    }
}
