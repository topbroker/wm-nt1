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
      zIndex: {
        150: '150',
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
          1: 'var(--theme-color-4)',
          2: '#233039',
          3: '#454142',
        },
        red: {
          1: 'var(--theme-color-1)',
          2: 'var(--theme-color-1-hover)',
        },
        gray: {
          1: 'var(--theme-color-5)',
          2: '#dedede',
          3: '#e4e4e4',
          4: '#898787',
          5: '#ddddd6',
        },
        blue: {
          1: 'var(--theme-color-3)',
        },
        yellow: {
          1: 'var(--theme-color-2)',
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
        '220px': '220px',
        '260px': '260px',
        '280px': '280px',
        '350px': '350px',
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
        '100px': '100px',
        '160px': '160px',
        '200px': '200px',
        '260px': '260px',
        '300px': '300px',
        '485px': '485px',
        '537px': '537px',
        '668px': '668px',
      },
      boxShadow: {
        'custom-1': '1px 1px 2px rgba(0, 0, 0, 0.16)',
        'custom-2': '-6px -6px 16px rgba(255, 255, 255, 0.12)',
      },
    },
  },
  variants: {},
  plugins: [
    require('@tailwindcss/typography'),
  ],
  corePlugins: {
    container: false,
  },
}
