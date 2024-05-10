/** @type {import('tailwindcss').Config} */
const colors = require("tailwindcss/colors");

const config = {
    content: ["./resources/**/*.{vue,js,ts,jsx,tsx,blade.php}"],
    theme: {
        extend: {
            backgroundOpacity: ["active"],
            aspectRatio: {
                "3/1": "3 / 1",
                "2/3": "2 / 3",
            },
            boxShadow: {
                'sm': '0 1.5px 5px 0 rgb(0 0 0 / 0.09)',
            }
        },
        colors: {
            inherit: "inherit",
            current: "currentColor",
            transparent: "transparent",
            black: "#000",
            white: "#fff",
            slate: colors.slate,
            gray: colors.gray,
            zinc: colors.zinc,
            red: colors.red,
            amber: colors.amber,
            yellow: colors.yellow,
            lime: colors.lime,
            green: colors.green,
            emerald: colors.emerald,
            teal: colors.teal,
            cyan: colors.cyan,
            sky: colors.sky,
            blue: colors.blue,
            fuchsia: colors.fuchsia,
            pink: colors.pink,
            rose: colors.rose,
            primary: colors.pink,
            "primary-main": colors.pink[500],
            cGray1: "#FBFBFB",
            cGray2: "#EDEDED",
            cGray3: "#656565",
        },
        screens: {
            xs: "360px",
            sm: "640px",
            md: "768px",
            lg: "1024px",
            xl: "1280px",
        },
        container: {
            center: true,
        },
    },
};

export default config;
