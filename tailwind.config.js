import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                robotoSerif: ['"Roboto Serif"', 'serif'],
                sourceSerif: ['"Source Serif 4"', 'serif'],
            },
            backgroundImage: {
                'login-bg': "url('/images/background.svg')",
            },
        },
    },

    plugins: [forms],
};
