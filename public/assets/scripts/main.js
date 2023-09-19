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
