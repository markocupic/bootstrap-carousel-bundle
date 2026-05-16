const Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('public/')
    .setPublicPath('/bundles/markocupicbootstrapcarousel')
    .setManifestKeyPrefix('')

    .copyFiles({
      from: './assets/js',
      to: 'js/[path][name].[hash:8].[ext]'
    })
    .copyFiles({
      from: './assets/css',
      to: 'css/[path][name].[hash:8].[ext]'
    })

    .disableSingleRuntimeChunk()
    .cleanupOutputBeforeBuild()
    .enableSourceMaps()
    .enableVersioning()

    // enables @babel/preset-env polyfills
    .configureBabelPresetEnv((config) => {
      config.useBuiltIns = 'usage';
      config.corejs = 3;
    })

    .enablePostCssLoader()
;

module.exports = Encore.getWebpackConfig();
