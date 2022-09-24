/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue"
  ],
  theme: {
    extend: {
      spacing: {
        '10p': '7%',
        '15p': '15%',
        '30p': '30%',
        '40p': '40%',
        '42p': '42%',
        '45p': '45%',
        '50p': '50%',
        '104': '30rem',
        '140': '37rem'
      }
    },
  },
  plugins: [

  ],
}
