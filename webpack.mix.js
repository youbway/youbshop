const mix = require("laravel-mix");


// mix.js("resources/js/app.js", 'public.js')
mix.copy('node_modules/sweetalert2/dist/sweetalert2.all.min.js', 'public/admin/js/sweetalert2.all.min.js');
