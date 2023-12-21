import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';
import colors from 'tailwindcss/colors';

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
                sans: ['"M PLUS 2"', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                indigo: colors.emerald
            },
            typography: (theme) => ({
                DEFAULT: {
                    css: {
                        a: {
                            color: theme('colors.indigo.500'),
                            '&:hover': {
                                color: theme('colors.indigo.400'),
                            },
                        },
                    },
                },
            }),
        },
    },

    plugins: [forms, typography],
};
