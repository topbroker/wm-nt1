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
      spacing: {
        '4px': '4px',
        '5px': '5px',
        '10px': '10px',
        '13px': '13px',
        '14px': '14px',
        '15px': '15px',
        '20px': '20px',
        '24px': '24px',
        '30px': '30px',
        '38px': '38px',
        '40px': '40px',
        '48px': '48px',
        '50px': '50px',
        '60px': '60px',
        '70px': '70px',
        '80px': '80px',
        '90px': '90px',
        '100px': '100px',
        '150px': '150px',
        '160px': '160px',
      },
      colors: {
        black: {
          1: '#1f1f21',
          2: '#233039',
          3: '#454142',
        },
        red: {
          1: '#f1525c',
          2: '#f06770',
        },
        gray: {
          1: '#f0f0f0',
          2: '#dedede',
          3: '#e4e4e4',
          4: '#898787',
          5: '#ddddd6',
        },
        blue: {
          1: '#465bf2',
        },
        yellow: {
          1: '#f2d36b',
        },
        brown: {
          1: '#454142',
        },
      },
      fontSize: {
        '12px': '0.75rem',
        '13px': '0.812rem',
        '14px': '0.875rem',
        '18px': '1.125rem',
        '20px': '1.25rem',
        '24px': '1.5rem',
        '26px': '1.625rem',
        '30px': '1.875rem',
        '40px': '2.5rem',
        '60px': '3.75rem',
      },
      minHeight: {
        '110px': '110px',
        '140px': '140px',
      },
      height: {
        '119px': '119px',
        '160px': '160px',
        '200px': '200px',
        '280px': '280px',
      },
      maxHeight: {
        '520px': '520px',
      },
      width: {
        '164px': '164px',
        '261px': '261px',
        '358px': '358px',
      },
      maxWidth: {
        '160px': '160px',
        '200px': '200px',
        '300px': '300px',
        '485px': '485px',
        '537px': '537px',
      },
      boxShadow: {
        'custom-1': '1px 1px 2px rgba(0, 0, 0, 0.16)',
        'custom-2': '-6px -6px 16px rgba(255, 255, 255, 0.12)',
      },
    },
  },
  variants: {},
  plugins: [],
  corePlugins: {
    container: false,
  },
}
