import Vue from 'vue'
import schedule from './components/Schedule.vue'

Vue.config.productionTip = false

new Vue({
  render: h => h(schedule),
}).$mount('#schedule')


new Vue({
  el: '#checklist',
  data: {
    checkedTimes: []
  }
})