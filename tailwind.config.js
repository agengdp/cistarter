module.exports = {
	mode: 'jit',
  purge: [
		'./application/views/**/*.php'
	],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {},
  },
  variants: {
    extend: {},
  },
  plugins: [
		require('@tailwindcss/forms'),
	],
}
