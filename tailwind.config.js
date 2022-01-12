const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },

        theme: {
            screens: {
              'tablet': '640px',
              // => @media (min-width: 640px) { ... }
        
              'laptop': '1024px',
              // => @media (min-width: 1024px) { ... }
        
              'desktop': '1280px',
              // => @media (min-width: 1280px) { ... }
            },
          }

        
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
