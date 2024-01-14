/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                laravel: "#1a0f0d",
                buttonBg: "#ef3b2d",
            },
        },
    },
    plugins: [],
};
