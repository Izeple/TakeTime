<template>
  <div id="schedule">

    <div class="cube">
     <date-pick
        v-model="date"
        :hasInputElement="false"
    ></date-pick>
    <h1>{{date}}</h1>
    </div>


 
  </div>
</template>

<script>


import DatePick from 'vue-date-pick';
import 'vue-date-pick/dist/vueDatePick.css';

export default {
    components: {DatePick},
    data: () => ({
        date: '2019-01-01'
    })
};
</script>


<style>
#schedule {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}

.cube {
  position: relative; 
  float: left;
  width: 400px; 
  height: 400px;
  left: 100px;
}
</style>
