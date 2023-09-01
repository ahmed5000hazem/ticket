import preset from './vendor/filament/support/tailwind.config.preset'

export default {
    plugins: [require("@tailwindcss/typography"), require("daisyui")],
    presets: [preset],
    content: [
        './app/Filament/**/*.php',
        './resources/views/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
}
