module.exports = {
  content: [
    // https://tailwindcss.com/docs/content-configuration
    './*.php',
    './inc/**/*.php',
    './templates/**/*.php',
    './template-parts/**/*.php',
    './safelist.txt'
    //'./**/*.php', // recursive search for *.php (be aware on every file change it will go even through /node_modules which can be slow, read doc)
  ],
  safelist: [
    'text-center'
    //{
    //  pattern: /text-(white|black)-(200|500|800)/
    //}
  ],
  theme: {
    extend: {},
    // container: {
    //     padding: {
    //       DEFAULT: '1rem',
    //       sm: '2rem',
    //       lg: '4rem',
    //       xl: '5rem',
    //       '2xl': '6rem',
    //     },
    //   },
  },
  plugins: []
}
