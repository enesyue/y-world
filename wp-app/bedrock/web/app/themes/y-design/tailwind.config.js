/** @type {import('tailwindcss').Config} config */
const config = {
  content: ['./index.php', './app/**/*.php', './resources/**/*.{php,vue,js}'],
  theme: {
    container: {
      center: true,
      padding: '1.5rem',
    },
  },
  plugins: [],
};

export default config;
