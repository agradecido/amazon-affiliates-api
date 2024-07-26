/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './src/**/*.php',
    './assets/**/*.css',
    './*.php'
  ],
  theme: {
    extend: {
      colors: {
        primary: '#1a202c', // Gris oscuro
        secondary: '#718096', // Gris intermedio
        accent: '#4a5568', // Gris cálido
        background: '#f7fafc', // Blanco suave
        text: '#2d3748' // Gris carbón
      },
    },
  },
  variants: {},
  plugins: [],
}
