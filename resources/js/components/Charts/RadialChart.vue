<template>
     <div id="chart">
        <apexchart type="radialBar"  :options="chartOptions" :series="series"></apexchart>
      </div>
</template>

<script>
export default {
  props:['user'],
     data(){
          return{
              series: [this.user, 55, 67, 83],
          chartOptions: {
            chart: {
              type: 'radialBar',
            },
            plotOptions: {
              radialBar: {
                dataLabels: {
                  name: {
                    fontSize: '22px',
                  },
                  value: {
                    fontSize: '16px',
                  },
                  total: {
                    show: true,
                    label: 'Total',
                    formatter: function (w) {
                      // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
                      return 249
                    }
                  }
                }
              }
            },
            labels: ['Apples', 'Oranges', 'Bananas', 'Berries'],
          },
          
        }
    }
}
</script>