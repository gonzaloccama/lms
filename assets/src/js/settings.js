const hexToRGB = (hex, alpha) => {
  const r = parseInt(hex.slice(1, 3), 16)
  const g = parseInt(hex.slice(3, 5), 16)
  const b = parseInt(hex.slice(5, 7), 16)

  if (alpha) {
    return "rgba(" + r + ", " + g + ", " + b + ", " + alpha + ")"
  } else {
    return "rgb(" + r + ", " + g + ", " + b + ")"
  }
}

const fonts = { base: "Helvetica Neue" }

// https://material.io/design/color/the-color-system.html#tools-for-picking-colors
const colors = {
  bodyBg: '#F7F8F9',
  border: '#efefef',
  gray: {
    50: '#edeef0',
    100: '#d0d6dc',
    200: '#b2bac4',
    300: '#939fad',
    400: '#7c8a9b',
    500: '#65778a',
    600: '#586879',
    700: '#485563',
    800: '#39424d',
    900: '#272e36'
  },
  primary: {
    50: '#e4f3ff',
    100: '#bde0ff',
    200: '#92cdff',
    300: '#67b9ff',
    400: '#46aaff',
    500: '#1367C9', // $primary
    600: '#288df0',
    700: '#247add',
    800: '#2169cb',
    900: '#1c4aac'
  },
  success: {
    50: '#edf9e6',
    100: '#d1f0c2',
    200: '#b2e599',
    300: '#91db6e',
    400: '#75d34a',
    500: '#58ca1f',
    600: '#47ba16', // $success
    700: '#2ba607',
    800: '#009200',
    900: '#006f00',
  },
  danger: {
    50: '#feeaef',
    100: '#fccad5',
    200: '#ec949f',
    300: '#e26979',
    400: '#ee405a',
    500: '#f52042',
    600: '#e51240',
    700: '#d3003a',
    800: '#c60032',
    900: '#b70026'
  },
  black: '#12263F',
  white: '#FFFFFF',
  transparent: 'transparent',
  get(color) {
    return color.split('.').reduce((o,i)=>o[i], this)
  }
}

const charts = {
  colorScheme: 'light',
  colors: {
    area: hexToRGB(colors.primary[100], 0.5)
  }
}

const settings = {
  fonts,
  colors,
  charts,
  hexToRGB
}

if (typeof window !== 'undefined') {
  window.settings = settings
}