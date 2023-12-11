/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],
    theme: {
        extend: {
            colors: {
                primary: "#4774E7",
                primary2: "#2E5DD5",
                secondary: "#F6F6F6",
            }
        },
    },
    plugins: [
        require('flowbite/plugin')
    ],
}

