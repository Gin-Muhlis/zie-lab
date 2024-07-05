/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",

  ],

  theme: {
    extend: {
      gridTemplateColumns: {
        'fit': 'repeat(auto-fit, minmax(200px, 1fr))',
      },

      spacing: {
        '883': '883px',
        '992': '992px',
        '500': '500px',
        '600': '600px',
        'hero': 'calc(100vh - 80px)',
      },

      dropShadow: {
        'down': '0 10px 10px rgba(0, 0, 0, .3)',
      },

      colors: {
        'second-background': '#1A1A1A',
        'primary-background': '#EFF0F6',
        'primary': '#F59E0B',
        'secondary': '#2C37F5',
      }
    },
    fontFamily: {
      'inter': ['Inter', 'sans-serif'],
    }
  },
  plugins: [],
}

