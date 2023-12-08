let mix = require('laravel-mix')
let tailwindcss = require('tailwindcss')
let path = require('path')
let postcssImport = require('postcss-import')

mix
  .js('resources/js/app.js', 'public')
  .vue({version: 3})
  .sourceMaps()
  .extract()
  .setPublicPath('public')
  .postCss('resources/css/app.css', 'public', [postcssImport(), tailwindcss('tailwind.config.js'),])
  .copy('resources/fonts/', 'public/fonts')
  .alias({'@': path.join(__dirname, 'resources/js/')})
  .webpackConfig({output: {uniqueName: 'laravel/nova'},})
  .options({
    vue: {
      compilerOptions: {
        isCustomElement: tag => tag.startsWith('trix-')
      },
      exposeFilename: true
    },
    processCssUrls: false
  })
  .version()
