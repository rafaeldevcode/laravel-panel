'use strict';

class PageBack{
    /**
     * Back previous page
     * 
     * @since 1.0.0
     * 
     * @param {string} element 
     * @return {void}
     */
    static init(element = '#back'){
        const pageBack = $(element);
    
        if(pageBack){
            pageBack.click((event)=>{
                event.preventDefault();
    
                history.back();
            });
        }
    }
}
