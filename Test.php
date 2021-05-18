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

    include "Regression.php";
    $reg = new Regression();
    $train = [
        0 => ['x' => 2.30,
              'y' => 1.5],

        1 => ['x' => 1.25,
              'y' => 1],

        3 => ['x' => 1.68,
              'y' => 0.75],

        4 => ['x' => 0.91,
              'y' => 1],

        5 => ['x' => 1.08,
              'y' => 1],
    ];
    $test = [2, 1, 1.2, 5, 4.03];
    print_r ($reg->simple_linear_regression($train, $test));

?>
