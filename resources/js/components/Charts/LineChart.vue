<template>
   <div>
     <apexchart type="line" :options="chartOptions" :series="series"></apexchart>
   </div>
</template>

<script>
export default {
    data: function() {
      return {
        chartOptions: {
          chart: {
            id: 'vuechart-Line'
          },
          xaxis: {
            categories: [1991, 1992, ]
          }
        },
        series: [{
          name: 'series-1',
          data: [30, 40, ]
        }]
      }
    },
};
</script>