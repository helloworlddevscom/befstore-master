const path = require('path');
const Dotenv = require('dotenv-webpack');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');
const { merge } = require('webpack-merge');
const common = require('./webpack.common.js');

const pluginPath = './wp-content/plugins/bef-store-calculator/';

// mode, any production consolidation
module.exports = merge(common, {
  mode: 'production',
  // optimization: {
  //   minimize: true,
  //   minimizer: [new UglifyJsPlugin({
  //     test: /\.js$/,
  //     exclude: /node_modules/,
  //     sourceMap: false,
  //     uglifyOptions: {
  //       compress: {},
  //     },
  //   })],
  // },
});
