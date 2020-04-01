// Local Plugins
const path = require('path');
const DATE = new Date();
const argv = require('yargs').argv;

// Init
const WEB_PATH = path.resolve(__dirname);
const WEB_SRC_PATH = path.resolve(__dirname, 'src');
const NODE_MODULES_PATH = path.resolve(__dirname, 'node_modules');

// Set web distribution folder path
let WEB_DIST_PATH = path.resolve(__dirname, 'dist');
if(argv.mode == 'development') {
  WEB_DIST_PATH = path.resolve(__dirname, 'tmp');
}

const WEB_PATHS = {
  dist: {
    fonts: WEB_DIST_PATH + '/fonts',
    images: WEB_DIST_PATH + '/images',
    upload: WEB_DIST_PATH + '/upload',
    scss: WEB_DIST_PATH + '/scss',
    js: WEB_DIST_PATH + '/js',
    css: WEB_DIST_PATH + '/css',
  },
  src: {
    fonts: WEB_SRC_PATH + '/fonts',
    images: WEB_SRC_PATH + '/images',
    upload: WEB_SRC_PATH + '/upload',
    scss: WEB_SRC_PATH + '/scss',
    scssPartials: WEB_SRC_PATH + '/scss/partials',
    js: WEB_SRC_PATH + '/js',
    jsLibs: WEB_SRC_PATH + '/js/libs',
    jsBase: WEB_SRC_PATH + '/js/base',
    jsPartials: WEB_SRC_PATH + '/js/partials',
    jsGlobal: WEB_SRC_PATH + '/js/partials/global',
    vue: WEB_SRC_PATH + '/vue',
    vueGlobal: WEB_SRC_PATH + '/vue/global',
  },
};

const WEB_CONFIG = {
  cacheVer: DATE.getTime(),
  appPath: WEB_PATH,
  nodeModulesPath: NODE_MODULES_PATH,
  distPath: WEB_DIST_PATH,
  srcPath: WEB_SRC_PATH,
  webPaths: WEB_PATHS,
  scssGlobal: {
    cacheVer: DATE.getTime(),
  },
  webpackConfig: {
    entry: {
      'vendor-style': WEB_PATHS.src.scss + '/vendor.scss',

      // Home page
      'home-page': WEB_PATHS.src.jsPartials + '/home-page/home-page.js',
      'home-page-style': WEB_PATHS.src.scssPartials + '/home-page/home-page.scss',
    },
    resolves: {
      extensions: ['.js', '.json', '.css', '.scss', '.vue'],
      alias: {
        'vue$': 'vue/dist/vue.esm.js',
        '@srcPath': WEB_SRC_PATH,
        '@scssPath': WEB_PATHS.src.scss,
        '@scssPartialsPath': WEB_PATHS.src.scssPartials,
        '@jsPath': WEB_PATHS.src.js,
        '@jsLibsPath': WEB_PATHS.src.jsLibs,
        '@jsBasePath': WEB_PATHS.src.jsBase,
        '@jsPartialsPath': WEB_PATHS.src.jsPartials,
        '@jsGlobalPath': WEB_PATHS.src.jsGlobal,
        '@vuePath': WEB_PATHS.src.vue,
        '@vueGlobalPath': WEB_PATHS.src.vueGlobal,
      },
    },
    plugins: {
      providePlugins: {
        $: 'jquery',
        jQuery: 'jquery',
        jquery: 'jquery',
      },
    },
    optimization: {
      splitChunks: {
        minChunks: 2,
        cacheGroups: {
          js: {
            test: /\.(js)$/,
            name: 'vendor',
            chunks: 'all',
            minSize: 350000,
            minChunks: 4,
          },
        },
      },
    }, // end optimization
  },
};

module.exports = WEB_CONFIG;
