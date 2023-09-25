'use strict';

const projectPath = '';

/**
 * @since 1.4.0
 *
 * @param {string} path
 * @returns {string}
 */
function route(path){
    const route = projectPath.length > 0 ? `/${projectPath}${path}` : path;

    return route;
}

function addSubmenu(){
    $('#is_submenu').on('click', () => {
        const submenus = document.querySelectorAll('[data-submenu]');

        submenus.forEach((sub) => {
            const status = $(sub).attr('data-submenu');
                if(status == 'true'){
                    $(sub).attr('data-submenu', false);
                    $(sub).find('input').attr('required', true);
                    $('#submenu').attr('required', true);
                }else{
                    $(sub).attr('data-submenu', true);
                    $(sub).find('input').attr('required', false);
                    $('#submenu').attr('required', false);
                }
        });
    });
}
addSubmenu();
