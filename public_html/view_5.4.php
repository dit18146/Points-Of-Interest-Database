<html>
<head>
   <link href="style.css" rel="stylesheet" type="text/css">
   <meta http-equiv="content-type" content="text/html; charset=iso-8859-7">
   <title>5.4</title>
   <link rel="icon" type="image/x-icon" href="https://www.clipartmax.com/png/full/255-2552230_database-symbol-png-database-icon-flat.png">
</head>


<?php
$host = "localhost";
$user = "db1u02";
$pass = "5mAdwcEJ";
$db = $user;
?>

<body>
<h1>5.4</h1>


<?php
$link = pg_connect("host=$host dbname=$db user=$user password=$pass") 
	or die ("Could not connect to server\n"); 

$result = pg_exec($link, "SELECT name AS tab1 ,surname AS tab2,dob AS tab3,gender AS tab4,followers_num AS tab5, (COUNT(user1_id)+COUNT(user2_id))/2 AS tab6
                            FROM users, friends 
                            WHERE id=user2_id
                            OR id=user1_id 
                            GROUP BY name,surname,dob,gender,followers_num
                            ORDER BY tab6 DESC
                            LIMIT 1;")
	or die("Cannot execute query: $query\n");

$numrows = pg_numrows($result);
?>


<table border="1">
	<tr>
		<th>Όνομα</th>
		<th>Επώνυμο</th>
        <th>Ημερομηνία Γέννησης</th>
        <th>Φύλο</th>
        <th>Αριθμός Ακοκολούθων</th>
        <th>Αριθμός Φίλων</th>
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
        <td>", $row["tab6"], "</td>
		</tr>
		";
	}
	pg_close($link);
	?>
</table>

<h3> <a href="http://hilon.dit.uop.gr/~db1u02/index.php">Επιστροφή στην αρχική σελίδα</a></h3>


</body>
</html>