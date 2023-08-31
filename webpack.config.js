const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

module.exports = {
  mode: 'development',
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
};
