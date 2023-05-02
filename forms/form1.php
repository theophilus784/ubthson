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



<form class="my-form" method="post" id="my-form">
    <div id="message"></div>
    <div class="form-row">
      <div class="form-group">
        <label for="firstname">First name:</label>
        <input type="text" id="firstname" name="firstname" class="form-field" value="<?php echo isset($row['firstname']) ? $row['firstname'] : '' ?>" required>
      </div>
      <div class="form-group">
        <label for="lastname">Last name:</label>
        <input type="text" id="lastname" name="lastname" class="form-field" value="<?php echo isset($row['lastname']) ? $row['lastname'] : '' ?>" required>
      </div>
    </div>
    
    <div class="form-row">
      <div class="form-group">
        <label for="jamb-reg-num">JAMB registration number:</label>
        <input type="text" id="jamb-reg-num" name="jamb-reg-num" class="form-field" value="<?php echo isset($row['jamb_reg_num']) ? $row['jamb_reg_num'] : '' ?>" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" class="form-field" value="<?php echo isset($row['email']) ? $row['email'] : '' ?>" required>
      </div>
    </div>
  
    <div class="form-row">
      <div class="form-group">
        <label for="sex">Sex:</label>
        <select id="sex" name="sex" class="form-field" required>
          <option value="">Select sex</option>
          <option value="male" <?php echo isset($row['sex']) ? $row['sex'] == 'male' ? 'selected' : '' : '' ?>>Male</option>
          <option value="female" <?php echo isset($row['sex']) ? $row['sex'] == 'female' ? 'selected' : '' : '' ?>>Female</option>
        </select>
      </div>
      <div class="form-group">
        <label for="date-of-birth">Date of birth:</label>
        <input type="date" id="date-of-birth" name="date-of-birth" class="form-field" value="<?php echo isset($row['date_of_birth']) ? $row['date_of_birth'] : '' ?>" required>
      </div>
    </div>
    
    <div class="form-row">
      <div class="form-group">
        <label for="nationality">Nationality:</label>
        <select id="nationality" name="nationality" class="form-field">
          <option value="Nigeria">Select nationality</option>
          <!-- List of countries -->
        </select>
      </div>
      <div class="form-group">
        <label for="state-of-origin">State of origin:</label>
        <select id="state-of-origin" name="state-of-origin" class="form-field">
          <option value="Kwara">Select state of origin</option>
          <!-- List of Nigerian states -->
        </select>
      </div>
    </div>
  
    <div class="form-row">
        <div class="form-group">
            <label for="lga">Local Government:</label>
            <input type="text" id="lga" name="lga" class="form-field" value="<?php echo isset($row['local_govt']) ? $row['local_govt'] : '' ?>" required>
        </div>
    </div>
  
    <input type="hidden" name="formName" value="form1">
    <input type="button" class="submit-button" value="Save" onclick="save('form1')">
    <input type="submit" class="submit-button" value="Next">
  </form>