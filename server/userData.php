<?php
if(file_exists('../server/db.php')){
    include '../server/db.php';
  } else {
    include 'server/db.php';
  }
  
$userId = 1;
// Prepare the SQL statement with a placeholder
$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");

// Bind the parameter to the placeholder
$stmt->bind_param("i", $id);

// Set the parameter value
$id = $userId;

// Execute the statement
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Process the result
$row = $result->fetch_assoc();

// Close the statement and connection
$stmt->close();
$conn->close();

?>

