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

    public function build($months, $sum, $fishname): \ArielMejiaDev\LarapexCharts\BarChart
    {
        return $this->chart->barChart()
            ->setTitle($fishname)
            ->setSubtitle("Kilograms by Month")
            ->addData('Kilograms Per Month',$sum)
            ->setXAxis($months)
            ->setGrid()
            ->setGrid(false, '#3F51B5', 0.1);
            
            
    }
}
