'use strict';

/**
 * Create or hiddens the message
 */
class Message{
    /**
     * Hidden message
     * 
     * @since 1.0.0
     * 
     * @param {string} elementIndentfy 
     * @return {void}
     */
    static hide(elementIndentfy){
        this.clickHide();
        const message = $(elementIndentfy);
    
        setTimeout(()=>{
            message.attr('data-message', 'false');
    
            setTimeout(() => {
                $('[data-message="content"]').remove();
            }, 1000);
        }, 5000);
    }

    /**
     * @since 1.5.0
     * 
     * @returns {void}
     */
    static clickHide(){
        $('[data-message="hide"]').on('click', (event) => {
            const message = $(event.target).parent();
            message.attr('data-message', 'false');
    
            setTimeout(() => {
                message.remove();
            }, 1000);
        });
    }
    
    /**
     * Create message
     * 
     * @since 1.0.0
     * 
     * @param {string} textMessage 
     * @param {string} typeMessage 
     * @returns {void}
     */
    static create(textMessage, typeMessage){
        const messageContent = this.getContentMessage();
        const content = messageContent.content;
        const exists = messageContent.exists;

        const alert = $('<div />');
        alert.attr('class', `rounded shadow-lg p-4 flex items-center relative my-1 bg-${typeMessage}`);
        alert.attr('data-message', 'true');

        const icon = $('<i />');
        icon.attr('class', `bi ${this.getIcon(typeMessage)} text-xl`);

        const message = $('<p />');
        message.attr('class', 'ml-4 text-sm');
        message.text(textMessage);

        const iconClose = $('<i />');
        iconClose.attr('class', 'bi bi-x absolute top-0 right-1 opacity-75 pointer');
        iconClose.attr('data-message', 'hide');

        alert.append(icon);
        alert.append(message);
        alert.append(iconClose);

        content.append(alert);
        !exists && $('body').append(content);

        this.hide('[data-message=true]');
    }

    static getIcon(typeMessage){
        let classIcon;
        switch (typeMessage ) {
            case 'danger':
                classIcon = 'bi-dash-circle-fill';
                break;
            case 'success':
                classIcon = 'bi-check-circle-fill';
                break;
            case 'warning':
                classIcon = 'bi bi-exclamation-circle-fill';
                break;
            case 'secondary':
                classIcon = 'bi bi-question-circle-fill';
            default:
                classIcon = 'bi bi-question-circle-fill';
                break;
        }
        return classIcon;
    }

    /**
     * @since 1.5.0
     * 
     * @returns {object}
     */
    static getContentMessage(){
        let messageContent = $('[data-message="content"]');
        let exists = true;

        if(messageContent.length == 0){
            messageContent = $('<div />');
            messageContent.attr('class', 'fixed top-0 right-0 rounded p-4 z-[99999] text-white font-bold max-w-[400px]');
            messageContent.attr('data-message', 'content');

            exists = false;
        }

        return {
            content: messageContent,
            exists: exists
        };
    }
}
