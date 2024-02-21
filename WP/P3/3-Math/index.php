<?php
// Math functions demonstration

// abs(): Returns the absolute value of a number
$number1 = -10;
$absoluteValue = abs($number1);
echo "Absolute value of $number1 is: $absoluteValue<br>";

// round(): Rounds a floating-point number
$number2 = 3.7;
$roundedValue = round($number2);
echo "Rounded value of $number2 is: $roundedValue<br>";

// ceil(): Rounds a number up to the nearest integer
$number3 = 4.3;
$ceiledValue = ceil($number3);
echo "Ceiled value of $number3 is: $ceiledValue<br>";

// floor(): Rounds a number down to the nearest integer
$number4 = 4.8;
$flooredValue = floor($number4);
echo "Floored value of $number4 is: $flooredValue<br>";

// min(): Returns the smallest of the given numbers
$minValue = min(10, 20, 30, 40, 50);
echo "Minimum value is: $minValue<br>";

// max(): Returns the largest of the given numbers
$maxValue = max(10, 20, 30, 40, 50);
echo "Maximum value is: $maxValue<br>";

// pow(): Returns base raised to the power of exponent
$base = 2;
$exponent = 3;
$powerValue = pow($base, $exponent);
echo "$base raised to the power of $exponent is: $powerValue<br>";

// sqrt(): Returns the square root of a number
$number5 = 16;
$squareRootValue = sqrt($number5);
echo "Square root of $number5 is: $squareRootValue<br>";
?>
