const colors = require('./tailwind-colors');

/**
 * @type {import('tailwindcss').Config}
 *
 */
module.exports = {
    content: [
        "./public/libs/tailwind/import.css",
        "./resources/views/**/*.php",
    ],
    theme: {
        screens: {
            sm: "540px",
            // => @media (min-width: 576px) { ... }

            md: "720px",
            // => @media (min-width: 768px) { ... }

            lg: "960px",
            // => @media (min-width: 992px) { ... }

            xl: "1140px",
            // => @media (min-width: 1200px) { ... }

            "2xl": "1320px",
            // => @media (min-width: 1400px) { ... }
        },
        container: {
            center: true,
            padding: "16px",
        },
        extend: {
            colors: {
                "color-main": colors.color_main,
                "primary": colors.primary,
                "secondary": colors.secondary,
                "success": colors.success,
                "info": colors.info,
                "warning": colors.warning,
                "danger": colors.danger,
                "light": colors.light,
                "dark": colors.dark,
            },
            boxShadow: {
                input: "0px 7px 20px rgba(0, 0, 0, 0.03)",
                pricing: "0px 39px 23px -27px rgba(0, 0, 0, 0.04)",
                "switch-1": "0px 0px 5px rgba(0, 0, 0, 0.15)",
                testimonial: "0px 60px 120px -20px #EBEFFD",
            },
            zIndex: {
                "9999": "9999",
            }
        },
    },
    plugins: [
        function ({ addUtilities }) {
            const newUtilities = {
                '.btn': {
                    padding: '0.5rem 1rem',
                    borderRadius: '0.25rem',
                    display: 'block',
                },
                '.btn-success': {
                    backgroundColor: colors.success,
                    border: `1px solid ${colors.success}`,
                    color: '#fff',
                    transition: '.4s all',
                    '&:hover': {
                        backgroundColor: '#fff',
                        color: colors.success,
                    },
                },
                '.btn-danger': {
                    backgroundColor: colors.danger,
                    border: `1px solid ${colors.danger}`,
                    color: '#fff',
                    transition: '.4s all',
                    '&:hover': {
                        backgroundColor: '#fff',
                        color: colors.danger,
                    },
                },
                '.btn-primary': {
                    backgroundColor: colors.primary,
                    border: `1px solid ${colors.primary}`,
                    color: '#fff',
                    transition: '.4s all',
                    '&:hover': {
                        backgroundColor: '#fff',
                        color: colors.primary,
                    },
                },
                '.btn-color-main': {
                    backgroundColor: colors.color_main,
                    border: `1px solid ${colors.color_main}`,
                    color: '#fff',
                    transition: '.4s all',
                    '&:hover': {
                        backgroundColor: '#fff',
                        color: colors.color_main,
                    },
                },
                '.btn-secondary': {
                    backgroundColor: colors.secondary,
                    border: `1px solid ${colors.secondary}`,
                    color: '#fff',
                    transition: '.4s all',
                    '&:hover': {
                        backgroundColor: '#fff',
                        color: colors.secondary,
                    },
                },
                '.btn-info': {
                    backgroundColor: colors.info,
                    border: `1px solid ${colors.info}`,
                    color: '#fff',
                    transition: '.4s all',
                    '&:hover': {
                        backgroundColor: '#fff',
                        color: colors.info,
                    },
                },
            };

            addUtilities(newUtilities, ['responsive', 'hover']);
        },
    ],
}
