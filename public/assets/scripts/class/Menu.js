'use strict';

/**
 * Open and close menu, client and admin pages
 */
class Menu{
    /**
     * Open and close menu admin
     * 
     * @since 1.0.0
     * 
     * @param {object} element 
     * @return {void}
     */
    static admin(element){
        element.click((event) => {
            const width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    
            const menu = $('#menu');
            const aside = $('aside');
            const items = document.querySelectorAll('div[data-item-active]');
            const divBtn = $('#divClosed');
        
            if(width <= 750){
        
                if(event.target.checked){
                    menu.addClass('menuMobileOppen');
        
                    aside.attr('data-expanded', 'mobile-active');
                    divBtn.addClass('divClosed');
                    divBtn.attr('data-divbtn-closed', 'active');
        
                    Cookies.set('open_menu', true, 500000);
                }else{
                    menu.removeClass('menuMobileOppen');
                    divBtn.attr('data-divbtn-closed', 'desactive');
        
                    document.getElementById('checkbox-menu').checked = false;
        
                    setTimeout(()=>{
                        aside.attr('data-expanded', 'mobile-desactive');
                        divBtn.removeClass('divClosed');
                    }, 200);

                    Cookies.forget('open_menu');
                }
            }else{
        
                if(event.target.checked){
                    aside.attr('data-expanded', 'active');
        
                    items.forEach((item)=>{
                        $(item).parent().find('i').removeClass('iconManu');
        
                        $(item).removeClass('dNone');
                        $(item).attr('data-item-active', 'true');
                    });

                    Cookies.set('open_menu', true, 500000);
                }else{
                    aside.attr('data-expanded', 'desactive');
        
                    items.forEach((item)=>{
                        $(item).attr('data-item-active', 'false');
        
                        setTimeout(()=>{
                            $(item).parent().find('i').addClass('iconManu');
        
                            $(item).addClass('dNone');
                        }, 600);
                    });

                    Cookies.forget('open_menu');
                }
            }
        });
    }

    /**
     * Open and close menu client
     * 
     * @since 1.0.0
     * 
     * @returns {void}
     */
    static client(){
        $('#checkbox-menu').click((event) => {
            const nav = $(event.target).parent().parent().parent().find('nav');
            const ul = nav.find('ul');
    
            if(event.target.checked){
                nav.css('display', 'block');
                nav.attr('data-navclient-active', 'true');
                ul.attr('data-expanded-client', 'ative');
                $(event.target).parent().parent().addClass('fixed-close-menu');
            }else{
        
                nav.attr('data-navclient-active', 'false');
                ul.attr('data-expanded-client', 'inative');
                $(event.target).parent().parent().removeClass('fixed-close-menu');
                    
                setTimeout(() => {
                    nav.css('display', 'none');
                }, 200);
            }
        });
    }

    static checkIsOpen(){
        const width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
        const buttonMenu = $('#checkbox-menu');
        const aside = $('aside');
        const items = document.querySelectorAll('div[data-item-active]');
        const isOpen = Cookies.get('open_menu');
    
        if(width > 750){
            if(isOpen){
                buttonMenu.click();

                aside.attr('data-expanded', 'active');
            
                items.forEach((item)=>{
                    $(item).parent().find('i').removeClass('iconManu');
    
                    $(item).removeClass('dNone');
                    $(item).attr('data-item-active', 'true');
                });
            }
        }
    }
}
