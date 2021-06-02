let mix = require('laravel-mix');

mix.js('src/app.js', 'app.js')
	.postCss('src/app.css', 'app.css', [
		require("tailwindcss"),
   	])
	.setPublicPath('dist');
