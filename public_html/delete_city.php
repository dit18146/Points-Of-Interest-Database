<html>
<head>
   <link href="style.css" rel="stylesheet" type="text/css">
   <meta http-equiv="content-type" content="text/html; charset=iso-8859-7">
   <title>Διαγραφή στην σχέση city</title>
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
        
<h1>Διαγραφή στην σχέση city</h1> 

<form action = "<?php $_PHP_SELF ?>" method = "GET">

<p>Όνομα: <input class="form-control" name='name' autocomplete="off" type="string" placeholder="" size=20> 
	
<p>Πολιτεία: <input class="form-control" name='state' autocomplete="off" type="string" placeholder="" size=20> </p>
        
<p>Χώρα: <input class="form-control" name='country' autocomplete="off" type="string" placeholder="" size=20> 

<p><button type="reset">Καθαρισμός φόρμας</button> <input type="Submit" value="Εισαγωγή" name="Submit1">

</form>

      
</body>
<?php
if (isset($_GET["Submit1"]))
{
	error_reporting(0);
  	$a1 = $_GET['name'];
  	$a2 = $_GET['state'];
	$a3 = $_GET['country'];

   	if($a1 && $a2 && $a3) {  
      	$con = pg_connect("host=$host dbname=$db user=$user password=$pass")
        	or die ("Could not connect to server\n");
            
      	  $sqlp1="SELECT id FROM city WHERE name='".$a1."' AND state='".$a2."' AND country='".$a3."'";
		  $rsap = pg_query($con, $sqlp1)  or die("Cannot execute query1: $sqlp1\n");
          $row = pg_fetch_row($rsap);
          $sqlp2 = "DELETE FROM city WHERE id=$row[0];";
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