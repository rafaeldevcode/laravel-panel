'use strict';

class Password{
    /**
     * Show passwords
     * 
     * @since 1.0.0
     * 
     * @param {string} elementsIds 
     * @returns {void}
     */
    static show(elementsIds) {
        const ids = document.querySelectorAll(elementsIds);
    
        ids.forEach((id) => {
            $(id).click((event) => {
                const inputPass = event.target.parentNode.parentNode.querySelector('input');
                const icone = $(event.target).attr('type') == 'button' ? $(event.target).find('i') : event.target;
    
                if(inputPass.type === 'password'){
                    $(inputPass).attr('type', 'text');
                    $(inputPass).removeClass('bi-eye-fill');
                    $(icone).addClass('bi-eye-slash-fill');
                }else{
                    $(inputPass).attr('type', 'password');
                    $(icone).removeClass('bi-eye-slash-fill');
                    $(icone).addClass('bi-eye-fill');
                }
            });
        })
    }
}
