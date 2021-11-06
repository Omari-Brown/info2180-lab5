<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');

$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$country = filter_input(INPUT_GET,'country',FILTER_SANITIZE_STRING);
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

//echo "<br> SELECT * FROM countries WHERE continent = 'Asia'";
//$stmt = $conn->query("SELECT * FROM countries WHERE continent = 'Asia'");
//echo "<br> SELECT * FROM countries WHERE population > 100000000";
//$stmt = $conn->query("SELECT * FROM countries WHERE population > 100000000");
//echo "<br> SELECT * FROM countries WHERE name = $country";
//$stmt = $conn->query("SELECT * FROM countries WHERE name ='$country'");
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%' ORDER BY name ASC");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
  /*if($_REQUEST['query'] == ""):
  // If query value is not set 
      foreach ($superheroes as $superhero): ?>
          <li><?= $superhero['alias']; ?></li>
      <?php endforeach;
  else:
      $search_value = filter_input(INPUT_GET,'query',FILTER_SANITIZE_STRING);
      //echo "<br>Search value is ".$search_value;
      $found = false;
      foreach ($superheroes as $superhero):
          if($search_value==$superhero["name"] || $search_value==$superhero["alias"]): ?>
              <h3> <?= $superhero['alias']; ?></h3>
              <h4> A.K.A. <?= $superhero['name']; ?></h4>
              <p><?= $superhero['biography']; ?></p>
              <?php $found = true;
          endif;
      endforeach;
      if ($found==false):
      {
          echo "<h5>SUPERHERO NOT FOUND";
      }
      endif;
  endif;*/ 

?>

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
