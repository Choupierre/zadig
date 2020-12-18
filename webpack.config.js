const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const dev = process.env.NODE_ENV === "dev";
const chokidar = require('chokidar');
const TerserPlugin = require('terser-webpack-plugin');


let config = {
    entry: {
        app: './dev/app.js',
    },
    watch: dev,
    output: {
        filename: dev ? '[name].js' : '[name].js',
        path: path.resolve('./www/wp-content/themes/zadig/'),
    },
    devtool: dev ? "cheap-module-eval-source-map" : "source-map",
    devServer: {
        publicPath: 'http://localhost:8081/',
        disableHostCheck: true,
        headers: {
            "Access-Control-Allow-Origin": "*",
            "Access-Control-Allow-Methods": "GET, POST, PUT, DELETE, PATCH, OPTIONS",
            "Access-Control-Allow-Headers": "X-Requested-With, content-type, Authorization"
        },
        port: 8081,
        contentBase: path.resolve('./www/wp-content/themes/zadig/'),
        before(app, server) {
            const files = [
                "./www/wp-content/themes/zadig/**/*.php",
            ];
            chokidar
                .watch(files, {
                    alwaysStat: true,
                    atomic: false,
                    followSymlinks: false,
                    ignoreInitial: true,
                    ignorePermissionErrors: true,
                    persistent: true,
                    usePolling: true
                })
                .on('all', () => {
                    server.sockWrite(server.sockets, "content-changed");
                });
        }
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: dev ? 'style.css' : 'zadig.css',
        })
    ],
    module: {
        rules: [
            {
                test: /\.(png|jpe?g|gif|svg)$/i,
                loader: 'file-loader',
                options: {
                  name: 'images/[name].[ext]',
                  publicPath: './' 
                },
              },
          /*   {
                test: /\.(png|jpg|gif|svg)$/,
                use: [{
                    loader: 'url-loader'                   
                }]
            }, */
            /*   {
                  test: /\.(woff|ttf|otf|eot|woff2|svg)$/i,
                  loader: "file-loader"
              } */
        ]
    },
    optimization: {
        minimizer: []
    }
}

if (dev) {
    config.mode = 'development';
    config.module.rules.push({
        test: /\.(sa|sc|c)ss$/,
        use: [
            {
                loader: MiniCssExtractPlugin.loader,
                options: {
                    publicPath: path.resolve('./www/wp-content/themes/zadig/')
                }
            },
            'css-loader',
            'sass-loader',
        ],
    })
} else {
    config.mode = 'production';
    config.optimization.minimize = true
    config.optimization.minimizer.push(new TerserPlugin());
    config.module.rules.push({
        test: /\.m?js$/,
        exclude: /(node_modules|bower_components)/,
        use: ['babel-loader']
    }),
        config.module.rules.push({
            test: /\.(sa|sc|c)ss$/,
            use: [{
                loader: MiniCssExtractPlugin.loader,
                options: {
                    publicPath: './'
                }
            },
                'css-loader',
            {
                loader: 'postcss-loader',
                options: {
                    plugins: () => [require('autoprefixer')],
                }
            },
                'sass-loader',
            ],
        })
}



module.exports = config;
