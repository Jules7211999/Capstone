<template>
    <div id="chart">
        <apexchart type="polarArea" :options="chartOptions" :series="series"></apexchart>
      </div>
</template>

<script>
export default {
  props:['superuser','admin','fisherman'],
        data() {
          return {
         series: [this.superuser,this.admin,this.fisherman],
          chartOptions: {
            chart: {
              type: 'polarArea'
            },
            labels: ['superuser','admin','fisherman'],
            fill: {
              opacity: 1
            },
            stroke: {
              width: 1,
              colors: undefined
            },
            yaxis: {
              show: false
            },
            legend: {
              position: 'bottom'
            },
            plotOptions: {
              polarArea: {
                rings: {
                  strokeWidth: 0
                },
                spokes: {
                  strokeWidth: 0
                },
              }
            },
           
        }
          }
          }
}
</script>