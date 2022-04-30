<html>
<head>
   <link href="style.css" rel="stylesheet" type="text/css">
   <meta http-equiv="content-type" content="text/html; charset=iso-8859-7">
   <title>5.15</title>
   <link rel="icon" type="image/x-icon" href="https://www.clipartmax.com/png/full/255-2552230_database-symbol-png-database-icon-flat.png">
</head>


<?php
$host = "localhost";
$user = "db1u02";
$pass = "5mAdwcEJ";
$db = $user;
?>

<body>
<h1>5.15</h1>


<?php
$link = pg_connect("host=$host dbname=$db user=$user password=$pass") 
	or die ("Could not connect to server\n"); 

$result = pg_exec($link, "(SELECT poi.category AS cat, COUNT(user_id) AS tab1
                            FROM poi,check_in
                            WHERE poi_id=poi.id
                            GROUP BY poi.category
                            ORDER BY tab1 DESC
                            LIMIT 1)
                            UNION ALL
                            (SELECT poi.category, COUNT(user_id) AS tab2
                            FROM poi,check_in
                            WHERE poi_id=poi.id
                            GROUP BY poi.category
                            ORDER BY tab2 ASC)
                            LIMIT 2;")
	or die("Cannot execute query: $query\n");

$numrows = pg_numrows($result);
?>


<table border="1">
	<tr>
		<th>Κατηγορία</th>
        <th>Αριθμός Επισκέψεων</th>
	</tr>
	<?php
	// Loop on rows in the result set.

	for($ri = 0; $ri < $numrows; $ri++) {
		echo "<tr>\n";
		$row = pg_fetch_array($result, $ri);
		echo " <td>", $row["cat"], "</td>
        <td>", $row["tab1"], "</td>
		</tr>
		";
	}
	pg_close($link);
	?>
</table>

<h3> <a href="http://hilon.dit.uop.gr/~db1u02/index.php">Επιστροφή στην αρχική σελίδα</a></h3>


</body>
</html>