'use strict';

class Modal{
    /**
     * @since 1.5.0
     *
     * @returns {void}
     */
    static init(){
        $("[data-toggle]").on('click', (event) => {
            this.open($(event.target).attr("data-toggle"));
        });
    }

    /**
     * @since 1.5.0
     *
     * @returns {void}
     */
    static open(selector){
        const modal = $(`[data-modal="${selector}"]`);

        modal.removeClass('hidden');
        modal.addClass('flex');
        modal.attr('data-modal-content', true);

        this.clickClose(modal);
    }

    /**
     * @since 1.5.0
     *
     * @param {object} modal
     * @returns {void}
     */
    static clickClose(modal){
        modal.find('[data-modal-close]').on('click', () => {
            modal.attr('data-modal-content', false);

            setTimeout(() => {
                modal.removeClass('flex');
                modal.addClass('hidden');
            }, 900);
        });
    }

    /**
     * @since 1.5.0
     *
     * @param {string} selector
     * @returns {void}
     */
    static close(selector)
    {
        const modal = $(`[data-modal="${selector}"]`);

        modal.removeClass('flex');
        modal.addClass('hidden');
    }
}
