<template>
   <div>
     <apexchart  type="bar" :options="chartOptions" :series="series"></apexchart>
   </div>
</template>

<script>
export default {
    data() {
      return {
        chartOptions: {
          chart: {
            id: 'vuechart-Bar',
          },
          xaxis: {
            categories: [1991, 1992,]
          },
          plotOptions: {
              bar: {
                horizontal: true,
              }
            },
        },
        series: [{
          name: 'series-1',
          data: [30, 40, ]
        }],
      }
      }
};
</script>