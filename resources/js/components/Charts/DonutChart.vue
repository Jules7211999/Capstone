<template>
     <div id="chart">
        <apexchart type="donut" :options="chartOptions" :series="series"></apexchart>
      </div>
</template>

<script>
export default {
    props:{
        user:{
            type: Number
        },
        fisherman:{
            type:Number
        },
        admin:{
            type:Number
        }
    },
    data() {
          return {
            series: [this.user, this.fisherman,this.admin],
          chartOptions: {
            chart: {
              type: 'donut',
            },
            responsive: [{
              breakpoint: 480,
              options: {
                chart: {
                  width: 200
                },
                legend: {
                  position: 'bottom'
                }
              }
            }],
            labels:['Superuser','Fisherman','Admin']
          },
          
          
          }
         
        },
        
}
</script>