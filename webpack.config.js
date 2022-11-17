const path = require('path');
const HTMLWebpackPlugin = require('html-webpack-plugin');
const {CleanWebpackPlugin} = require('clean-webpack-plugin');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const CopyPlugin = require("copy-webpack-plugin");

module.exports = {
    devServer: {
        hot: true,
        port: 8080,
    },
    context: path.resolve(__dirname, 'src'),
    mode: "development",
    entry: {
        main: './index.js',
    },
    output: {
        filename: "./scripts/[name].js",
        path: path.resolve(__dirname, 'dist')
    },
    plugins: [
        new HTMLWebpackPlugin({
            template: "./index.html",
            filename: 'index.html',
            inject: 'body'
        }),
        new HTMLWebpackPlugin({
            template: "./category.html",
            filename: 'category.html',
            inject: 'body'
        }),
        new CleanWebpackPlugin(),
        new MiniCssExtractPlugin({
            filename: "./styles/[name].css",
        }),
        new CopyPlugin({
            patterns: [
                { from: "./images", to: "./images" },
            ],
        }),
    ],
    module: {
        rules: [
            {
                test: /\.css$/i,
                use: [
                    MiniCssExtractPlugin.loader,
                    {
                        loader: "css-loader",
                        options: {
                            url: false,
                        },
                    },
                    {
                        loader: "postcss-loader",
                        options: {
                            postcssOptions: {
                                plugins: [
                                    [
                                        "autoprefixer",
                                        {
                                        },
                                    ],
                                    'cssnano'
                                ],
                            },
                        },
                    },
                ],
            },
        ]
    }
}