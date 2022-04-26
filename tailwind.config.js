const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                lora: "'Lora', serif",
                mono: ["'DM Mono'", ...defaultTheme.fontFamily.mono],
                monse: "'Montserrat', serif",
            },
            flex: {
                '2': '1 1 25%',
                '3': '1 1 75%',
                '4': '0 0 50%'
            }
        },
    },

    // Evitar usar los formularios de TailwindCSS, se mezclan estos estilos con los nuestros
    // plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
