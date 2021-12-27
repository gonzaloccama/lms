export default {
  props: {
    layoutActive: {
      type: String,
      required: false
    },
    layoutLocation: {
      type: Object,
      required: false
    }
  },
  data() {
    return {
      options: [
        {
          id: 'layout',
          title: 'Layout',
          children: [
            {
              id: 'rtl',
              title: 'Text Direction',
              component: 'custom-checkbox-toggle',
              options: [
                {
                  value: true
                },
                {
                  value: false,
                  selected: true
                }
              ]
            }
          ]
        },
        {
          id: 'mainDrawer',
          title: 'Main Drawer',
          children: [
            {
              id: 'align',
              title: 'Align',
              component: 'b-form-radio-group',
              options: [
                {
                  text: 'Start',
                  value: 'start',
                  selected: true
                },
                {
                  text: 'End',
                  value: 'end'
                }
              ]
            },
            {
              id: 'sidebar',
              title: 'Sidebar Skin',
              component: 'b-form-radio-group',
              options: [
                {
                  text: 'Dark',
                  value: 'dark',
                  selected: true
                },
                {
                  text: 'Light',
                  value: 'light'
                }
              ]
            }
          ]
        },
        {
          id: 'mainNavbar',
          title: 'Main Navbar',
          children: [
            {
              id: 'navbar',
              title: 'Main Navbar',
              component: 'b-form-radio-group',
              options: [
                {
                  text: 'Light',
                  value: 'light'
                },
                {
                  text: 'Dark',
                  value: 'dark',
                  selected: true
                }
              ]
            }
          ]
        }
      ],
      config: {
        'layout.layout': function(layout) {
          if (layout !== this.layoutActive) {
            location = this.layoutLocation[layout]
          }
        },
        'layout.rtl': function(rtl) {
          if (this.oldSettings['layout.rtl'] !== undefined && rtl !== this.oldSettings['layout.rtl']) {
            return location.reload()
          }
          document.querySelector('html').setAttribute('dir', rtl ? 'rtl' : 'ltr')

          document.querySelectorAll('.mdk-drawer')
            .forEach(node => this.try(node, function() {
              this.mdkDrawer._resetPosition()
            }))

          document.querySelectorAll('.mdk-drawer-layout')
            .forEach(node => this.try(node, function() {
              this.mdkDrawerLayout._resetLayout()
            }))
        },
        'mainDrawer.align': function(align) {
          this.try(document.querySelector('#default-drawer'), function() {
            this.mdkDrawer.align = align
          })
        },
        'mainDrawer.sidebar': {
          'light': {
            '#default-drawer .sidebar': {
              addClass: ['sidebar-light'],
              removeClass: ['sidebar-dark', 'bg-dark-gray']
            }
          },
          'dark': {
            '#default-drawer .sidebar': {
              addClass: ['sidebar-dark', 'bg-dark-gray'],
              removeClass: ['sidebar-light']
            }
          }
        },
        'mainNavbar.navbar': {
          'light': {
            '.navbar-main': {
              addClass: ['navbar-light', 'bg-white'],
              removeClass: ['navbar-dark', 'bg-primary']
            }
          },
          'dark': {
            '.navbar-main': {
              addClass: ['navbar-dark', 'bg-primary'],
              removeClass: ['navbar-light', 'bg-white']
            }
          }
        }
      }
    }
  },
  computed: {
    computedOptions() {
      const options = JSON.parse(JSON.stringify(this.options))
      options.map(option => {
        option.children
          .filter(group => group.cookies === false)
          .map(group => {
            if (this.layoutActive) {
              group.options.map(go => go.selected = go.value === this.layoutActive)
            } else {
              group.options.map(go => go.selected = go.value === group.value)
            }
          })
      })

      return options
    },
    computedSettings() {
      return Object.assign({}, this.settings)
    }
  },
  created() {
    this.listenOnRoot('fm:settings:state', this.onUpdate)
  },
  methods: {
    try(node, callback) {
      try {
        callback.call(node)
      } catch(e) {
        node.addEventListener('domfactory-component-upgraded', callback)
      }
    }
  }
}
