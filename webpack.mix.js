const mix = require('laravel-mix');

mix.setPublicPath('dist')
mix.setResourceRoot('jsoneditor')
mix.sourceMaps()
mix.version()

mix.copy([
    "node_modules/jsoneditor/dist/jsoneditor.min.css",
    "node_modules/jsoneditor/dist/jsoneditor.min.js",
], "dist/jsoneditor")
    .copyDirectory("node_modules/jsoneditor/dist/img", "dist/jsoneditor/img");

