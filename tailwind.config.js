/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js,php}", "./*.{html,js,php}"],
  theme: {
    extend: {},
  },
  plugins: [require("daisyui")],
  daisyui: {
    themes: [
      {
        mytheme: {
          primary: "#03626F",
          secondary: "#3f95a1",
          accent: "#37cdbe",
        },
      },
      "light",
    ],
  },
};
