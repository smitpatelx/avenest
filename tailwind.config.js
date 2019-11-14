// See default config https://github.com/tailwindcss/tailwindcss/blob/master/stubs/defaultConfig.stub.js
module.exports = {
  theme: {
    backgroundColor: theme => ({
      ...theme('colors'),
      'primary-100': '#739DDF',
      'primary-200': '#5F8FDB',
      'primary-300': '#4B81D6',
      'primary-400': '#3773D2',
      'primary-500': '#2366CE',
      'primary-600': '#205DBC',
      'primary-700': '#1D54A9',
      'primary-800': '#1A4B96'
    }),
    textColor: theme => ({
      ...theme('colors'),
      'primary-100': '#739DDF',
      'primary-200': '#5F8FDB',
      'primary-300': '#4B81D6',
      'primary-400': '#3773D2',
      'primary-500': '#2366CE',
      'primary-600': '#205DBC',
      'primary-700': '#1D54A9',
      'primary-800': '#1A4B96',
    }),
    borderColor: theme => ({
      ...theme('colors'),
      'primary-100': '#739DDF',
      'primary-200': '#5F8FDB',
      'primary-300': '#4B81D6',
      'primary-400': '#3773D2',
      'primary-500': '#2366CE',
      'primary-600': '#205DBC',
      'primary-700': '#1D54A9',
      'primary-800': '#1A4B96',
    }),
    boxShadow: {
      'default': '0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06)',
      'md': ' 0 4px 6px -1px rgba(0, 0, 0, .1), 0 2px 4px -1px rgba(0, 0, 0, .06)',
      'lg': ' 0 10px 15px -3px rgba(0, 0, 0, .1), 0 4px 6px -2px rgba(0, 0, 0, .05)',
      'xl': ' 0 20px 25px -5px rgba(0, 0, 0, .1), 0 10px 10px -5px rgba(0, 0, 0, .04)',
      'md-e': ' 0 0px 6px -1px rgba(0, 0, 0, .1), 0 2px 4px -1px rgba(0, 0, 0, .06)',
      'lg-e': ' 0 0px 15px -3px rgba(0, 0, 0, .1), 0 4px 6px -2px rgba(0, 0, 0, .05)',
      'xl-e': ' 0 0px 25px -5px rgba(0, 0, 0, .1), 0 10px 10px -5px rgba(0, 0, 0, .04)',
      '2xl': '0 25px 50px -12px rgba(0, 0, 0, .25)',
      '3xl': '0 35px 60px -15px rgba(0, 0, 0, .3)',
      'inner': 'inset 0 2px 4px 0 rgba(0,0,0,0.06)',
      'outline': '0 0 0 3px rgba(66,153,225,0.5)',
      'focus': '0 0 0 3px rgba(66,153,225,0.5)',
      'none': 'none'
    }
  },
  variants: {},
  plugins: []
};
