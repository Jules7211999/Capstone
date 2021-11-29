<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class Individual
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($months, $sum, ): \ArielMejiaDev\LarapexCharts\BarChart
    {
        return $this->chart->barChart()
            ->addData('Kilograms Per Month',$sum)
            ->setXAxis($months)
            ->setGrid()
            ->setGrid(false, '#3F51B5', 0.1);
            
            
    }
}
