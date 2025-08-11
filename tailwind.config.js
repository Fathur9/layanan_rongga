import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: 'class', // dark mode berbasis class
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
        './resources/js/**/*.vue',
    ],

    safelist: [
        'dark',
        'dark:bg-gray-900',
        'dark:text-gray-100',
        'dark:bg-gray-800',
        'dark:text-white',
        'text-gray-100',
        'bg-gray-900',
        'translate-x-0',
        '-translate-x-64'
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                darkblue: {
                    DEFAULT: '#041c32',     // dasar gelap
                    light: '#064663',       // lebih terang
                    contrast: '#ecf0f1',    // teks putih terang
                },
                primary: {
                    DEFAULT: '#5e72e4',
                    dark: '#233dd2',
                },
                secondary: '#f4f5f7',
                info: '#11cdef',
                success: '#2dce89',
                danger: '#f5365c',
                warning: '#fb6340',
                neutral: '#8898aa',
                gray: defaultTheme.colors.gray,
                blue: defaultTheme.colors.blue,
                emerald: defaultTheme.colors.emerald,
            },
            boxShadow: {
                card: '0 0.75rem 1.5rem rgba(18, 38, 63, 0.03)',
                navbar: '0 1px 2px rgba(0, 0, 0, 0.05)',
            },
            borderRadius: {
                xl: '1rem',
                '2xl': '1.5rem',
            },
            spacing: {
                18: '4.5rem',
                22: '5.5rem',
            },
            animation: {
                fade: 'fadeIn 0.5s ease-in-out',
                'fade-in-down': 'fadeInDown 0.5s ease-out',
                'fade-in-up': 'fadeInUp 0.6s ease-out',
                'slide-in-left': 'slideInLeft 0.6s ease-out',
                'slide-in-right': 'slideInRight 0.6s ease-out',
                'bounce-in': 'bounceIn 0.6s ease-out',
                'pulse-soft': 'pulseSoft 1.5s ease-in-out infinite',
                'spin-slow': 'spin 6s linear infinite',
            },
            keyframes: {
                fadeIn: {
                    '0%': { opacity: 0 },
                    '100%': { opacity: 1 },
                },
                fadeInDown: {
                    '0%': { opacity: 0, transform: 'translateY(-20px)' },
                    '100%': { opacity: 1, transform: 'translateY(0)' },
                },
                fadeInUp: {
                    '0%': { opacity: 0, transform: 'translateY(20px)' },
                    '100%': { opacity: 1, transform: 'translateY(0)' },
                },
                slideInLeft: {
                    '0%': { opacity: 0, transform: 'translateX(-40px)' },
                    '100%': { opacity: 1, transform: 'translateX(0)' },
                },
                slideInRight: {
                    '0%': { opacity: 0, transform: 'translateX(40px)' },
                    '100%': { opacity: 1, transform: 'translateX(0)' },
                },
                bounceIn: {
                    '0%, 20%, 40%, 60%, 80%, 100%': {
                        transform: 'translateY(0)',
                    },
                    '50%': {
                        transform: 'translateY(-10px)',
                    },
                },
                pulseSoft: {
                    '0%, 100%': { opacity: 1 },
                    '50%': { opacity: 0.7 },
                },
            },
        },
    },

    plugins: [
        forms,
        require('@tailwindcss/typography'),
        require('@tailwindcss/aspect-ratio'),
    ],
};
