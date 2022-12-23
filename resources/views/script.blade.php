<script type="text/javascript" src="{{ asset('/libs/jquery/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('/libs/bootstrap/bootstrap.js') }}"></script>

<script type="text/javascript">
    $(document).ready(()=>{
        pageBack();
    });

    // Voltar para a página anterior
    function pageBack(){
        const pageBack = $('#back');

        if(pageBack){
            pageBack.click((event)=>{
                event.preventDefault();

                history.back();
            });
        }
    }
    // Função respossável por abrir e fechar o menu lateral
    function oppenClosedMenu(event){
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

            }else{
                menu.removeClass('menuMobileOppen');
                divBtn.attr('data-divbtn-closed', 'desactive');

                document.getElementById('checkbox-menu').checked = false;

                setTimeout(()=>{
                    aside.attr('data-expanded', 'mobile-desactive');
                    divBtn.removeClass('divClosed');
                }, 200);
            }
        }else{

            if(event.target.checked){
                aside.attr('data-expanded', 'active');

                items.forEach((item)=>{
                    item.parentNode.querySelector('i').classList.remove('iconManu');

                    $(item).removeClass('dNone');
                    $(item).attr('data-item-active', 'true');
                });
            }else{
                aside.attr('data-expanded', 'desactive');

                items.forEach((item)=>{
                    $(item).attr('data-item-active', 'false');

                    setTimeout(()=>{
                        item.parentNode.querySelector('i').classList.add('iconManu');

                        $(item).addClass('dNone');
                    }, 600);
                });
            }
        }
    }

    // Função responssável por ocultar a mensaggem de aviso
    function hiddenMessage(){
        const message = $('[data-message]');

        setTimeout(()=>{
            message.attr('data-message', 'false');

            setTimeout(() => {
                message.remove();
            }, 1000);
        }, 5000);
    }

    // Função responssável por exibir a senha quando clicado
    function showPass() {
        const ids = document.querySelectorAll('[data-id]');

        ids.forEach((id) => {
            $(id).click((event) => {
                const inputPass = event.target.parentNode.parentNode.querySelector('input');
                const icone = event.target;

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

    // Função responssável por validar os inputs que tenha o campo required
    function getFields(){
        const fields = document.querySelectorAll('[required]');

        for(let field of fields){
            field.addEventListener('invalid', event => {
                // Eliminar bubble
                event.preventDefault();
                customValidation(event)
            });
            field.addEventListener('blur', customValidation);
        }
    }

    function validateField(field){
        function verifyError(){
            let foundError = false;

            for(let error in field.validity){
                if(field.validity[error] && !field.validity.valid){
                    foundError = error;
                }
            }

            return foundError;
        };

        function setCustomMessage(message){
            let spanError = field.parentNode.querySelector('span.validit');

            if(message){
                $(spanError).html(`${message} <i class="bi bi-x-circle-fill"></i>`);
                $(spanError).attr('data-valid', 'false')
            }else{
                $(spanError).html('Válido! <i class="bi bi-check-circle-fill"></i>');
                $(spanError).attr('data-valid', 'true')
            }
        };

        function customMessage(typeError){
            let valueMissing = 'Por favor, preencha este campo!'

            const message = {
                text: {
                    valueMissing: valueMissing
                },
                email: {
                    valueMissing: valueMissing,
                    typeMismatch: 'Por favor, digite um email válido!'
                },
                password: {
                    valueMissing: valueMissing
                },
                number: {
                    valueMissing: valueMissing
                }
            };

            if(message[field.type]){
                return message[field.type][typeError];
            }else{
                return valueMissing;
            }
        };

        return function(){
            let error = verifyError();

            if(error){
                let message = customMessage(error);

                setCustomMessage(message);
            }else{
                setCustomMessage();
            }
        };
    };

    function customValidation(event){
        let field = event.target;
        let validation = validateField(field);

        validation();
    };

    // Função responssével por abrir as notificações
    function oppenNotifications(event){
        event.preventDefault();

        const notification = $('#notifications');
        const notificationAttr = $(notification).attr('data-notification');

        if(notificationAttr == null || notificationAttr == 'false'){
            notification.attr('data-notification', 'true');
        }else{
            notification.attr('data-notification', 'false');
        }
    }

    // Desabilitar o botão de excluir itens
    function disableEnableBtn(){
        const inputs = document.querySelectorAll('[data-button="delete-enable"]');
        const btnDeleteAll = $('#deleteAll');
        const checkeds = [];

        inputs.forEach((input)=>{
            checkeds.push(input.checked);
        })

        if(inArray(true, checkeds)){
            btnDeleteAll.removeClass('disabled');
        }else{
            btnDeleteAll.addClass('disabled');
        };

        function inArray(value, array) {
            var length = array.length;

            for(var i = 0; i < length; i++) {
                if(array[i] == value) return true;
            }
            return false;
        }
    }

    // Função para selecionar vários itens
    function selectSeveral(event){
        disableEnableBtn();

        const input = event.target;
        const inputs = document.querySelectorAll('[data-button="delete-enable"]');
        const btnDeleteAll = $('#deleteAll');

        if(input.checked){
            inputs.forEach((input)=>{
                input.checked = true;
            });

            btnDeleteAll.removeClass('disabled');
        }else{
            inputs.forEach((input)=>{
                input.checked = false;
            });

            btnDeleteAll.addClass('disabled');
        }
    }

    // Abrir modal com confirmação de exclusão dos itens individuais
    function deleteItem(event){
        const button = $(event.target).attr('data-button') ? event.target : event.target.parentNode;
        const route = $(button).attr('data-route');
        const message = $(button).attr('data-message');
        const modalLabel = $('#modalDeleteItemLabel');
        const formSubmit = $('[data-submit="delete"]');

            modalLabel.text(message);

            formSubmit.attr('action', route);
            formSubmit.attr('method', 'POST');

            $('#modalDeleteItem').modal('show');

            $('[data-submit="button"]').click(() => {
                formSubmit.submit();
            });
    }

    // Abrir modal com confirmação de exclusão de vários itens
    function deleteAllItems(event){
        const allItems = [];
        const button = event.target;
        const route = $(button).attr('data-route');
        const modalLabel = $('#modalDeleteItemLabel');
        const itemsDelete = document.querySelectorAll('[data-button="delete-enable"]');
        const message = $(itemsDelete[0]).attr('data-message');
        const formSubmit = $('[data-submit="delete"]');

            formSubmit.attr('action', route);
            formSubmit.attr('method', 'POST');

            itemsDelete.forEach((item)=>{
                if(item.checked){

                    const input = $('<input />')
                        input.attr({
                            hidden: true,
                            name: 'ids[]',
                            value: $(item).attr('data-id')
                        });

                        formSubmit.append(input);
                }
            });

            modalLabel.text(message);
            $('#modalDeleteItem').modal('show');

            $('[data-submit="button"]').click(() => {
                formSubmit.submit();
            });
    }

    // Options de delete aitems
    function optionsDelete(){
        const buttons = document.querySelectorAll('[data-button="delete"]');

            buttons.forEach((button) => {
                $(button).click((event) => {
                    deleteItem(event);
                });
            });

            $('[data-button="select-several"]').click((event) => {
                selectSeveral(event);
            });

            $('[data-button="delete-several"]').click((event) => {
                deleteAllItems(event);
            });

            $('[data-button="delete-enable"').click(() => {
                disableEnableBtn();
            });
    }

    // Abrir ou fechar a notificação clicada
    function oppenOrClosedNotification(){
        const notifications = document.querySelectorAll('.notification-contents-box');

        notifications.forEach((notification) => {
            $(notification).click(()=>{
                let contentNotificaton = $(notification).find('[data-content]')
                    hiddenOrShowNotifications(contentNotificaton.attr('id'));

                    if(contentNotificaton.attr('data-content') == 'false'){
                        contentNotificaton.attr('data-content', true);
                    }else{
                        contentNotificaton.attr('data-content', false);
                    };
            });
        });
    }

    // Ocultar outras notificações caso esteja abertas
    function hiddenOrShowNotifications(notificationID){
        const contentsNotificaton = document.querySelectorAll('[data-content]');

        contentsNotificaton.forEach((content) => {
            if($(content).attr('id') !== notificationID){
                $(content).attr('data-content', false);
            }
        });
    }

    // Marcar notificação como já visualizada
    function markNotificationSeen(){
        const submits = document.querySelectorAll('[data-submit="notification"]');

        submits.forEach((submit) => {
            $(submit).on('submit', (event) => {
                event.preventDefault();
                const urlSubmit = $(event.target).attr('action');
                const token = $(event.target).find('input[name="_token"]').val();
                const data = {
                    _token: token
                }

                $.post(urlSubmit, data, (response) => {
                    console.log(response);

                    let countNotification = $('#notification-count');
                    let newCountNotification = parseInt((countNotification.text()) - 1);

                        $(event.target).parent().parent().parent().remove();
                        countNotification.text(newCountNotification);
                        newCountNotification == 0 ? $('[data-notification-count]').removeAttr('hidden') : '';
                }).fail((error) => {
                    console.log(error)
                });
            });
        });
    }

    // Marcar todas as notificações como vistas
    function markAllNotificationWith(){
        $('#nark-all-view').click(() => {
            const ids = [];
            const inputsIds = document.querySelectorAll('#notifications input[name="ID"]');
            const token = document.querySelector('input[name="_token"]').value;

            inputsIds.forEach((input) => {
                ids.push($(input).val());
            });

            const data = {
                _token: token,
                ids: ids
            }

            $.post('/admin/notifications/view', data, (response) => {
                if(response.status == 'success'){
                    inputsIds.forEach((input) => {
                        $(input).parent().parent().parent().parent().remove();

                        $('#notification-count').text('0');
                        $('[data-notification-count]').removeAttr('hidden');
                        $('#nark-all-view').parent().attr('hidden', true);
                    });
                }

            }).fail((error) => {
                console.log(error)
            });
        });
    }

    // Exibir textarea de adicionar permissões extras
    function addExtraPermissions(){
        const extraPermissions = $('#extra-permissions');
        const button = extraPermissions.find('button');
        const permissios = extraPermissions.find('div');

        button.click(() => {
            if(permissios.attr('hidden')){
                permissios.attr('hidden', false);
            }else{
                const textarea = permissios.find('textarea');
                    permissios.attr('hidden', true);
            }
        });
    }

    // Marcar permissões extras como 'on' ou 'off'
    function alterStatusPermissions(){
        const extraPermissions = document.querySelectorAll('input[data-permission]');

        extraPermissions.forEach((extra) => {
            $(extra).click((event) => {
                const key = $(event.target).attr('name');
                const value = event.target.checked == true ? 'on' : 'off';

                alter(key, value);
            });
        });

        function alter(key, value){
            const extraPermissions = [];
            const textArea = $('#extra_permissions');
            const textAreaArray = textArea.val().split(',');

            textAreaArray.forEach((item) => {
                const itemArray = item.split('=');

                if(key == itemArray[0]){
                    extraPermissions.push(`${key}=${value}`);
                }else{
                    extraPermissions.push(`${itemArray[0]}=${itemArray[1]}`);
                }
            });

            textArea.val(extraPermissions.join(','));
        }
    }

    // Alterar a inserção de item ao menu de menu principal para submenu
    function addSubmenu(){
        $('#is_submenu').click(() => {
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

    // Remover submenus
    function removeSubmenus(){
        const btnSubmenus = document.querySelectorAll('[data-submenu="delete"]');

        btnSubmenus.forEach((sub) => {
            $(sub).click((event) => {
                let submenus = JSON.parse($('#submenus').val());
                let btnSubmenu;

                if($(event.target).attr('data-submenu')){
                    btnSubmenu = event.target;
                }else{
                    btnSubmenu = event.target.parentNode;
                }

                Object.keys(submenus).forEach((key) => {
                    if($(btnSubmenu).attr('data-key') === key){
                        delete submenus[key];
                    }
                });

                $('#submenus').val(JSON.stringify(submenus));
                $(btnSubmenu).parent().remove();

                if($('#submenus').val() == '{}'){
                    $('#list-submenus').remove();
                }
            });
        });
    }

    // Abrir diretório
    function openFolder(){
        const folders = document.querySelectorAll('[data-gallery]');

        folders.forEach((folder) => {
            let openFolder = $(folder).attr('data-gallery').replace('public/gallery/', '');

            $(folder).dblclick(() => {
                window.location.href = `/admin/gallery?folder=${openFolder}`;
            });
        });
    }

    // Voltar um diretório da galeria
    function backFolder(){
        $('[data-folder="back"]').click(() => {
            let folder = new URLSearchParams(window.location.search).get('folder')
                folder = folder.split('/');
                folder.pop();
                folder = folder.join('/');

                window.location.href = `/admin/gallery?folder=${folder}`;
        });
    }

    // Abrir e fechar a galeria de imagens
    function openGallery(){
        const buttons = document.querySelectorAll('[data-gallery="open"]');
        const gallery = $('[data-gallery="content"]');
        buttons.forEach((button) => {
            $(button).click((event) => {
                const type = $(button).attr('data-gallery-type');
                const src = $(button).attr('data-gallery-src');
                const title = $(button).attr('data-gallery-title');
                const current = $(button).attr('data-gallery-current');
                const size = $(button).attr('data-gallery-size');
                const count = $(button).attr('data-gallery-count');
                    switch (type) {
                        case 'image':
                            insertImage(src, title);
                            break;
                        case 'video':
                            insertVideo(src);
                            break;
                        default:
                            break;
                    }
                    $('body').addClass('body-overflow-hidden');
                    $('[data-gallery-options="title"]').text(title);
                    $('[data-gallery-options="size"]').text(`${size} Bts`);
                    gallery.attr('hidden', false);
                    gallery.addClass('d-flex');
                    habilitOptions(src);
                    closeGallery(gallery);
                    next(current, count);
                    prev(current, count);
            });
        });
        function next(current, count){
            $('[data-gallery="next"]').click((event) => {
                current = parseInt(current)+1 == count ? 0 : parseInt(current)+1;
                const nextItem = $(`[data-gallery-current="${current}"]`);
                const type = nextItem.attr('data-gallery-type');
                const src = nextItem.attr('data-gallery-src');
                const title = nextItem.attr('data-gallery-title');
                const size = nextItem.attr('data-gallery-size');
                switch (type) {
                    case 'image':
                        insertImage(src, title);
                        break;
                    case 'video':
                        insertVideo(src);
                        break;
                    default:
                        break;
                }
                $('[data-gallery-options="title"]').text(title);
                $('[data-gallery-options="size"]').text(`${size} Bts`);
                habilitOptions(src);
                next(current, count);
                prev(current, next);
            });
        }
        function prev(current, count)
        {
            $('[data-gallery="prev"]').click((event) => {
                current = current == 0 ? parseInt(count)-1 : parseInt(current)-1;
                const nextItem = $(`[data-gallery-current="${current}"]`);
                const type = nextItem.attr('data-gallery-type');
                const src = nextItem.attr('data-gallery-src');
                const title = nextItem.attr('data-gallery-title');
                const size = nextItem.attr('data-gallery-size');
                switch (type) {
                    case 'image':
                        insertImage(src, title);
                        break;
                    case 'video':
                        insertVideo(src);
                        break;
                    default:
                        break;
                }
                $('[data-gallery-options="title"]').text(title);
                $('[data-gallery-options="size"]').text(`${size} Bts`);
                habilitOptions(src);
                next(current, count);
                prev(current, count);
            });
        }
        function closeGallery(gallery){
            $('[data-gallery="close"]').click(() => {
                $('body').removeClass('body-overflow-hidden');
                gallery.attr('hidden', true);
                gallery.removeClass('d-flex');
            });
        }
        function insertVideo(src){
            const image = $('#img');
            const video = $('#video');
            const currentUrl = getCurrentUrl();
            const url = `${currentUrl}/storage/${src}`
                image.parent().attr('hidden', true);
                image.parent().removeClass('d-flex');
                video.parent().attr('hidden', false);
                video.parent().addClass('d-flex');
                video.attr('src', url);
        }
        function insertImage(src, title){
            const image = $('#img');
            const video = $('#video');
            const currentUrl = getCurrentUrl();
            const url = `${currentUrl}/storage/${src}`
                video.parent().attr('hidden', true);
                video.parent().removeClass('d-flex');
                image.parent().attr('hidden', false);
                image.parent().addClass('d-flex');
                image.attr('src', url);
                image.attr('alt', title);
        }
        function getCurrentUrl(){
            const host = window.location.host
            const protocol = window.location.protocol
            const currentUrl = `${protocol}//${host}`;
            return currentUrl;
        }
        function habilitOptions(src){
            const inputs = document.querySelectorAll('[data-gallery="input"]');
            inputs.forEach((input) => {
                $(input).attr('value', src);
            });
        }
    }
</script>
