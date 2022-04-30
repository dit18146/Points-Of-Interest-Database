<html>
<head>
   <link href="style.css" rel="stylesheet" type="text/css">
   <meta http-equiv="content-type" content="text/html; charset=iso-8859-7">
   <title>Εισαγωγή στην σχέση poi</title>
   <link rel="icon" type="image/x-icon" href="https://www.clipartmax.com/png/full/255-2552230_database-symbol-png-database-icon-flat.png">
</head>

<html>

<?php
$host = "localhost";
$user = "db1u02";
$pass = "5mAdwcEJ";
$db = $user;
?>


<body>
<?php
b:  clearstatcache();
?>
       
<h1>Εισαγωγή στην σχέση poi</h2> 
       
<form action = "<?php $_PHP_SELF ?>" method = "GET">

<p>CharID: <input class="form-control" name='charid' autocomplete="off" type="string" placeholder="" size=20> 

<p>Κατηγορία: <input class="form-control" name='category' autocomplete="off" type="string" placeholder="" size=20> 
	
<p>Γεωγραφικό Μήκος: <input class="form-control" name='longitude' autocomplete="off" type="string" placeholder="" size=20> </p>
        
<p>Γεωγραφικό Πλάτος: <input class="form-control" name='latitude' autocomplete="off" type="string" placeholder="" size=20>

<p><button type="reset">Καθαρισμός φόρμας</button> <input type="Submit" value="Εισαγωγή" name="Submit1">

</form>

      
</body>
<?php
if (isset($_GET["Submit1"]))
{
	error_reporting(0);
  	$a1 = $_GET['charid'];
  	$a2 = $_GET['category'];
  	$a3 = $_GET['longitude'];
	$a4 = $_GET['latitude'];

   	if($a1 && $a2 && $a3 && $a4) {  
      	$con = pg_connect("host=$host dbname=$db user=$user password=$pass")
        	or die ("Could not connect to server\n");
            
      	  $sqlp="INSERT INTO poi(hex_id, category, longitude, latitude)  VALUES ('$a1', '$a2', '$a3', '$a4');";
		  $rsap = pg_query($con, $sqlp)  or die("Cannot execute query: $sqlp\n");
		  pg_close($con);
    }
}      
?>


</body>
<body>
<?php
  clearstatcache();
  
?>
       
<h3> <a href="http://hilon.dit.uop.gr/~db1u02/index.php">Επιστροφή στην αρχική σελίδα</a></h3>
  
</html>