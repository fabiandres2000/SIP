const mix = require('laravel-mix');

mix.webpackConfig({
   output: {
      chunkFilename: "js/chunks/[id].chunk.[chunkhash].js",
      publicPath: ''
   }
});
mix.js([
   'resources/js/app.js',
   'resources/js/main.js'
], 'public/js/app.js');
