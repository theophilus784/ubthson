<?php 
    if(file_exists('server/userData.php')){
        include 'server/userData.php'; 
    } else {
        include '../server/userData.php'; 
    }
?>

<form class="my-form" method="post" id="my-form">
    <div id="message"></div>
    <div class="fieldset-title">Names and Addresses of two (2) Referees<span class="required">*</span></div>
    <div>Referee 1</div>
    <div class="form-row">
      <div class="form-group">
        <label for="ref1-name">Name:</label>
        <input type="text" id="ref1-name" name="ref1-name" class="form-field" value="<?php echo isset($row['ref1_name']) ? $row['ref1_name'] : '' ?>" required>
      </div>
      <div class="form-group">
        <label for="ref1-address">Address:</label>
        <input type="text" id="ref1-address" name="ref1-address" class="form-field" value="<?php echo isset($row['ref1_address']) ? $row['ref1_address'] : '' ?>" required>
      </div>
    </div>
    
    <div>Referee 2</div>
    <div class="form-row">
      <div class="form-group">
        <label for="ref2-namnum">Name:</label>
        <input type="text" id="ref2-name" name="ref2-name" class="form-field" value="<?php echo isset($row['ref2_name']) ? $row['ref2_name'] : '' ?>" required>
      </div>
      <div class="form-group">
        <label for="ref2-address">Address:</label>
        <input type="text" id="ref2-address" name="ref2-address" class="form-field" value="<?php echo isset($row['ref2_address']) ? $row['ref2_address'] : '' ?>" required>
      </div>
    </div>
  
    <div class="fieldset-title">Names and Addresses of Next of Kin<span class="required">*</span></div>
    <div class="form-row">
      <div class="form-group">
        <label for="kin-name">Name:</label>
        <input type="text" id="kin-name" name="kin-name" class="form-field" value="<?php echo isset($row['kin_name']) ? $row['kin_name'] : '' ?>" required>
      </div>
      <div class="form-group">
        <label for="kin-phone">Phone number:</label>
        <input type="number" id="kin-phone" name="kin-phone" class="form-field" value="<?php echo isset($row['kin_phone']) ? $row['kin_phone'] : '' ?>" required>
      </div>
      <div class="form-group">
        <label for="kin-address">Address:</label>
        <input type="text" id="kin-address" name="kin-address" class="form-field" value="<?php echo isset($row['kin_address']) ? $row['kin_address'] : '' ?>" required>
      </div>
    </div>

  
    <input type="hidden" name="formName" value="form3">
    <input type="button" class="submit-button" value="Save" onclick="save('form3')">
    <input type="button" class="submit-button" value="Previous" onclick="prev('form2')">
    <input type="submit" class="submit-button" value="Submit">
  </form>