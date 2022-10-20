const Mix = require("laravel-mix");


Mix
   .sass('resources/scss/style.scss', 'public/assets/css/style.css')
   .sass('resources/scss/globals.sass', 'public/assets/css/globals.css')

   .scripts('node_modules/jquery/dist/jquery.min.js', 'public/libs/jquery/jquery.js')

   .css('node_modules/bootstrap-icons/font/bootstrap-icons.css', 'public/libs/bootstrap/bootstrap-icons.css')
   .scripts('node_modules/bootstrap/dist/js/bootstrap.bundle.js', 'public/libs/bootstrap/bootstrap.js')
   .scripts('node_modules/bootstrap/dist/js/bootstrap.bundle.js.map', 'public/libs/bootstrap/bootstrap.bundle.js.map')

   .scripts('vendor/tinymce/tinymce/tinymce.min.js', 'public/libs/tinymce/tinymce.js')
   .scripts('vendor/tinymce/tinymce/themes/silver/theme.min.js', 'public/libs/tinymce/themes/silver/theme.js')
   .scripts('vendor/tinymce/tinymce/models/dom/model.min.js', 'public/libs/tinymce/models/dom/model.js')
   .scripts('vendor/tinymce/tinymce/icons/default/icons.min.js', 'public/libs/tinymce/icons/default/icons.js')
   .css('vendor/tinymce/tinymce/skins/ui/oxide/skin.min.css', 'public/libs/tinymce/skins/ui/oxide/skin.min.css')
   .css('vendor/tinymce/tinymce/skins/ui/oxide/content.min.css', 'public/libs/tinymce/skins/ui/oxide/content.min.css')
   .css('vendor/tinymce/tinymce/skins/content/default/content.min.css', 'public/libs/tinymce/skins/content/default/content.css');
