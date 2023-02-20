<?php

/*
1.Write a PHP function to sort an array of strings by their length, in ascending order. (Hint: You can use the usort() function to define a custom sorting function.)
*/
function sortArrayByLength($array) {
    usort($array, function($a, $b) {
        return strlen($a) - strlen($b);
    });
    return $array;
}
$array = array("apple", "banana", "cherry", "date", "elderberry");
$sortedArray = sortArrayByLength($array);
print_r($sortedArray);
/*output
Array
(
    [0] => date
    [1] => apple
    [2] => banana
    [3] => cherry
    [4] => elderberry
)
*/
echo PHP_EOL;



/*
2.Write a PHP function to concatenate two strings, but with the second string starting from the end of the first string.
*/
function concatenateFromEnd($string1, $string2) {
    $len1 = strlen($string1);
    $len2 = strlen($string2);
    $result = $string1;

    for ($i = $len2 - 1; $i >= 0; $i--) {
        $result .= $string2[$i];
    }

    return $result;
}

$string1 = "hello";
$string2 = "world";
$result = concatenateFromEnd($string1, $string2);
echo $result;//output = hellodlrow
echo PHP_EOL;



/*
 3.Write a PHP function to remove the first and last element from an array and return the remaining elements as a new array.
*/
function removeFirstAndLast($array) {
    array_shift($array);  // remove the first element
    array_pop($array);    // remove the last element
    return $array;
}

$array = array(1, 2, 3, 4, 5);
$newArray = removeFirstAndLast($array);
print_r($newArray);
/*
output = 
Array
(
    [0] => 2
    [1] => 3
    [2] => 4
)
*/
echo PHP_EOL;



/*
4.Write a PHP function to check if a string contains only letters and whitespace.
*/
function containsOnlyLettersAndWhitespace($string) {
    return preg_match('/^[a-zA-Z\s]+$/', $string);
}

$string1 = "Hello world";
$string2 = "Hello123";
$isLettersAndWhitespace1 = containsOnlyLettersAndWhitespace($string1);
$isLettersAndWhitespace2 = containsOnlyLettersAndWhitespace($string2);
echo $isLettersAndWhitespace1 ? "true" : "false"; // Output: true
echo $isLettersAndWhitespace2 ? "true" : "false"; // Output: false
echo PHP_EOL;



/*
5.Write a PHP function to find the second largest number in an array of numbers.
*/
function findSecondLargest($array) {
    $largest = $array[0];
    $secondLargest = null;

    foreach ($array as $number) {
        if ($number > $largest) {
            $secondLargest = $largest;
            $largest = $number;
        } else if ($number != $largest && ($secondLargest == null || $number > $secondLargest)) {
            $secondLargest = $number;
        }
    }

    return $secondLargest;
}

$array = array(3, 6, 2, 8, 4, 10);
$secondLargest = findSecondLargest($array);
echo $secondLargest; // Output: 8

?>
