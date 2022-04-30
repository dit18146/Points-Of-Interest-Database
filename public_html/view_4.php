<html>
<head>
   <link href="style.css" rel="stylesheet" type="text/css">
   <meta http-equiv="content-type" content="text/html; charset=iso-8859-7">
   <title>4</title>
   <link rel="icon" type="image/x-icon" href="https://www.clipartmax.com/png/full/255-2552230_database-symbol-png-database-icon-flat.png">
</head>


<?php
$host = "localhost";
$user = "db1u02";
$pass = "5mAdwcEJ";
$db = $user;
?>

<body>
<h1>4</h1>


<?php
$link = pg_connect("host=$host dbname=$db user=$user password=$pass") 
	or die ("Could not connect to server\n"); 

$result = pg_exec($link, "SELECT poi.category AS tab1, city.name AS tab2, city.state AS tab3, city.country AS tab4, COUNT(poi.category) AS tab5
                            FROM poi, city, located
                            WHERE poi_id=poi.id
                            AND city_id=city.id
                            GROUP BY city.name, city.state, city.country, poi.category
                            ORDER BY city.name, city.state, city.country, poi.category ASC;")
	or die("Cannot execute query: $query\n");

$numrows = pg_numrows($result);
?>

<table border="1">
	<tr>
        <th>Κατηγορία</th>
        <th>Πόλη</th>
		<th>Πολιτεία</th>
		<th>Χώρα</th>
        <th>Πλήθος</th>
	</tr>
	<?php
	// Loop on rows in the result set.

	for($ri = 0; $ri < $numrows; $ri++) {
		echo "<tr>\n";
		$row = pg_fetch_array($result, $ri);
		echo " <td>", $row["tab1"], "</td>
		<td>", $row["tab2"], "</td>
		<td>", $row["tab3"], "</td>
        <td>", $row["tab4"], "</td>
        <td>", $row["tab5"], "</td>
		</tr>
		";
	}
	pg_close($link);
	?>
</table>

<h3> <a href="http://hilon.dit.uop.gr/~db1u02/index.php">Επιστροφή στην αρχική σελίδα</a></h3>


</body>
</html>