<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');

$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$country = filter_input(INPUT_GET,'country',FILTER_SANITIZE_STRING);
if($_GET['context'] == ""):
    //echo "<br> SELECT * FROM countries WHERE continent = 'Asia'";
    //$stmt = $conn->query("SELECT * FROM countries WHERE continent = 'Asia'");
    //echo "<br> SELECT * FROM countries WHERE population > 100000000";
    //$stmt = $conn->query("SELECT * FROM countries WHERE population > 100000000");
    //echo "<br> SELECT * FROM countries WHERE name = $country";
    //$stmt = $conn->query("SELECT * FROM countries WHERE name ='$country'");
    $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%' ORDER BY name ASC");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC); ?>
    <table>
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Continent</th>
                <th scope="col">Independence Year</th>
                <th scope="col">Head of State</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($results as $row): ?>
            <tr>
                <td><?= $row['name']; ?></td>
                <td><?= $row['continent']; ?></td>
                <td><?= $row['independence_year']; ?></td>
                <td><?= $row['head_of_state']; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else:
    //echo "<br>Context is: ". $_GET['context']."<br>";
    $context = filter_input(INPUT_GET,'context',FILTER_SANITIZE_STRING);
    $stmt = $conn->query("SELECT ci.name, ci.district, ci.population 
    FROM $context as ci 
    JOIN countries as co 
    ON ci.country_code = co.code
    WHERE co.name LIKE '%$country%' 
    ORDER BY name ASC");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC); ?>
    <table>
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">District</th>
                <th scope="col">Population</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($results as $row): ?>
            <tr>
                <td><?= $row['name']; ?></td>
                <td><?= $row['district']; ?></td>
                <td><?= $row['population']; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>


