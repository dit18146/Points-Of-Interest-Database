<html>
<head>
   <link href="style.css" rel="stylesheet" type="text/css">
   <meta http-equiv="content-type" content="text/html; charset=iso-8859-7">
   <title>Εισαγωγή στην σχέση users</title>
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
       
<h1>Εισαγωγή στην σχέση users</h2> 
       
<form action = "<?php $_PHP_SELF ?>" method = "GET">

<p>CharID: <input class="form-control" name='charid' autocomplete="off" type="string" placeholder="" size=20> 

<p>Όνομα: <input class="form-control" name='name' autocomplete="off" type="string" placeholder="" size=20> 
	
<p>Επώνυμο: <input class="form-control" name='surname' autocomplete="off" type="string" placeholder="" size=20> </p>
        
<p>Ημερομηνία: <input class="form-control" name='dob' autocomplete="off" type="date" placeholder="" size=20> 

<p>Φύλο: <input class="form-control" name='gender' autocomplete="off" type="string" placeholder="" size=20>

<p>Αριθμός ακολούθων: <input class="form-control" name='followers_num' autocomplete="off" type="string" placeholder="" size=20> 

<p><button type="reset">Καθαρισμός φόρμας</button> <input type="Submit" value="Εισαγωγή" name="Submit1">

</form>

      
</body>
<?php
if (isset($_GET["Submit1"]))
{
	error_reporting(0);
  	$a1 = $_GET['charid'];
  	$a2 = $_GET['name'];
  	$a3 = $_GET['surname'];
	$a4 = $_GET['dob'];
  	$a5 = $_GET['gender'];
  	$a6 = $_GET['followers_num'];

   	if($a1 && $a2 && $a3) {  
      	$con = pg_connect("host=$host dbname=$db user=$user password=$pass")
        	or die ("Could not connect to server\n");
            
      	  $sqlp="INSERT INTO users(special_id, name, surname, dob, gender, followers_num)  VALUES ('$a1', '$a2', '$a3', '$a4', '$a5', '$a6');";
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