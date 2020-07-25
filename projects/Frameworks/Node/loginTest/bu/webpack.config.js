module.exports = {
    entry: {
        home: './server.js',
    },
    output: {
        filename: 'dist/[name].js'
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                loader: 'babel-loader',
                options: {
                    presets: ['es2017'],
                }
            }
        ]
    }
}