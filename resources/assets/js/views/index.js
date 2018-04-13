import Vue from 'vue'
import VueRouter from 'vue-router'
import Root from './Root.vue'

Vue.use(VueRouter)

import routes from './route'

const app = new Vue({
  el: '#app',
  router: new VueRouter({ mode: 'history',routes: routes }),
  template: '<Root ref="view"/>',
  components: { Root },
  methods: {
    onEvent(event, ...args) {
      this.$refs.view.$emit(event, ...args)
    }
  }
})
Vue.prototype.$dispatchEvent = function (event, ...args) {
  if (this.$listeners[event]) {
    this.$listeners[event](...args)
  } else if (this.$parent) {
    this.$parent.$dispatchEvent(event, ...args)
  }
}
Vue.$dispatchEvent = function (event, ...args) {
  root.onEvent(event, ...args)
}
