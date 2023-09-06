const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');

module.exports = {
  // mode: 'development', // Set mode to ...
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
  // optimization: {
  //   minimize: true,
  //   minimizer: [
  //     new CssMinimizerPlugin({
  //       sourceMap: true, // Add source maps for the minified CSS
  //     }),
  //   ],
  // },
  devtool: 'source-map', // Add source maps for your JavaScript
};
