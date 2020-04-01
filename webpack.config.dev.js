// Config web
const WEB_CONFIG = require('./web.config')


// Local plugins
const path = require('path')

// Extend Plugin
const webpack = require('webpack')
const MiniCssExtractPlugin = require('mini-css-extract-plugin')
const CopyWebpackPlugin = require('copy-webpack-plugin')
// const CleanWebpackPlugin   = require('clean-webpack-plugin');
const WriteFilePlugin = require('write-file-webpack-plugin')
const FileManagerPlugin = require('filemanager-webpack-plugin')
const sass = require('node-sass')
const VueLoaderPlugin = require('vue-loader/lib/plugin')

// Main config webpack
// ---------------------------
const WEBPACK_CONFIG = {
  entry: WEB_CONFIG.webpackConfig.entry,
  output: {
    path: WEB_CONFIG.webPaths.dist.js,
    filename: '[name].js'
  },
  resolve: WEB_CONFIG.webpackConfig.resolves,
  devtool: 'source-map',
  devServer: {
    contentBase: WEB_CONFIG.distPath,
    // port: 9669,
    disableHostCheck: true, // ! fix for https://github.com/webpack/webpack-dev-server/issues/1604
    hot: false,
    stats: {
      all: false,
      errors: true,
      errorDetails: true,
      assets: true,
      colors: true,
      timings: true,
      warnings: true
    }
  },
  stats: {
    all: false,
    errors: true,
    errorDetails: true,
    assets: true,
    colors: true,
    timings: true,
    warnings: true
  },
  module: {
    rules: [
      {
        test: /\.vue$/,
        use: [
          {
            loader: 'vue-loader'
          }
        ]
      },
      {
        test: /\.js$/,
        exclude: /(node_modules|bower_components)/,
        use: [
          {
            loader: 'babel-loader'
          }
        ]
      },
      {
        test: /\.scss$/,
        use: [
          MiniCssExtractPlugin.loader,
          {
            loader: 'css-loader',
            options: {
              sourceMap: true,
              importLoaders: 2,
              url: false
            }
          },
          {
            loader: 'sass-loader',
            options: {
              sourceMap: true,
              includePaths: [WEB_CONFIG.webPaths.src.scss, WEB_CONFIG.nodeModulesPath],
              functions: {
                'getScssGlobal($key)': function(key) {
                  let result = new sass.types.String(String(WEB_CONFIG.scssGlobal[key.getValue()]))
                  return result
                }
              }
            }
          }
        ]
      },
      {
        /**
         * Loader này giúp mở các lib cho bên ngoài webpack sử dụng
         */
        test: require.resolve('jquery'),
        use: [
          {
            loader: 'expose-loader',
            options: 'jQuery'
          },
          {
            loader: 'expose-loader',
            options: '$'
          }
        ]
      }
    ] //end rules
  }, //end module
  optimization: {
    splitChunks: WEB_CONFIG.webpackConfig.optimization.splitChunks
  },
  plugins: [
    new WriteFilePlugin({
      test: /\.(.*)$/,
      useHashIndex: true,
      log: true
    }),
    new MiniCssExtractPlugin({
      path: WEB_CONFIG.webPaths.dist.css,
      filename: '../css/[name].css',
      chunkFilename: '[name]_chunk.css'
    }),
    new CopyWebpackPlugin([
      {
        context: WEB_CONFIG.webPaths.src.images,
        from: '**/*.{png,jpg,gif,svg,ico}',
        to: WEB_CONFIG.webPaths.dist.images
      },
      {
        context: WEB_CONFIG.webPaths.src.fonts,
        from: '**/*.{otf,eot,svg,ttf,woff,woff2}',
        to: WEB_CONFIG.webPaths.dist.fonts
      }
    ]), // end CopyWebpackPlugin
    new webpack.ProvidePlugin(WEB_CONFIG.webpackConfig.plugins.providePlugins),
    new VueLoaderPlugin(),
    new FileManagerPlugin({
      onEnd: {
        delete: [
          WEB_CONFIG.webPaths.dist.js + '/**/*-style.js',
          WEB_CONFIG.webPaths.dist.js + '/**/*-style.js.map'
        ]
      }
    })
  ] // end plugins
} // end WEB_CONFIG

// Export to run
// ---------------------------
module.exports = WEBPACK_CONFIG
