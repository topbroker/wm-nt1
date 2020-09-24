const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  future: {
    removeDeprecatedGapUtilities: true,
    purgeLayersByDefault: true,
  },
  purge: [
    './resources/views/**/*.php',
  ],
  theme: {
    extend: {
      fontFamily: {
        montserrat: ['Montserrat', ...defaultTheme.fontFamily.serif],
        open: ['Open Sans', ...defaultTheme.fontFamily.sans],
      },
      colors: {
        black: {
          1: '#1f1f21',
        },
        red: {
          1: '#f1525c',
          2: '#f06770',
        },
        gray: {
          1: '#f0f0f0',
        },
      },
      fontSize: {
        '14px': '0.875rem',
      },
      maxWidth: {
        '200px': '200px',
        '300px': '300px',
      },
    },
  },
  variants: {},
  plugins: [],
}
