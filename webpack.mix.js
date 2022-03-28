const mix = require('laravel-mix');

mix.setPublicPath('dist')
mix.setResourceRoot('/invaders/json-editor')
mix.sourceMaps()
mix.version()

mix.copy([
    "node_modules/jsoneditor/dist/jsoneditor.min.css",
    "node_modules/jsoneditor/dist/jsoneditor.min.js",
], "dist/invaders/json-editor")
    .copyDirectory("node_modules/jsoneditor/dist/img", "dist/invaders/json-editor/img");

