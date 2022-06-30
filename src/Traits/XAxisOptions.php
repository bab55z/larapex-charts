<?php


namespace ArielMejiaDev\LarapexCharts\Traits;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use ArielMejiaDev\LarapexCharts\Traits\OptionsHelper;

/**
* This class provides extended xAxis options support
*/

trait XAxisOptions
{
   use OptionsHelper;
   protected $xAxisOptions = [];

   /*
    * xAxis options getter
    * @return array|string returns a json string by default or an array if returnArray = true
    */
    public function xAxisOptions($returnArray = false)
    {
        $otherOptions = $this->xAxisOptions;
        $otherOptions['categories'] = json_decode($this->xAxis());

        if($returnArray) {
            return $otherOptions;
        }
        return json_encode($otherOptions);
    }

    /*
     * Sets a specific xaxis option
     * @throws \Exception
     * */
    public function setXAxisOption($key, $value): LarapexChart
    {
        // allowed options along with their validation rules
        // we are not including the categories option here because it is handled separately
        $allowedOptionKeys = [
            'type'                      => 'string', // category, datetime, numeric
            'position'                  => 'string', // top, bottom

            'labels.show'               => 'boolean',
            'labels.rotate'             => 'integer',
            'labels.showDuplicates'     => 'boolean',
            'labels.maxHeight'          => 'integer',

            'labels.style.colors'       => 'string|array',
            'labels.style.fontSize'     => 'string',
            'labels.style.fontFamily'   => 'string',
            'labels.style.fontWeight'   => 'integer',

            'axisBorder.show'           => 'boolean',
            'axisBorder.color'          => 'string',

            'tooltip.enabled'           => 'boolean',
            'tooltip.style.fontSize'    => 'string',
            'tooltip.style.fontFamily'  => 'string',
        ];

        $this->validateOption($key, $value, $allowedOptionKeys);
        $recursiveArray = $this->getRecursiveArrayData($key, $value);
        $this->xAxisOptions = array_merge_recursive($this->xAxisOptions, $recursiveArray);

        return $this;
    }

    /*
     * Sets multiple xAxis options
     * */
    public function setXAxisOptions(array $options): LarapexChart{
        foreach ($options as $key => $value) {
            $this->setXaxisOption($key, $value);
        }
        return $this;
    }

}
