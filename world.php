<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');

$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';


if (isset($_GET["country"]))
{
   echo "<br>Country is: ".$_GET["country"];
}
$country = filter_input(INPUT_GET,'country',FILTER_SANITIZE_STRING);
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

//echo "<br> SELECT * FROM countries WHERE continent = 'Asia'";
//$stmt = $conn->query("SELECT * FROM countries WHERE continent = 'Asia'");
//echo "<br> SELECT * FROM countries WHERE population > 100000000";
//$stmt = $conn->query("SELECT * FROM countries WHERE population > 100000000");
//echo "<br> SELECT * FROM countries WHERE name = $country";
//$stmt = $conn->query("SELECT * FROM countries WHERE name ='$country'");
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");

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

<ul>
<?php foreach ($results as $row): ?>
  <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
<?php endforeach; ?>
</ul>
