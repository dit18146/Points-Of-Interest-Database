<html>
<head>
   <link href="style.css" rel="stylesheet" type="text/css">
   <meta http-equiv="content-type" content="text/html; charset=iso-8859-7">
   <title>5.17</title>
   <link rel="icon" type="image/x-icon" href="https://www.clipartmax.com/png/full/255-2552230_database-symbol-png-database-icon-flat.png">
</head>


<?php
$host = "localhost";
$user = "db1u02";
$pass = "5mAdwcEJ";
$db = $user;
?>

<body>
<h1>5.17</h1>


<?php
$link = pg_connect("host=$host dbname=$db user=$user password=$pass") 
	or die ("Could not connect to server\n"); 

$result = pg_exec($link, "SELECT DISTINCT users.surname AS tab1, users.name AS tab2
                            FROM users, poi, city, check_in, located
                            WHERE check_in.user_id=users.id
                            AND check_in.poi_id=poi.id
                            AND located.city_id=city.id
                            AND located.poi_id=poi.id
                            AND city.country='Greece'
                            INTERSECT
                            SELECT DISTINCT users.surname AS tab1, users.name AS tab2
                            FROM users, poi, city, check_in, located
                            WHERE check_in.user_id=users.id
                            AND check_in.poi_id=poi.id
                            AND located.city_id=city.id
                            AND located.poi_id=poi.id
                            AND city.country='Spain'
                            EXCEPT
                            SELECT DISTINCT users.surname AS tab1, users.name AS tab2
                            FROM users, poi, city, check_in, located
                            WHERE check_in.user_id=users.id
                            AND check_in.poi_id=poi.id
                            AND located.city_id=city.id
                            AND located.poi_id=poi.id
                            AND city.country='Italy';")
	or die("Cannot execute query: $query\n");

$numrows = pg_numrows($result);
?>


<table border="1">
	<tr>
		<th>Επώνυμο</th>
		<th>Όνομα</th>
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