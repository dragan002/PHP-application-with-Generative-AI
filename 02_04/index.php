<?php 
require 'Person.php';

$joe = new Person ('Joe', '1985-1' );
$phil = new Person ('Phil', '1987-07-12', 'professional' );
$erin = new Person ('Erin', '1991-08-28' );
$teresa = new Person ('Teresa', '2017-03-06', 'professional' );
$mike = new Person ('Mike', '1989-04-07' );
$louie = new Person ('Lou', '2020-07-12' );
$rob = new Person ('Rob', '1990-12-16' );
$abby = new Person ('Abby', '2022-12-24' );
$annie = new Person ('Annie', '1949-10-02', 'professional' );
$ben = new Person ('Ben', '1977-05-25' );
$peter = new Person ('Peter', '1962-08-10', 'professional' );
$diane = new Person ('Diane', '1990-04-08', 'professional' );

$people = [ $joe, $phil, $erin, $teresa, $mike, $louie, $rob, $abby, $annie, $ben, $peter, $diane ];

// Define a custom comparison function to compare ages
function compareAges($a, $b) {
    return strtotime($a->get_dob()) - strtotime($b->get_dob());
}

// Sort the $people array using the custom comparison function
usort($people, 'compareAges');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php 
// Group people by role
$peopleByRole = [];
foreach ($people as $person) {
    $role = $person->get_role();
    if (!isset($peopleByRole[$role])) {
        $peopleByRole[$role] = [];
    }
    $peopleByRole[$role][] = $person;
}

// Display people by role
foreach ($peopleByRole as $role => $peopleInRole) {
    echo "<h2>$role</h2>";
    foreach ($peopleInRole as $person) {
        echo "<ul class=\"$role\">";
        echo "<li>Name: " . $person->get_name() . "</li>";
        echo "<li>Birthday: " . date_format(date_create($person->get_dob()), "F d, Y") . "</li>";
        echo "<li>Age: " . date_diff(date_create($person->get_dob()), date_create('today'))->y . " years old</li>";
        echo "</ul>";
    }
    echo "<hr />";
}
?>
</body>
</html>
