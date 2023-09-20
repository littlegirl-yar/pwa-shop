export default {
  // Disable server-side rendering: https://go.nuxtjs.dev/ssr-mode
  ssr: false,

  // Global page headers: https://go.nuxtjs.dev/config-head
  head: {
    title: 'Gadget Shop',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: 'Affan - PWA Mobile HTML Template' },
      { 'http-equiv': 'X-UA-Compatible', content: 'IE=edge' },
      { name: 'theme-color', content: '#0134d4' },
      { name: 'apple-mobile-web-app-capable', content: 'yes' },
      { name: 'apple-mobile-web-app-status-bar-style', content: 'black' }
    ],
    link: [
      { rel: 'preconnect', href: 'https://fonts.gstatic.com' },
      { rel: 'stylesheet', href: 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap' },
      { rel: 'icon', href: '/img/core-img/favicon.ico' },
      { rel: 'apple-touch-icon', href: '/img/icons/icon-96x96.png' },
      { rel: 'apple-touch-icon', sizes: "152x152", href: '/img/icons/icon-152x152.png' },
      { rel: 'apple-touch-icon', sizes: "167x167", href: '/img/icons/icon-167x167.png' },
      { rel: 'apple-touch-icon', sizes: "180x180", href: '/img/icons/icon-180x180.png' },
      { rel: 'stylesheet', href: '/css/bootstrap.css'},
      { rel: 'stylesheet', href: 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css'},
      { rel: 'stylesheet', href: '/css/tiny-slider.css'},
      { rel: 'stylesheet', href: '/css/baguetteBox.min.css'},
      { rel: 'stylesheet', href: '/css/rangeslider.css'},
      { rel: 'stylesheet', href: '/css/vanilla-dataTables.min.css'},
      { rel: 'stylesheet', href: '/css/apexcharts.css'},
      { rel: 'stylesheet', href: '/style.css'},
    ],
    script: [
      {
        src: "/js/bootstrap.js",
        body: true,
      },
      {
        src: "/js/internet-status.js",
        body: true,
      },
      {
        src: "/js/dark-rtl.js",
        body: true,
      },
      {
        src: "/js/baguetteBox.min.js",
        body: true,
      },
      {
        src: "/js/tiny-slider.js",
        body: true,
      },
      {
        src: "/js/rangeslider.min.js",
        body: true,
      },
      {
        src: "/js/slideToggle.min.js",
        body: true,
      },
      {
        src: "/js/countdown.js",
        body: true,
      },
      {
        src: "/js/index.js",
        body: true,
      },
      {
        src: "/js/magic-grid.min.js",
        body: true,
      },
      {
        src: "/js/active.js",
        body: true,
      },
      {
        src: "/js/vanilla-dataTables.min.js",
        body: true,
      },
      // {
      //   src: "/js/pswmeter.js",
      //   body: true,
      // },
    ],
  },

  // Global CSS: https://go.nuxtjs.dev/config-css
  css: [
  ],

  // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
  plugins: [
  ],

  // Auto import components: https://go.nuxtjs.dev/config-components
  components: true,

  // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
  buildModules: [
  ],

  // Modules: https://go.nuxtjs.dev/config-modules
  modules: [
    // https://go.nuxtjs.dev/axios
    '@nuxtjs/axios',
    // https://go.nuxtjs.dev/pwa
    '@nuxtjs/pwa',
    '@nuxtjs/auth-next',
    ["vue-toastification/nuxt", {
      position: "top-center",
      timeout: 6000,
      closeOnClick: true,
      pauseOnFocusLoss: true,
      pauseOnHover: true,
      draggable: true,
      draggablePercent: 0.6,
      showCloseButtonOnHover: false,
      hideProgressBar: true,
      closeButton: "button",
      icon: true,
      rtl: false
    }],
  ],

  axios: {
    baseURL: 'http://127.0.0.1:8000/api'
  },
  auth: {
    strategies: {
      google: {
        clientId: '940200753367-7ao5u6c3hs132t6h79s7h5nuc7u4ppco.apps.googleusercontent.com',
        codeChallengeMethod: '',
        responseType: 'code',
        endpoints: {
          token: 'http://localhost:8000/api/google/callback',
          userInfo: 'http://127.0.0.1:8000/api/me',
        },
        grantType: 'authorization_code',
      },
      github: {
        clientId: 'c5f1eb671c15551471b8',
        clientSecret: 'bb88727d8791c4aaf5a0dcb6fa287ae26334f5e5',
        codeChallengeMethod: '',
        responseType: 'code',
        endpoints: {
          token: 'http://localhost:8000/api/github/callback',
          userInfo: 'http://127.0.0.1:8000/api/me',
        },
        grantType: 'authorization_code',
      },
      'auth_jwt': {
        provider: 'laravel/jwt',
        url: 'http://127.0.0.1:8000/api',
        endpoints: {
          login: {
            url: '/auth/token',
            method: 'POST'
          },
          user: {
            url: '/me',
            method: 'GET',
            propertyName: 'data'
          },
          logout: false
        },
        token: {
          property: 'access_token'
        }
      },
    }
  },

  // Axios module configuration: https://go.nuxtjs.dev/config-axios
  axios: {
    // Workaround to avoid enforcing hard-coded localhost:3000: https://github.com/nuxt-community/axios-module/issues/308
    baseURL: '/',
  },

  // PWA module configuration: https://go.nuxtjs.dev/pwa
  pwa: {
    meta:{
      title:'Gadget Shop',
      author:'Yaromir',
    },
    manifest: {
      name: "Gadget Shop",
      short_name: "Gadget Shop",
      display: "standalone",
      background_color: "#0d5afd",
      theme_color: "#0d5afd",
      description: "Affan - PWA Mobile Gadget Shop",
      lang: 'en',
    },
    icon: {
      fileName: 'YouTubeLogo.png',
      sizes: [64, 120, 144, 152, 192, 384, 512]
    }
  },

  // Build Configuration: https://go.nuxtjs.dev/config-build
  build: {
  }
}
