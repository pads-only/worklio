import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                /*
                |--------------------------------------------------------------------------
                | WORKLIO MONOCHROMATIC LIGHT THEME
                |--------------------------------------------------------------------------
                */

                background: "#F6F8FC",
                foreground: "#0F172A",

                surface: "#FFFFFF",
                sidebar: "#EEF2FF",

                border: "#E2E8F0",
                input: "#CBD5E1",
                ring: "#4F6EF7",

                muted: {
                    DEFAULT: "#F1F5F9",
                    foreground: "#64748B",
                },

                primary: {
                    50: "#F5F8FF",
                    100: "#E8EEFF",
                    200: "#C7D5FF",
                    300: "#A5BAFF",
                    400: "#7D96FF",
                    500: "#4F6EF7",
                    600: "#3E5CE0",
                    700: "#324BB7",
                    800: "#283D93",
                    900: "#1E2F70",
                    foreground: "#FFFFFF",
                },

                secondary: {
                    DEFAULT: "#EEF2FF",
                    foreground: "#334155",
                },

                accent: {
                    DEFAULT: "#E8EEFF",
                    foreground: "#324BB7",
                },

                success: {
                    light: "#DCFCE7",
                    DEFAULT: "#22C55E",
                    dark: "#15803D",
                },

                warning: {
                    light: "#FEF3C7",
                    DEFAULT: "#F59E0B",
                    dark: "#B45309",
                },

                destructive: {
                    light: "#FEE2E2",
                    DEFAULT: "#EF4444",
                    dark: "#B91C1C",
                },

                info: {
                    light: "#DBEAFE",
                    DEFAULT: "#3B82F6",
                    dark: "#1D4ED8",
                },
            },

            /*
            |--------------------------------------------------------------------------
            | BORDER RADIUS
            |--------------------------------------------------------------------------
            */

            borderRadius: {
                xl: "14px",
                "2xl": "18px",
                "3xl": "24px",
            },

            /*
            |--------------------------------------------------------------------------
            | BOX SHADOWS
            |--------------------------------------------------------------------------
            */

            boxShadow: {
                soft: "0 1px 2px rgba(15, 23, 42, 0.04)",

                card: `
          0 1px 2px rgba(15, 23, 42, 0.04),
          0 8px 24px rgba(15, 23, 42, 0.04)
        `,

                floating: `
          0 10px 30px rgba(15, 23, 42, 0.08)
        `,

                glow: `
          0 0 0 4px rgba(79, 110, 247, 0.12)
        `,
            },

            /*
            |--------------------------------------------------------------------------
            | FONT FAMILY
            |--------------------------------------------------------------------------
            */

            fontFamily: {
                sans: [
                    "Inter",
                    "ui-sans-serif",
                    "system-ui",
                ],

                mono: [
                    "JetBrains Mono",
                    "monospace",
                ],
            },

            /*
            |--------------------------------------------------------------------------
            | SPACING SYSTEM
            |--------------------------------------------------------------------------
            */

            spacing: {
                18: "4.5rem",
                22: "5.5rem",
                26: "6.5rem",
                30: "7.5rem",
            },

            /*
            |--------------------------------------------------------------------------
            | BACKGROUND GRADIENTS
            |--------------------------------------------------------------------------
            */

            backgroundImage: {
                "worklio-gradient":
                    "linear-gradient(to bottom right, #dbeafe 0%, #f8faff 45%, #dbeafe 100%)",

                "primary-gradient":
                    "linear-gradient(to right, #4F6EF7, #7D96FF)",
            },

            /*
            |--------------------------------------------------------------------------
            | ANIMATIONS
            |--------------------------------------------------------------------------
            */

            keyframes: {
                float: {
                    "0%, 100%": {
                        transform: "translateY(0px)",
                    },
                    "50%": {
                        transform: "translateY(-4px)",
                    },
                },

                fadeIn: {
                    from: {
                        opacity: "0",
                        transform: "translateY(6px)",
                    },
                    to: {
                        opacity: "1",
                        transform: "translateY(0px)",
                    },
                },
            },

            animation: {
                float: "float 4s ease-in-out infinite",
                fadeIn: "fadeIn 0.3s ease-out",
            },
        },
    },

    plugins: [forms],
};


// tailwind.config.js

// /** @type {import('tailwindcss').Config} */
// export default {
//     darkMode: ["class"],

//     content: [
//         "./index.html",
//         "./src/**/*.{js,ts,jsx,tsx}",
//     ],

//     theme: {
//         container: {
//             center: true,
//             padding: "1.5rem",
//             screens: {
//                 "2xl": "1440px",
//             },
//         },

