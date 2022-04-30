<html>
<head>
   <link href="style.css" rel="stylesheet" type="text/css">
   <meta http-equiv="content-type" content="text/html; charset=iso-8859-7">
   <title>5.9</title>
   <link rel="icon" type="image/x-icon" href="https://www.clipartmax.com/png/full/255-2552230_database-symbol-png-database-icon-flat.png">
</head>


<?php
$host = "localhost";
$user = "db1u02";
$pass = "5mAdwcEJ";
$db = $user;
?>

<body>
<h1>5.9</h1>
<h2>Δώστε τα σημεία (x1,y1) και (x2,y2) για να ανήκουν στο παρακάτω παραλληλόγραμμο</h2>
<img src="rect.png" > 
<form method="POST">  
  Δώσε x1: <input type="text" name="name">
  <br><br> 
  Δώσε x2: <input type="text" name="name2">
  <br><br>
  Δώσε y1: <input type="text" name="name3">
  <br><br>
  Δώσε y2: <input type="text" name="name4">
  <br><br>
  <button type="submit" name="submit">Αναζήτηση</button>
</form>


<?php
error_reporting(E_ERROR | E_PARSE);
if (isset($_POST['submit']))
{
    $name = $_POST['name'];
    $name2 = $_POST['name2'];
    $name3 = $_POST['name3'];
    $name4 = $_POST['name4'];
$link = pg_connect("host=$host dbname=$db user=$user password=$pass") 
	or die ("Could not connect to server\n"); 

$result = pg_exec($link, "SELECT name, state, country
                            FROM city
                            WHERE longitude>$name
                            AND longitude<$name2
                            AND latitude>$name3
                            AND latitude<$name4;")
	or die("Cannot execute query: $query\n");
}
$numrows = pg_numrows($result);
?>

<table border="1">
<tr>
		<th>Πόλη</th>
        <th>Πολιτεία</th>
        <th>Χώρα</th>
	</tr>
	<?php
	// Loop on rows in the result set.

	for($ri = 0; $ri < $numrows; $ri++) {
		echo "<tr>\n";
		$row = pg_fetch_array($result, $ri);
		echo " <td>", $row["name"], "</td>
        <td>", $row["state"], "</td>
        <td>", $row["country"], "</td>
		</tr>
		";
	}
	pg_close($link);
	?>
</table>

<h3> <a href="http://hilon.dit.uop.gr/~db1u02/index.php">Επιστροφή στην αρχική σελίδα</a></h3>


</body>
</html>