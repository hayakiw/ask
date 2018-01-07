process.env.DISABLE_NOTIFIER = true;
var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix

        .sass('app.scss', 'public/css/app.css')
        .browserify('app.js', 'public/js/app.js')

    // Admin

        .sass('_admin/app.scss', 'public/css/_admin/app.css')
        .browserify('_admin/app.js', 'public/js/_admin/app.js')

        .copy('node_modules/font-awesome/fonts', 'public/build/fonts')

        .version([
            'css/_admin/app.css',
            'js/_admin/app.js'
        ])

    ;

    // mix.phpUnit();
});
