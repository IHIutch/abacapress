module.exports = {
  important: true,
  variants: {
    margin: ["responsive", "hover"],
  },
  theme: {
    extend: {
      inset: {
        "20": "5rem",
        "40": "10rem",
      },
      spacing: {
        "9/16": "56.25%",
        "2/3": "66.666667%",
        "14": "3.5rem",
      },
      colors: {
        tan: "#F7F0E9",
        "tan-600": "#E0D3C2",
        brown: "#3D1F00",
        red: "#FF4552",
      },
      fontFamily: {
        gotu: "Gotu",
        karla: "Karla",
        "barlow-condensed": "Barlow Condensed",
      },
    },
  },
};
