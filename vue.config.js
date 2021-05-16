const chunkPrefix = '[name]'
module.exports = {
    publicPath: '',
    devServer: {
        host: 'everaldoreis.com.br',
        https: false,
        disableHostCheck: true
    },
    css: {
      extract: {
        filename: `${chunkPrefix}.css`,
        chunkFilename: `${chunkPrefix}.css`,
      },
    },
    configureWebpack: {
      output: {
        filename: `${chunkPrefix}.js`,
        chunkFilename: `${chunkPrefix}.js`,
      }
    },
}