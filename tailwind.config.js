/** @type {import('tailwindcss').Config} */
export default {
  content: [
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
        './node_modules/flowbite/**/*.js',
        './resources/views/**/*.blade.php',
      ],
  theme: {
    extend: {},
  },
  plugins: [],
}

