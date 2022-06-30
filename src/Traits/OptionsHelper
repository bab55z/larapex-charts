<?php


namespace ArielMejiaDev\LarapexCharts\Traits;


trait OptionsHelper
{
        /*
     * returns an array based on a dot notation key (e.g. 'labels.style.fontSize')
     * the value will be at the right deth of the array ['labels']['style']['fontSize']
     * @return array
     * @param string $key dot notation key (e.g. 'labels.style.fontSize') or a single key (e.g. 'type')
     * @param mixed $value the value to set
     * */
    public function getRecursiveArrayData($key, $value)
    {
        $recursiveKeys = explode('.', $key);
        $depth = count($recursiveKeys);
        $valueToStore = null;

        // single depth option
        if ($depth === 1)
        {
            return [$key => $value];
        }

        // multiple depth option
        for ($i = $depth-1; $i >=0; $i--)
        {
            if($i === 0)
            {
                return [$recursiveKeys[$i] => $valueToStore];
            }
            if ($i === $depth-1)
            {
                $valueToStore = [$recursiveKeys[$i] => $value];
            } else {
                $valueToStore = [$recursiveKeys[$i] => $valueToStore];
            }
        }
    }

    /*
     * Validates the provided options against the allowed options array
     * verifies if the key is allowed and if the value is of the correct type
     * @throws \Exception
     * sample allowed options array: ['name' => 'type'..]
     * type can be : string, integer, boolean, array,... => we can get it through gettype() function
     * e.g. ['labels.show' => 'boolean']
     */
    private function validateOption($key, $value, $allowedOptionKeys){
        // validate the key
        if (!array_key_exists($key, $allowedOptionKeys)) {
            throw new \ErrorException('option key: ' . $key . ' is not yet supported. Use one of the following: '
                . implode(', ', array_keys($allowedOptionKeys))
            );
        }

        // validate the value type against the validation rule
        if (strpos($allowedOptionKeys[$key], gettype($value)) === false) {
            throw new \ErrorException('option key: ' . $key . ' value type: ' . gettype($value) . ' is not valid');
        }
    }
}
