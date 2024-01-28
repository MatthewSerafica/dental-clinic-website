/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
        "node_modules/flowbite-vue/**/*.{js,jsx,ts,tsx}",
    ],
    theme: {
        extend: {
            screens: {
                tablet: "640px",
                // => @media (min-width: 640px) { ... }

                laptop: "1400px",
                // => @media (min-width: 1024px) { ... }

                desktop: "1600px",
                // => @media (min-width: 1280px) { ... }
            },
            gridTemplateRows: {
                7: "repeat(7, minmax(0, 1fr))",
                8: "repeat(8, minmax(0, 1fr))",
                16: "repeat(16, minmax(0, 1fr))",
                21: "repeat(21, minmax(0, 1fr))",
                24: "repeat(24, minmax(0, 1fr))",
            },
            gridTemplateColumns: {
                16: "repeat(16, minmax(0, 1fr))",
            },
            gridColumn: {
                "span-16": "span 16 / span 16",
            },
            gridRowStart: {
                8: "8",
                9: "9",
                10: "10",
                11: "11",
                12: "12",
                13: "13",
                14: "14",
                15: "15",
                16: "16",
                17: "17",
                18: "18",
                19: "19",
                20: "20",
                21: "21",
                22: "22",
            },
            gridColumnStart: {
                8: "8",
                9: "9",
                10: "10",
                11: "11",
                12: "12",
                13: "13",
                14: "14",
                15: "15",
                16: "16",
                17: "17",
                18: "18",
                19: "19",
                20: "20",
                21: "21",
                22: "22",
            },
            gridColumnEnd: {
                8: "8",
                9: "9",
                10: "10",
                11: "11",
                12: "12",
                13: "13",
                14: "14",
                15: "15",
                16: "16",
                17: "17",
                18: "18",
                19: "19",
                20: "20",
                21: "21",
                22: "22",
            },
        },
    },
    plugins: [
        require("@tailwindcss/forms"),
        require("flowbite/plugin")({
            charts: true,
        }),
    ],
};
