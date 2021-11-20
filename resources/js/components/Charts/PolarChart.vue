<template>
     <div id="chart">
        <apexchart type="polarArea"  :options="chartOptions" :series="series"></apexchart>
      </div>
</template>

<script>
export default {
  props:{sos:{
    type:Number
  },
  sosr:{
    type:Number
  },
  sosd:{
    type:Number
  },
  loc:{
    type:Number
  }
  },
    data(){
      return{
          series: [this.sos,this.sosd,this.sos,this.loc],
          chartOptions: {
            chart: {
              type: 'polarArea',
            },
            labels:['Sos Sent','Sos Accomplished','Sos Processing', 'Coordinates Received'],
            stroke: {
              colors: ['#fff']
            },
            fill: {
              opacity: 0.8
            },
            responsive: [{
              breakpoint: 480,
              options: {
                legend: {
                  position: 'bottom'
                }
              }
            }]
          },
      }
        }
}
</script>