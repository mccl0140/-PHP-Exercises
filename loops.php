<?php
/*
+---+
| 1 |
+---+
Use while-loop to print the numbers 1 to 10.
*/

$i = 1;
while($i <= 10) {
    echo $i. "<br>";
    $i++;
}

// task separator
echo "<hr style=\"margin 1rem 0\">";

/*
+---+
| 2 |
+---+
Use the PHP function range(start, end, step) 
to create array of numbers 5 to 100 with the step 5 
(example: 5, 10, 15, ...)
*/

$number = range(5, 100, 5);
print_r($number);
echo "<hr>";

/*
Use for-loop and if-statement to print all odd numbers.

How to check if a number is odd or even? 
Divide it by 2, and if there is a remainder, the number is odd. 
Use modulus operator (outputs the remainder after division), 
for example: 
1 % 2 = 1 -> odd number
2 % 2 = 0 -> even number
3 % 2 = 1 -> odd number
4 % 2 = 0 -> even number
*/

for ($i=0; $i < sizeof($number); $i++) {
    if (($number[$i] % 2) ==1) {
        echo "$number[$i] <br>";
          }
}

// task separator
echo "<hr style=\"margin 1rem 0\">";

/*
+---+
| 3 |
+---+
Declare and assign the indexed array with your favourite food 
(at least 4 array elements). Name the array food.
*/
$food = [
    "banana", 
    "apple", 
    "pear", 
    "grapes",
];
/*
Use while-loop to print array elements (every food in a new row).
*/
$i = 0;
while($i < sizeof($food)){
    echo $food[$i] . "<br>";
    $i++;
}
echo "<hr>";
/*
Use for-loop to print array elements (every food in a new row).
*/
for($i = 0; $i < sizeof($food); $i++) {
    echo $food[$i] . "<br>";
}
echo "<hr>";
/*
Use foreach-loop to print array elements (every food in a new row).
*/
foreach ($food as $value) {
    echo $value . "<br>";
}
// task separator
echo "<hr style=\"margin 1rem 0\">";
/*
+---+
| 4 |
+---+
Print the array from task 3 as unordered list. Printing has to be done inside the for-loop.

Before looping, you need to print the opening list-tag <ul>
After looping, you need to print the closing list-tag </ul>
*/

echo "<ul>";
for ($i = 0; $i < sizeof($food); $i++) {
    echo "<li>";
    echo $food[$i];
    echo "</li>";
}
echo "</ul>";
// task separator
echo "<hr style=\"margin 1rem 0\">";


// task separator
echo "<hr style=\"margin 1rem 0\">";

/*
+---+
| 5 |
+---+
The array from task 3 is turned into associative array. 
The meal courses are broken down based on the type (salad, main course, dessert, ...) 
and country of origin (Italy, Spain, India, ...)

$food_assoc = [
  "pizza" => [
    "type" => "main course",
    "origin" => "Italy"
  ],
  "cheesesake" => [
    "type" => "desert",
    "origin" => "Greece"
  ]
]

So, food_assoc is an associative array. 
Every key of food_assoc (pizza, cheesecake) will now have the value that is associative array itself 
and carries the information about the type and origin.
*/


$food_assoc = [
  "pancakes" => [
    "type" => "breakfast",
    "origin" => "France"
  ],
  "salad" => [
    "type" => "appetiser",
    "origin" => "Europe"
  ],
  "steak and potatoes" => [
      "type" => "main course",
      "origin" => "America"
  ],
  "brownie" => [
      "type" => "dessert",
      "origin" => "France"
  ]   
];

/*
Loop through $food_assoc and use print_r() to print the entire meal course 
(entire array that includes type and origin).
*/

print_r($food_assoc);

/*
Loop through $food_assoc and print the meal names (keys of $food_assoc)
as unordered list-items. Loop through the current meal (inner loop through sub-array) 
and print the type and origin as nested list items (see the example below).
*/

echo "<ul>";
foreach ($food_assoc as $key => $value) {
    echo "My favourite meal is <br>";
    echo "{$key} <br>";
    foreach($food_assoc[$key] as $key1 => $value1) {
        echo "$key1 : $value1  <br>";
    }
    
}
echo "</ul>";

?>