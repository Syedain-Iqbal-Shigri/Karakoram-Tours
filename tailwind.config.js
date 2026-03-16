/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            colors: {
                pearl: {
                    50: '#FDFCFA',
                    100: '#F9F6F0',
                    200: '#F3EDE3',
                    300: '#E8DFD0',
                    400: '#D4C7B5',
                    500: '#B8A88F',
                },
                earth: {
                    600: '#5C4A32',
                    700: '#3D2E1F',
                    800: '#2A1F14',
                    900: '#1A140D',
                },
                accent: {
                    DEFAULT: '#C4956A',
                    dark: '#A67B4F',
                },
            },
            fontFamily: {
                display: ['Playfair Display', 'Georgia', 'serif'],
                sans: ['Inter', 'system-ui', 'sans-serif'],
            },
        },
    },
    plugins: [],
}