const WEB_CONFIG = require('./web.config');

// Extend Plugin
const webpack = require('webpack');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const CleanWebpackPlugin = require('clean-webpack-plugin');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');
const sass = require('node-sass');
const FileManagerPlugin = require('filemanager-webpack-plugin');
const VueLoaderPlugin = require('vue-loader/lib/plugin');

// Main config webpack
// ---------------------------
const WEBPACK_CONFIG = {
  entry: WEB_CONFIG.webpackConfig.entry,
  output: {
    path: WEB_CONFIG.webPaths.dist.js,
    filename: '[name].js',
  },
  resolve: WEB_CONFIG.webpackConfig.resolves,
  module: {
    rules: [
      {
        test: /\.vue$/,
        use: [
          {
            loader: 'vue-loader',
          }
        ],
      },
      {
        test: /\.js$/,
        exclude: /(node_modules|bower_components)/,
        use: [
          {
            loader: 'babel-loader',
          }
        ],
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
              url: false,
            },
          },
          {
            loader: 'postcss-loader',
            options: {
              plugins: [
                require('postcss-discard-comments')({
                  removeAll: true,
                }),
                require('cssnano')({
                  discardComments: {
                    removeAll: true,
                  },
                }),
                require('autoprefixer')()
              ],
            },
          },
          {
            loader: 'sass-loader',
            options: {
              sourceMap: true,
              includePaths: [WEB_CONFIG.webPaths.src.scss, WEB_CONFIG.nodeModulesPath],
              functions: {
                'getScssGlobal($key)': function(key) {
                  let result = new sass.types.String(String(WEB_CONFIG.scssGlobal[key.getValue()]));
                  return result;
                },
              },
            },
          }
        ],
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
    ], //end rules
  }, //end module
  optimization: {
    splitChunks: WEB_CONFIG.webpackConfig.optimization.splitChunks,
    minimizer: [
      new UglifyJsPlugin({
        extractComments: true,
      })
    ],
  }, // end optimization
  plugins: [
    new CleanWebpackPlugin([
      WEB_CONFIG.webPaths.dist.images, WEB_CONFIG.webPaths.dist.fonts, WEB_CONFIG.webPaths.dist.js, WEB_CONFIG.webPaths.dist.css
    ]),
    new MiniCssExtractPlugin({
      path: WEB_CONFIG.webPaths.dist.css,
      filename: '../css/[name].css',
      chunkFilename: '[name]_chunk.css',
    }),
    new CopyWebpackPlugin([
      {
        context: WEB_CONFIG.webPaths.src.fonts,
        from: '**/*.{otf,eot,svg,ttf,woff,woff2}',
        to: WEB_CONFIG.webPaths.dist.fonts,
      },
      {
        context: WEB_CONFIG.webPaths.src.images,
        from: '**/*.{png,jpg,gif,svg,ico}',
        to: WEB_CONFIG.webPaths.dist.images,
      }
    ]),
    new webpack.ProvidePlugin(WEB_CONFIG.webpackConfig.plugins.providePlugins),
    new VueLoaderPlugin(),
    new FileManagerPlugin({
      onEnd: {
        delete: [
          WEB_CONFIG.webPaths.dist.js + '/**/*-style.js', WEB_CONFIG.webPaths.dist.js + '/**/*-style.js.map', WEB_CONFIG.webPaths.dist.js + '/**/*.js.LICENSE'
        ],
      },
    })
  ], // end plugins
}; // end webpack config

// Export to run
// ---------------------------
module.exports = WEBPACK_CONFIG;
