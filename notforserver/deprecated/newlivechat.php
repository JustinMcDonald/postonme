<?php
$id = $_GET['id'];

$dbcnx = @mysql_connect("localhost", "postonme_admin", "kyr6y274n");
if (!$dbcnx) {
	echo( "<P>Unable to connect to the database server at this time.</P>" );
	exit();
}

if (!@mysql_select_db("postonme_publicDB", $dbcnx) ) {
  echo( "<P>Unable to locate the 'publicDB' database at this time.</P>" );
  exit();
}
		
$password = RandomString();

$sql = "INSERT INTO livechat (pass, adid) VALUES ('$password', '$id')";
if (!mysql_query($sql)) echo "chat creation failed";

echo $password;

function RandomString() {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = "";
    for ($i = 0; $i < 10; $i++) 
        {
            $randstring = $randstring . $characters[rand(0, strlen($characters))];
        }
    return $randstring;
}
?>