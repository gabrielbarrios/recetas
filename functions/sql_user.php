<?php
function addUser($addUser, $my_Db_Connection)
{
	// Here we create a variable that calls the prepare() method of the database object
	// The SQL query you want to run is entered as the parameter, and placeholders are written like this :placeholder_name
	$my_Insert_Statement = $my_Db_Connection->prepare("INSERT INTO users (id, username, name, lastname, email, password, created_at, status, kind) VALUES (:id, :username, :name, :lastname, :email, :loginpassword, :created_at, :status, :kind)");

	// Now we tell the script which variable each placeholder actually refers to using the bindParam() method
	// First parameter is the placeholder in the statement above - the second parameter is a variable that it should refer to
	$my_Insert_Statement->bindParam(':id', $addUser["id"]);
	$my_Insert_Statement->bindParam(':username', $addUser["username"]);
	$my_Insert_Statement->bindParam(':name', $addUser["name"]);
	$my_Insert_Statement->bindParam(':lastname', $addUser["lastname"]);
	$my_Insert_Statement->bindParam(':email', $addUser["email"]);
	$my_Insert_Statement->bindParam(':loginpassword', $addUser["loginpassword"]);
	$my_Insert_Statement->bindParam(':created_at', $addUser["created_at"]);
	$my_Insert_Statement->bindParam(':status', $addUser["status"]);
	$my_Insert_Statement->bindParam(':kind', $addUser["kind"]);
	
	// Execute the query using the data we just defined
	// The execute() method returns TRUE if it is successful and FALSE if it is not, allowing you to write your own messages here
	if ($my_Insert_Statement->execute()) {
	  echo "New record created successfully";
	  return true;
	} else {
	  echo "Unable to create record";
	  return false;
	}
	
}

?>