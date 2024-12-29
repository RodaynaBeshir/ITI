<?php

// Q1 make \n work in browser
$text = " hello \n world";
echo nl2br($text);

// Q2 $_SERVER in readable format
echo "<pre>";
print_r($_SERVER);
echo "</pre>";

// Q3
// Convert string to uppercase
$string = "red cars are good";
$uppercase = strtoupper($string);
echo "Uppercase: $uppercase<br>";

// Find the position of a substring
$position = strpos($string, "cars");
echo "Position of 'cars': $position<br>";

// Join array elements into a string
$array = ["the","student", "is", "clever"];
$joinedString = implode(" ", $array);
echo "Joined string: $joinedString<br>";

//Q4
$array = [ 1 => 45, 0 => 12, 3 => 25, 2 => 10];
ksort($array); // sorts the array by its keys in ascending order

$sum = array_sum($array); 
$average = $sum / count($array);
arsort($array);  // sort reverse order

echo "Sum: $sum<br>";
echo "Average: $average<br>";
echo "sorted in reverse order: ";
print_r($array);

// Q5
$array = ["Sara" => 31, "John" => 41, "Walaa" => 39, "Ramy" => 40];

// a) Ascending order sort by value
asort($array);
echo "Ascending by value: ";
print_r($array);
echo "<br>";

// b) Ascending order sort by key
ksort($array);
echo "Ascending by key: ";
print_r($array);
echo "<br>";

// c) Descending order sort by value
arsort($array);
echo "Descending by value: ";
print_r($array);
echo "<br>";

// d) Descending order sort by key
krsort($array);
echo "Descending by key: ";
print_r($array);

?>

