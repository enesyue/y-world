/** @type {import('tailwindcss').Config} config */
const config = {
  content: ['./index.php', './app/**/*.php', './resources/**/*.{php,vue,js}'],
  theme: {
    container: {
      center: true,
      padding: '1.5rem',
    },
    fontFamily: {
      inter: ['Inter-tight', 'sans-serif'],
      base: ['Inter-tight', 'sans-serif'],
    },
    extend: {
      colors: {
        primary: '#bb004b',
        secondary: '#77048f',
        tertiary: '#da2a00',
        default: '#333333',
        dark: '#111111',
        light: '#f5f5f5',
      },
      aspectRatio: {
        '1/1': '1 / 1',
        '1/2': '1 / 2',
        '2/1': '2 / 1',
        '2/3': '2 / 3',
        '3/2': '3 / 2',
        '4/3': '4 / 3',
        '3/4': '3 / 4',
        '16/9': '16 / 9',
        '9/16': '9 / 16',
      },

    },
  },
  plugins: [],
  darkMode: 'class',
};

export default config;
