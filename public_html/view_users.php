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

$result = pg_exec($link, "SELECT name,surname,dob,gender,followers_num, COUNT(user1_id) FROM users, friends WHERE id=user1_id GROUP BY name,surname,dob,gender,followers_num,user1_id INTERSECT SELECT name,surname,dob,gender,followers_num, COUNT(user2_id) FROM users, friends WHERE id=user2_id GROUP BY name,surname,dob,gender,followers_num,user2_id;")
	or die("Cannot execute query: $query\n");

$numrows = pg_numrows($result);
?>

<table border="1">
	<tr>
		<th>όνομα</th>
		<th>επώνυμο</th>
		<th>ημερομηνία γέννησης</th>
		<th>φύλο</th>
		<th>αρ ακολούθων</th>
	</tr>
	<?php
	// Loop on rows in the result set.

	for($ri = 0; $ri < $numrows; $ri++) {
		echo "<tr>\n";
		$row = pg_fetch_array($result, $ri);
		echo " <td>", $row["name"], "</td>
		<td>", $row["surname"], "</td>
		<td>", $row["dob"], "</td>
		<td>", $row["gender"], "</td>
		<td>", $row["followers_num"], "</td>
		</tr>
		";
	}
	pg_close($link);
	?>
</table>

<h3> <a href="http://hilon.dit.uop.gr/~db1u02/index.php">Επιστροφή στην αρχική σελίδα</a></h3>


</body>
</html>