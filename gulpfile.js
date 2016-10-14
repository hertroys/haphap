var elixir = require('laravel-elixir');

elixir(function(mix) {
  mix.styles(['app.css', 'home.css'])
    .scripts(['app.js', 'home.js'])
    .version(['css/all.css', 'js/all.js']);
});
