// postcss.config.js
const purgecss = require("@fullhuman/postcss-purgecss")({
  content: ["./**/*.twig"],
  whitelist: [],
  defaultExtractor: (content) => content.match(/[A-z0-9-:\\/]+/g) || [],
});

module.exports = {
  plugins: [
    require("postcss-import"),
    require("tailwindcss"),
    require("autoprefixer"),
    ...(process.env.NODE_ENV === "production" ? [purgecss] : []),
  ],
};
