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
            },
            colors: {
                'brand-dark': '#0B2545',      // Fundo escuro / navbar / headers
                'brand-primary': '#1857A4',   // Botões, links, destaques
                'brand-light': '#EAF1FB',     // Fundo claro / cards / hover
                'text-main': '#161616',       // Texto principal
                'text-sub': '#5A5A5A',        // Texto secundário
                'brand-success': '#2E7D32',   // Sucesso (conciliado)
                'brand-alert': '#C77700',     // Alerta (divergente)
            },
        },
    },

    plugins: [forms],
};
