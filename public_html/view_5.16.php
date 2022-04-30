<html>
<head>
   <link href="style.css" rel="stylesheet" type="text/css">
   <meta http-equiv="content-type" content="text/html; charset=iso-8859-7">
   <title>5.16</title>
   <link rel="icon" type="image/x-icon" href="https://www.clipartmax.com/png/full/255-2552230_database-symbol-png-database-icon-flat.png">
</head>


<?php
$host = "localhost";
$user = "db1u02";
$pass = "5mAdwcEJ";
$db = $user;
?>

<body>
<h1>5.16</h1>
<h2>Δώστε χρονιά X, την περίοδο από τον μήνα Y έως τον μήνα Z</h2> 
<form method="POST">  
  Δώσε χρονιά: <input type="text" name="name">
  <br><br> 
  Δώσε από μήνα: <input type="text" name="name2">
  <br><br>
  Δώσε έως μήνα: <input type="text" name="name3">
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
$link = pg_connect("host=$host dbname=$db user=$user password=$pass") 
	or die ("Could not connect to server\n"); 

$result = pg_exec($link, "SELECT DISTINCT users.name AS tab1, users.surname AS tab2, COUNT(check_in.user_id) AS tab3
                            FROM users, city, poi, located, check_in
                            WHERE located.poi_id=poi.id
                            AND located.city_id=city.id
                            AND check_in.user_id=users.id
                            AND check_in.poi_id=poi.id
                            AND year=$name
                            AND month>$name2
                            AND month<$name3
                            GROUP BY users.name, users.surname
                            ORDER BY COUNT(check_in.user_id) DESC
                            LIMIT 1;")
	or die("Cannot execute query: $query\n");
}
$numrows = pg_numrows($result);
?>

<table border="1">
<tr>
		<th>Όνομα</th>
        <th>Επώνυμο</th>
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