<?php
if(isset($_POST['formName'])) {
  include '../server/db.php';

  // Sanitize input data
  $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
  $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
  $jamb_reg_num = filter_var($_POST['jamb-reg-num'], FILTER_SANITIZE_STRING);
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $sex = filter_var($_POST['sex'], FILTER_SANITIZE_STRING);
  $date_of_birth = filter_var($_POST['date-of-birth'], FILTER_SANITIZE_STRING);
  $nationality = filter_var($_POST['nationality'], FILTER_SANITIZE_STRING);
  $state_of_origin = filter_var($_POST['state-of-origin'], FILTER_SANITIZE_STRING);
  $lga = filter_var($_POST['lga'], FILTER_SANITIZE_STRING);
  
  // Validate input data
  $errors = array();
  
  if(isset($_POST['validate'])){
      if(empty($firstname)) {
        $errors[] = "First name is required";
      }
      if(empty($lastname)) {
        $errors[] = "Last name is required";
      }
      if(empty($jamb_reg_num)) {
        $errors[] = "JAMB registration number is required";
      }
      if(empty($email)) {
        $errors[] = "Email is required";
      } else {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $errors[] = "Invalid email format";
        }
      }
      if(empty($sex)) {
        $errors[] = "Sex is required";
      }
      if(empty($date_of_birth)) {
        $errors[] = "Date of birth is required";
      }
      if(empty($nationality)) {
        $errors[] = "Nationality is required";
      }
      if(empty($state_of_origin)) {
        $errors[] = "State of origin is required";
      }
      if(empty($lga)) {
        $errors[] = "Local Government is required";
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
    $stmt = $conn->prepare("INSERT INTO users (user_id, firstname, lastname, jamb_reg_num, email, sex, date_of_birth, nationality, state_of_origin, local_govt) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE firstname =  ?, lastname = ?, jamb_reg_num = ?, email= ?, sex = ?, date_of_birth = ?, nationality = ?, state_of_origin = ?, local_govt = ?");
    $stmt->bind_param("sssssssssssssssssss", $user_id, $firstname, $lastname, $jamb_reg_num, $email, $sex, $date_of_birth, $nationality, $state_of_origin, $lga, $firstname, $lastname, $jamb_reg_num, $email, $sex, $date_of_birth, $nationality, $state_of_origin, $lga);
    
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