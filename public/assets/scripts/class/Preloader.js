'use strict';

/**
 * Hide or show icons for preloader
 */
class Preloader{
    /**
     * @since 1.2.0
     *  
     * @param {object} type 
     * @returns {void}
     */
    static hide(type){
        $(`[data-preloader="${type}"]`).removeClass('flex');
        $(`[data-preloader="${type}"]`).hide();
    }

    /**
     * @since 1.2.0
     *  
     * @param {object} type 
     * @returns {void}
     */
    static show(type){
        $(`[data-preloader="${type}"]`).addClass('flex');
        $(`[data-preloader="${type}"]`).show();
    }
    
    /**
     * @since 1.6.0
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
