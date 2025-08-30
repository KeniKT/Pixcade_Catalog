/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./index.html",
    "./src/**/*.{js,ts,jsx,tsx}",
  ],
  theme: {
    extend: {
      colors: {
        'red': '#F95142',
        'white': '#F3EDE3',
        'blue': '#1F2F49',
        'blue-lite': '#84A3A5',
      },
      fontFamily: {
        electrolize: ['Electrolize', 'sans-serif'],
        lato: ['Lato', 'sans-serif'],
      },
    },
  },
  plugins: [],
}

