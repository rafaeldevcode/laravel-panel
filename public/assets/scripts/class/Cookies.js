'use strict';

/**
 * Get or set cookies
 */
class Cookies{
    /**
     * @since 1.0.0
     * 
     * @param {string} cname 
     * @param {string} cvalue 
     * @param {number} cexpires 
     * @param {string} cpath 
     * @return {void}
     */
    static set(cname, cvalue, cexpires, cpath = '/') {
        let cookie = `${cname}=${cvalue}`;
        let now = new Date();
        let time = now.getTime();
        let expireTime = time + 1000*cexpires;
            now.setTime(expireTime);
    
            document.cookie = `${cookie};expires=${now.toUTCString()};path=${cpath}`;
    }

    /**
     * @since 1.0.0
     * 
     * @param {string} cname 
     * @returns {string|boolean}
     */
    static get(cname) {
        let name = cname + "=";
        let decodedCookie = decodeURIComponent(document.cookie);
        let cookies = decodedCookie.split(';');
    
        for(let i = 0; i < cookies.length; i++) {
            let cookie = cookies[i];
    
            while (cookie.charAt(0) == ' ') {
                cookie = cookie.substring(1);
            }
            if (cookie.indexOf(name) == 0) {
                return cookie.substring(name.length, cookie.length);
            }
        }

        return false;
    }

    /**
     * @since 1.2.0
     * 
     * @param {string} cname 
     * @returns {void}
     */
    static forget(cname){
        document.cookie = `${cname}=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;`;
    }
}
