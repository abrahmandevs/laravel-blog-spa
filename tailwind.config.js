/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {


            /* Hide scrollbar for Chrome, Safari and Opera */
            scrollbarNone: {
                /* For Webkit */
                '::-webkit-scrollbar': {
                  display: 'none',
                },
                /* For IE, Edge, and Firefox */
                '-ms-overflow-style': 'none',
                'scrollbar-width': 'none',
              },
        },
    },
    plugins: [
        require('@tailwindcss/typography'),
        require('@tailwindcss/forms'),
        require('@tailwindcss/aspect-ratio'),
    ],
}

