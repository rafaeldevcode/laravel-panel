'use strict';

/**
 * Hide or show icons for preloader
 */
class Preloader{
    /**
     * @since 1.2.0
     *  
     */
    static hide(){
        $('#preloader-section').removeClass('d-flex');
        $('#preloader-section').hide();
    }

    /**
     * @since 1.2.0
     *  
     * @returns {void}
     */
    static show(){
        $('#preloader-section').addClass('d-flex');
        $('#preloader-section').show();
    }
    
    /**
     * @since 1.0.0
     * 
     * @param {object} event 
     */
    static habilit(event){
        const boxPreloader = $('#box-preloader');

        if(event.target.checked){
            boxPreloader.slideDown();
        }else{
            boxPreloader.slideUp();
        }
    }
}
