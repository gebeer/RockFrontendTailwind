/** @type {import('tailwindcss').Config} */
module.exports = {
  content: process.env.TAILWIND_CONTENT.split(","),
  theme: {
    fontFamily: {
      // 'sans': ['MaderaRegular', 'sans-serif'],
      // 'bold': ['MaderaBold', 'sans-serif'] 
    },
    fontWeight: {
      // normal: 400,
      // bold: 400,
    },
    extend: {
      screens: {
        // '3xl': '1920px',
        // => @media (min-width: 1920px) { ... }
      },
      colors: {
        // transparent: 'transparent',
        // current: 'currentColor',
        // black: '#000000',
        // white: '#FFFFFF',
      },
    },
  },
  plugins: [],
}