//         extend: {
//             colors: {
//                 /*
//                 |--------------------------------------------------------------------------
//                 | WORKLIO MONOCHROMATIC LIGHT THEME
//                 |--------------------------------------------------------------------------
//                 */

//                 background: "#F6F8FC",
//                 foreground: "#0F172A",

//                 surface: "#FFFFFF",
//                 sidebar: "#EEF2FF",

//                 border: "#E2E8F0",
//                 input: "#CBD5E1",
//                 ring: "#4F6EF7",

//                 muted: {
//                     DEFAULT: "#F1F5F9",
//                     foreground: "#64748B",
//                 },

//                 primary: {
//                     50: "#F5F8FF",
//                     100: "#E8EEFF",
//                     200: "#C7D5FF",
//                     300: "#A5BAFF",
//                     400: "#7D96FF",
//                     500: "#4F6EF7",
//                     600: "#3E5CE0",
//                     700: "#324BB7",
//                     800: "#283D93",
//                     900: "#1E2F70",
//                     foreground: "#FFFFFF",
//                 },

//                 secondary: {
//                     DEFAULT: "#EEF2FF",
//                     foreground: "#334155",
//                 },

//                 accent: {
//                     DEFAULT: "#E8EEFF",
//                     foreground: "#324BB7",
//                 },

//                 success: {
//                     light: "#DCFCE7",
//                     DEFAULT: "#22C55E",
//                     dark: "#15803D",
//                 },

//                 warning: {
//                     light: "#FEF3C7",
//                     DEFAULT: "#F59E0B",
//                     dark: "#B45309",
//                 },

//                 destructive: {
//                     light: "#FEE2E2",
//                     DEFAULT: "#EF4444",
//                     dark: "#B91C1C",
//                 },

//                 info: {
//                     light: "#DBEAFE",
//                     DEFAULT: "#3B82F6",
//                     dark: "#1D4ED8",
//                 },
//             },

//             /*
//             |--------------------------------------------------------------------------
//             | BORDER RADIUS
//             |--------------------------------------------------------------------------
//             */

//             borderRadius: {
//                 xl: "14px",
//                 "2xl": "18px",
//                 "3xl": "24px",
//             },

//             /*
//             |--------------------------------------------------------------------------
//             | BOX SHADOWS
//             |--------------------------------------------------------------------------
//             */

//             boxShadow: {
//                 soft: "0 1px 2px rgba(15, 23, 42, 0.04)",

//                 card: `
//           0 1px 2px rgba(15, 23, 42, 0.04),
//           0 8px 24px rgba(15, 23, 42, 0.04)
//         `,

//                 floating: `
//           0 10px 30px rgba(15, 23, 42, 0.08)
//         `,

//                 glow: `
//           0 0 0 4px rgba(79, 110, 247, 0.12)
//         `,
//             },

//             /*
//             |--------------------------------------------------------------------------
//             | FONT FAMILY
//             |--------------------------------------------------------------------------
//             */

//             fontFamily: {
//                 sans: [
//                     "Inter",
//                     "ui-sans-serif",
//                     "system-ui",
//                 ],

//                 mono: [
//                     "JetBrains Mono",
//                     "monospace",
//                 ],
//             },

//             /*
//             |--------------------------------------------------------------------------
//             | SPACING SYSTEM
//             |--------------------------------------------------------------------------
//             */

//             spacing: {
//                 18: "4.5rem",
//                 22: "5.5rem",
//                 26: "6.5rem",
//                 30: "7.5rem",
//             },

//             /*
//             |--------------------------------------------------------------------------
//             | BACKGROUND GRADIENTS
//             |--------------------------------------------------------------------------
//             */

//             backgroundImage: {
//                 "worklio-gradient":
//                     "linear-gradient(to bottom right, #ffffff, #f5f8ff)",

//                 "primary-gradient":
//                     "linear-gradient(to right, #4F6EF7, #7D96FF)",
//             },

//             /*
//             |--------------------------------------------------------------------------
//             | ANIMATIONS
//             |--------------------------------------------------------------------------
//             */

//             keyframes: {
//                 float: {
//                     "0%, 100%": {
//                         transform: "translateY(0px)",
//                     },
//                     "50%": {
//                         transform: "translateY(-4px)",
//                     },
//                 },

//                 fadeIn: {
//                     from: {
//                         opacity: "0",
//                         transform: "translateY(6px)",
//                     },
//                     to: {
//                         opacity: "1",
//                         transform: "translateY(0px)",
//                     },
//                 },
//             },

//             animation: {
//                 float: "float 4s ease-in-out infinite",
//                 fadeIn: "fadeIn 0.3s ease-out",
//             },
//         },
//     },

//     plugins: [],
// };