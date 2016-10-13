var elixir = require('laravel-elixir');

elixir(function(mix) {
  mix.styles(['style.css'])
    .scripts(['app.js', 'splash.js'])
    .version(['css/all.css', 'js/all.js']);
});
