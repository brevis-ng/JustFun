/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
                'justfun-download-bg': "url('/storage/download_bg_pc.png')",
                'justfun-download-mb': "url('/storage/download_bg_mobile.png')",
            }
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
