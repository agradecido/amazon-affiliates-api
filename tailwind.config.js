/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './src/**/*.php',
    './assets/**/*.css',
    './**/*.php'
  ],
  theme: {
    extend: {
      colors: {
        primary: '#1a202c',
        secondary: '#718096',
        accent: '#4a5568',
        background: '#f7fafc',
        text: '#2d3748'
      },
    },
  },
  variants: {},
  plugins: [],
}
