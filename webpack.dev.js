const path = require('path');
const Dotenv = require('dotenv-webpack');
const { merge } = require('webpack-merge');
const common = require('./webpack.common.js');

const pluginPath = './wp-content/plugins/bef-store-calculator/';

// mode, devtools, devServer
module.exports = merge(common, {
  mode: 'development',
  devtool: 'source-map',
  devServer: {
    contentBase: path.resolve(__dirname, pluginPath, './public/js'),
  },
});
