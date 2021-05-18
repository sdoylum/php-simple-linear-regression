<?php
/*
MIT License
-----------

Copyright (c) 2021 Seyit Düzoylum
Permission is hereby granted, free of charge, to any person
obtaining a copy of this software and associated documentation
files (the "Software"), to deal in the Software without
restriction, including without limitation the rights to use,
copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the
Software is furnished to do so, subject to the following
conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
OTHER DEALINGS IN THE SOFTWARE.
*/
class Regression{
    function mean($values){
        return array_sum($values) / (float)(count($values));
    }

    function variance($values)
    {
        $num_of_elements = count($values);
        $variance = 0;
        $mean = $this->mean($values);
        foreach($values as $i)
        {
            $variance += pow(($i - $mean), 2);
        }

        return (float)($variance);
    }

    function covariance($arr1, $arr2)
    {
        $n=count($arr1);
        $sum = 0;
        for($i = 0; $i < $n; $i++){
            $sum = $sum + ($arr1[$i] - $this->mean($arr1)) * ($arr2[$i] - $this->mean($arr2));
        }
        return $sum;
    }

    function coefficients($arr1, $arr2){
        $arr1_mean = $this->mean($arr1);
        $arr2_mean = $this->mean($arr2);
        $b1 = $this->covariance($arr1, $arr2)/$this->variance($arr1);
        $b0 = $arr2_mean - $b1 * $arr1_mean;
        return (['b0' => $b0, 'b1' => $b1]);
    }

    function simple_linear_regression($train, $test){
        $predictions = array();
        $x = array_column($train, 'x');
        $y = array_column($train, 'y');
        $coef = $this->coefficients($x, $y);
        foreach ($test as $key => $value) {
            $pred = $coef['b0']+$coef['b1']*$value;
            array_push($predictions, $pred);
        }
        return $predictions;
    }
}
