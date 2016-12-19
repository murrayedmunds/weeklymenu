const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

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

elixir(mix => {
    mix.sass('login.scss')
       .webpack('app.js');
});

elixir(mix => {
    mix.sass('home.scss')
       .webpack('app.js');
});

elixir(mix => {
    mix.sass('menu.scss')
       .webpack('app.js');
});

elixir(mix => {
    mix.sass('settings.scss')
       .webpack('app.js');
});
