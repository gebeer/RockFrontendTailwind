const webpack = require('webpack');
require('dotenv').config({ path: './.env' });
const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");

const mode = process.env.NODE_ENV || "development";
console.log(mode);

const config = {
  mode: mode,
  target: "web",
  entry: process.env.ENTRY_FILE,
  output: {
    path: path.resolve(__dirname, process.env.OUTPUT_PATH),
    publicPath: process.env.OUTPUT_PUBLICPATH,
    filename: "[name].js",
    clean: false,
  },
  plugins: [
    new webpack.DefinePlugin({
      "process.env": JSON.stringify(process.env),
    }),
    new MiniCssExtractPlugin({
      filename: "[name].css",
    }),
  ],
  module: {
    rules: [
      {
        test: /\.js$/i,
        exclude: /node_modules/,
        loader: "babel-loader",
        // options: {
        //   presets: ["@babel/preset-env"],
        // },
      },
      {
        test: /\.css$/i,
        use: [MiniCssExtractPlugin.loader, "css-loader", "postcss-loader"],
      },
      {
        test: /\.(eot|svg|ttf|woff|woff2|png|jpg|gif)$/i,
        type: "asset",
      },
    ],
  },
};

module.exports = () => {
  if (mode !== "production") {
    config.devtool = "inline-cheap-source-map";
  } else {
    config.optimization = {
      minimizer: [`...`, new CssMinimizerPlugin()],
    };
  }
  return config;
};
