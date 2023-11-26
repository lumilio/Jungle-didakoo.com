const mix = require('laravel-mix');

mix.copyDirectory("resources/images", "public/images")
    .js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .webpackConfig({
        module: {
            rules: [
                {
                    test: /web3\.min\.js$/, // Adjust the regex to match the filename
                    use: 'raw-loader' // Use appropriate loader here
                }
                // Add more rules if needed for other file types
            ]
        }
    });
