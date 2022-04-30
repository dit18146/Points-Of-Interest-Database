<html>
<head>
   <link href="style.css" rel="stylesheet" type="text/css">
   <meta http-equiv="content-type" content="text/html; charset=iso-8859-7">
   <title>5.3</title>
   <link rel="icon" type="image/x-icon" href="https://www.clipartmax.com/png/full/255-2552230_database-symbol-png-database-icon-flat.png">
</head>


<?php
$host = "localhost";
$user = "db1u02";
$pass = "5mAdwcEJ";
$db = $user;
?>

<body>
<h1>5.3</h1>


<form method="POST">  
  Δώσε κατηγορία: <input type="text" name="name">
  <br><br>
 
  <button type="submit" name="submit">Αναζήτηση</button>
</form>


<?php
error_reporting(E_ERROR | E_PARSE);
if (isset($_POST['submit']))
{
    $name = $_POST['name'];
$link = pg_connect("host=$host dbname=$db user=$user password=$pass") 
	or die ("Could not connect to server\n"); 

$result = pg_exec($link, "SELECT DISTINCT users.name AS tab1, users.surname AS tab2 FROM users, poi, check_in WHERE check_in.user_id=users.id AND poi.id = poi_id AND category='$name';")
	or die("Cannot execute query: $query\n");
}
$numrows = pg_numrows($result);
?>

<table border="1">
	<tr>
		<th>Όνομα</th>
		<th>Επώνυμο</th>
	</tr>

	<?php
	// Loop on rows in the result set.

	for($ri = 0; $ri < $numrows; $ri++) {
		echo "<tr>\n";
		$row = pg_fetch_array($result, $ri);
		echo " <td>", $row["tab1"], "</td>
		<td>", $row["tab2"], "</td>
		</tr>
		";
	}
	pg_close($link);
	?>
</table>

<h3> <a href="http://hilon.dit.uop.gr/~db1u02/index.php">Επιστροφή στην αρχική σελίδα</a></h3>


</body>
</html>