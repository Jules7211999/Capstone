<template>
    <div id="chart">
        <apexchart type="polarArea" :options="chartOptions" :series="series"></apexchart>
      </div>
</template>

<script>
export default {
  props:['barangay','city'],
        data() {
          return {
         series: [this.barangay,this.city],
          chartOptions: {
            chart: {
              type: 'polarArea'
            },
            labels: ['Barangay','City'],
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
