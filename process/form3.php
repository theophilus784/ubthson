<?php
if(isset($_POST['formName'])) {
  include '../server/db.php';

  // Sanitize input data
  $ref1Name = filter_var($_POST['ref1-name'], FILTER_SANITIZE_STRING);
  $ref1Address = filter_var($_POST['ref1-address'], FILTER_SANITIZE_STRING);
  $ref2Name = filter_var($_POST['ref2-name'], FILTER_SANITIZE_STRING);
  $ref2Address = filter_var($_POST['ref2-address'], FILTER_SANITIZE_STRING);
  $kinName = filter_var($_POST['kin-name'], FILTER_SANITIZE_STRING);
  $kinPhone = filter_var($_POST['kin-phone'], FILTER_SANITIZE_STRING);
  $kinAddress = filter_var($_POST['kin-address'], FILTER_SANITIZE_STRING);
 
  // Validate input data
  $errors = array();
  
  if(isset($_POST['validate'])){
      if(empty($ref1Name)) {
        $errors[] = "Referee 1's name is required";
      }
      if(empty($ref1Address)) {
        $errors[] = "Referee 1's address is required";
      }
      if(empty($ref2Name)) {
        $errors[] = "Referee 2's name is required";
      }
      if(empty($ref2Address)) {
        $errors[] = "Referee 2's address is required";
      }
      if(empty($kinName)) {
        $errors[] = "Next of kin's name is required";
      }
      if(empty($kinPhone)) {
        $errors[] = "Next of kin's phone number is required";
      }
      if(empty($kinAddress)) {
        $errors[] = "Next of kin's address is required";
      }
  }
  
  // If there are errors, display them
  if(count($errors) > 0) {
    echo "<ul>";
    foreach($errors as $error) {
      echo "<li>$error</li>";
    }
    echo "</ul>";
  } else {
    // If there are no errors, insert data into database
    
    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO users (user_id, ref1_name, ref1_address, ref2_name, ref2_address, kin_name, kin_phone, kin_address) VALUES (?, ?, ?, ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE ref1_name = ?, ref1_address = ?, ref2_name = ?, ref2_address = ?, kin_name = ?, kin_phone = ?, kin_address = ?");
    $stmt->bind_param("sssssssssssssss", $user_id, $ref1Name, $ref1Address, $ref2Name, $ref2Address, $kinName, $kinPhone, $kinAddress, $ref1Name, $ref1Address, $ref2Name, $ref2Address, $kinName, $kinPhone, $kinAddress);

    // Execute statement and check for errors
    if($stmt->execute() === TRUE) {
      echo "Data submitted successfully";
    } else {
      echo "Error: " . $stmt->error;
    }
    
    // Close statement and connection
    $stmt->close();
    $conn->close();
  }
}
?>