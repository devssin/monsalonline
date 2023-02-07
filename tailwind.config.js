/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./index.html",
    "./src/**/*.{vue,js,ts,jsx,tsx}",
  ],
  theme: {
    extend: {
      colors: {
        'primary' : "#898876"
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms')
  ],
}