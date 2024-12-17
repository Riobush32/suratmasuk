/** @type {import('tailwindcss').Config} */
export default {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    ],
    safelist: [
        'bg-red-600',
        'bg-blue-600',
        'bg-green-600',
        'bg-yellow-600',
        'bg-purple-600',
        'bg-pink-600',
        'bg-gray-600',
        'bg-indigo-600',
        'bg-cyan-600',
        'bg-emerald-600',
        'bg-orange-600',
        'bg-teal-600',
        'bg-lime-600',
        'bg-red-300',
        'bg-blue-300',
        'bg-green-300',
        'bg-yellow-300',
        'bg-purple-300',
        'bg-pink-300',
        'bg-gray-300',
        'bg-indigo-300',
        'bg-cyan-300',
        'bg-emerald-300',
        'bg-orange-300',
        'bg-teal-300',
        'bg-lime-300',
        'text-red-600',
        'text-blue-600',
        'text-green-600',
        'text-yellow-600',
        'text-purple-600',
        'text-pink-600',
        'text-gray-600',
        'text-indigo-600',
        'text-cyan-600',
        'text-emerald-600',
        'text-orange-600',
        'text-teal-600',
        'text-lime-600',
        'text-red-300',
        'text-blue-300',
        'text-green-300',
        'text-yellow-300',
        'text-purple-300',
        'text-pink-300',
        'text-gray-300',
        'text-indigo-300',
        'text-cyan-300',
        'text-emerald-300',
        'text-orange-300',
        'text-teal-300',
        'text-lime-300',

        'badge-red-600',
        'badge-blue-600',
        'badge-green-600',
        'badge-yellow-600',
        'badge-purple-600',
        'badge-pink-600',
        'badge-gray-600',
        'badge-indigo-600',
        'badge-cyan-600',
        'badge-emerald-600',
        'badge-orange-600',
        'badge-teal-600',
        'badge-lime-600',
        'badge-red-300',
        'badge-blue-300',
        'badge-green-300',
        'badge-yellow-300',
        'badge-purple-300',
        'badge-pink-300',
        'badge-gray-300',
        'badge-indigo-300',
        'badge-cyan-300',
        'badge-emerald-300',
        'badge-orange-300',
        'badge-teal-300',
        'badge-lime-300',
    ],
    theme: {
      extend: {
        fontFamily: {
          body: ["Itim" ],
          banner: ["Outfit"],
          logo:["Delius"],
        }
      },
    },
    plugins: [
        require('daisyui'),
        require('tailwind-scrollbar'),

    ],
    daisyui: {
    themes: [
      {
        mytheme: {
          "primary": "#F9740E",
          "secondary": "#5A5A5A",
          "accent": "#FF0000",
          "neutral": "#757575",
          "base-100": "#ffffff",
          "alfa": "#F4F4F4",
        },
      },
      "dark",
      "cupcake",
    ],

  },
  }
