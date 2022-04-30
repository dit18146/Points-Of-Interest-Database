<html>
<head>
   <link href="style.css" rel="stylesheet" type="text/css">
   <meta http-equiv="content-type" content="text/html; charset=iso-8859-7">
   <title>Διαγραφή στην σχέση poi</title>
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
        
<h1>Διαγραφή στην σχέση poi</h1> 

<form action = "<?php $_PHP_SELF ?>" method = "GET">

<p>hex_id (16αδικό): <input class="form-control" name='hex_id' autocomplete="off" type="string" placeholder="" size=20> 
	
<p><button type="reset">Καθαρισμός φόρμας</button> <input type="Submit" value="Εισαγωγή" name="Submit1">

</form>

      
</body>
<?php
if (isset($_GET["Submit1"]))
{
	error_reporting(0);
  	$a1 = $_GET['hex_id'];

   	if($a1) {  
      	$con = pg_connect("host=$host dbname=$db user=$user password=$pass")
        	or die ("Could not connect to server\n");
          $sqlp2 = "DELETE FROM poi WHERE hex_id='".$a1."'";
		  $aaa = pg_query($con, $sqlp2) or die("Cannot execute query2: $sqlp2\n");
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