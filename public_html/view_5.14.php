<html>
<head>
   <link href="style.css" rel="stylesheet" type="text/css">
   <meta http-equiv="content-type" content="text/html; charset=iso-8859-7">
   <title>5.14</title>
   <link rel="icon" type="image/x-icon" href="https://www.clipartmax.com/png/full/255-2552230_database-symbol-png-database-icon-flat.png">
</head>


<?php
$host = "localhost";
$user = "db1u02";
$pass = "5mAdwcEJ";
$db = $user;
?>

<body>
<h1>5.14</h1>


<?php
$link = pg_connect("host=$host dbname=$db user=$user password=$pass") 
	or die ("Could not connect to server\n"); 

$result = pg_exec($link, "SELECT category AS tab1 ,city.country AS tab2, COUNT(user_id) AS tab3
                            FROM users, poi, city, located, check_in
                            WHERE located.poi_id=poi.id
                            AND located.city_id=city.id
                            AND check_in.poi_id=poi.id
                            AND check_in.user_id=users.id
                            GROUP BY category, city.country
                            HAVING COUNT(user_id) > 200 AND COUNT(user_id) < 300;")
	or die("Cannot execute query: $query\n");

$numrows = pg_numrows($result);
?>

<table border="1">
	<tr>
        <th>Κατηγορία</th>
		<th>Χώρα</th>
        <th>Επισκέψεις</th>
	</tr>
	<?php
	// Loop on rows in the result set.

	for($ri = 0; $ri < $numrows; $ri++) {
		echo "<tr>\n";
		$row = pg_fetch_array($result, $ri);
		echo " <td>", $row["tab1"], "</td>
		<td>", $row["tab2"], "</td>
		<td>", $row["tab3"], "</td>
		</tr>
		";
	}
	pg_close($link);
	?>
</table>

<h3> <a href="http://hilon.dit.uop.gr/~db1u02/index.php">Επιστροφή στην αρχική σελίδα</a></h3>


</body>
</html>