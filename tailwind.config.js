const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        "./resources/views/**/*.blade.php",
        "./resources/views/*.blade.php",
        "./resources/views/**/*.js",
        "./resources/views/**/*.vue",
      ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
