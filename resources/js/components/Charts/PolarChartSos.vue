<template>
    <div id="chart">
        <apexchart type="polarArea" :options="chartOptions" :series="series"></apexchart>
      </div>
</template>

<script>
export default {
  props:['sos','sosp','sosd'],
        data() {
          return {
         series: [this.sos,this.sosp,this.sosd],
          chartOptions: {
            chart: {
              type: 'polarArea'
            },
            labels: ['SOS Sent','SOS in progress','Successful SOS'],
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