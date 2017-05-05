const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

require('laravel-elixir-pug');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
    mix.sass('app.scss')
       .webpack('app.js');
});

// compile less to css
// elixir(function(mix) {
//     mix.less('app.less');
// });

elixir(function(mix) {
    mix.less([
        'app.less',
        'controllers.less'
    ]);
});

elixir(function (mix) {
    mix
        .pug({
            // Compile to blade.php files or html files
            blade: false,
            // Pretty output or uglified
            pretty: true,
            // Source of pug files
            src: 'resources/assets/pug/',
            // Files to look for, useful if you are still naming files .jade
            search: '**/*.pug',
            // Files to skip, useful for partials
            exclude: '_partials/**/*',
            // Extension of pug files. Only needed to be set if still naming file .jade
            pugExtension: '.pug',
            // If blade is true, output to resources/views, otherwise public/html
            dest: 'public/html',
            // Any additional watches
            additional_watches: []
        });
});
