const path = require('path');
const Dotenv = require('dotenv-webpack');

const pluginPath = './wp-content/plugins/bef-store-calculator/';

// Entry, Plugin, and Output
module.exports = {
  entry: path.resolve(__dirname, pluginPath, './includes/src/index.js'),
  plugins: [
    new Dotenv({
      path: path.resolve(__dirname, './.env.development'),
    }),
  ],
  output: {
    path: path.resolve(__dirname, pluginPath, './public/js'),
    filename: 'bef-store-calculator-public.js',
  },
};
