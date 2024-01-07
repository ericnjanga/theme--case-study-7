const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');

module.exports = {
  mode: 'production', // Set mode to 'production' for optimization
  entry: './styles/styles.scss',
  output: {
    path: path.resolve(__dirname, 'styles-dist'),
    filename: 'stilettos-hammers-styles.css',
  },
  module: {
    rules: [
      {
        test: /\.s[ac]ss$/i,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
          'sass-loader',
        ],
      },
    ],
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: 'stilettos-hammers-styles.min.css',
    }),
  ],
  devtool: 'source-map', // Add source maps for your JavaScript



  performance: {
    maxAssetSize: 500 * 1024, // Set the asset size limit to 500 KiB
    maxEntrypointSize: 500 * 1024, // Set the entry point size limit to 500 KiB
  },
};