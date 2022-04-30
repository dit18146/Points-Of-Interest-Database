<html>
<head>
   <link href="style.css" rel="stylesheet" type="text/css">
   <meta http-equiv="content-type" content="text/html; charset=iso-8859-7">
   <title>Χρήστες</title>
   <link rel="icon" type="image/x-icon" href="https://www.clipartmax.com/png/full/255-2552230_database-symbol-png-database-icon-flat.png">
</head>


<?php
$host = "localhost";
$user = "db1u02";
$pass = "5mAdwcEJ";
$db = $user;
?>

<body>
<h1>Περιεχόμενο σχέσης users</h1>


<?php
$link = pg_connect("host=$host dbname=$db user=$user password=$pass") 
	or die ("Could not connect to server\n"); 

$result = pg_exec($link, "SELECT city.name AS cityname, city.state AS citystate, city.country AS citycountry, surname , users.name AS usersname FROM city,users,residing WHERE user_id=users.id AND city_id=city.id ORDER BY city.name ASC;")
	or die("Cannot execute query: $query\n");

$numrows = pg_numrows($result);
?>

<table border="1">
	<tr>
		<th>Πόλη</th>
		<th>Πολιτεία</th>
		<th>Χώρα</th>
		<th>Επώνυμο</th>
		<th>Όνομα</th>
	</tr>
	<?php
	// Loop on rows in the result set.

	for($ri = 0; $ri < $numrows; $ri++) {
		echo "<tr>\n";
		$row = pg_fetch_array($result, $ri);
		echo " <td>", $row["cityname"], "</td>
		<td>", $row["citystate"], "</td>
		<td>", $row["citycountry"], "</td>
		<td> <b>", $row["surname"], "</b></td>
		<td> <b>", $row["usersname"], "</b></td>
		</tr>
		";
	}
	pg_close($link);
	?>
</table>

<h3> <a href="http://hilon.dit.uop.gr/~db1u02/index.php">Επιστροφή στην αρχική σελίδα</a></h3>


</body>
</html>