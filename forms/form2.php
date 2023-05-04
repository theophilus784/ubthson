<?php 
    if(file_exists('server/userData.php')){
        include 'server/userData.php'; 
    } else {
        include '../server/userData.php'; 
    }
?>

<form class="my-form" method="post" id="my-form">
  <div id="message"></div>
    <!-- School Attended Fieldset -->
    <div class="fieldset">
      <div class="fieldset-title">School Attended<span class="required">*</span></div>
      <?php $schoolAttended = json_decode($row['school_attended'], true); ?>
      <?php for($i = 0; (count($schoolAttended) == 0 || $i < count($schoolAttended)); $i++): ?>
        <div class="school form-row">
          <div class="form-group">
            <label for="" class="<?php echo $i > 0 ? 'desktop-hide' : '' ?>">School</label>
            <input type="text" id="" name="school-n-<?php echo $i+1; ?>" class="form-field" value="<?php echo isset($schoolAttended[$i]['n']) ? $schoolAttended[$i]['n'] : '' ?>" required>
          </div>
          <div class="form-group">
            <label for="" class="<?php echo $i > 0 ? 'desktop-hide' : '' ?>">From (year)</label>
            <input type="number" id="" name="school-f-<?php echo $i+1; ?>" class="form-field" value="<?php echo isset($schoolAttended[$i]['f']) ? $schoolAttended[$i]['f'] : '' ?>" min="1900" max="2099" step="1">
          </div>
          <div class="form-group">
            <label for="" class="<?php echo $i > 0 ? 'desktop-hide' : '' ?>">To (year)</label>
            <input type="number" id="" name="school-t-<?php echo $i+1; ?>" class="form-field" value="<?php echo isset($schoolAttended[$i]['t']) ? $schoolAttended[$i]['t'] : '' ?>" min="1900" max="2099" step="1">
          </div>
        </div>
      <?php endfor; ?>
      <button type="button" class="fieldset-btn" id="add-school">+</button>
    </div>


    <!-- Subjects Fieldset -->
    <div class="fieldset">
      <div class="fieldset-title">Subject passed with grades<span class="required">*</span></div>
      <?php $subjectGrade = json_decode($row['subject_grade'], true); ?>
      <?php for($i = 0; (count($subjectGrade) == 0 || $i < count($subjectGrade)); $i++): ?>
        <div class="subjects form-row">
          <div class="form-group">
            <label for="" class="<?php echo $i > 0 ? 'desktop-hide' : '' ?>">Subject</label>
            <input type="text" id="" name="subject-n-<?php echo $i+1; ?>" class="form-field" value="<?php echo isset($subjectGrade[$i]['n']) ? $subjectGrade[$i]['n'] : '' ?>" required>
          </div>
          <div class="form-group">
            <label for="" class="<?php echo $i > 0 ? 'desktop-hide' : '' ?>">Grade</label>
            <select name="subject-g-<?php echo $i+1; ?>" id="" class="form-field" required>
              <option value="">Select Grade</option>
              <option value="A" <?php echo isset($subjectGrade[$i]['g']) ? $subjectGrade[$i]['g'] == 'A' ? 'selected' : '' : '' ?>>A</option>
              <option value="B" <?php echo isset($subjectGrade[$i]['g']) ? $subjectGrade[$i]['g'] == 'B' ? 'selected' : '' : '' ?>>B</option>
              <option value="C" <?php echo isset($subjectGrade[$i]['g']) ? $subjectGrade[$i]['g'] == 'C' ? 'selected' : '' : '' ?>>C</option>
              <option value="D" <?php echo isset($subjectGrade[$i]['g']) ? $subjectGrade[$i]['g'] == 'D' ? 'selected' : '' : '' ?>>D</option>
              <option value="E" <?php echo isset($subjectGrade[$i]['g']) ? $subjectGrade[$i]['g'] == 'E' ? 'selected' : '' : '' ?>>E</option>
              <option value="F" <?php echo isset($subjectGrade[$i]['g']) ? $subjectGrade[$i]['g'] == 'F' ? 'selected' : '' : '' ?>>F</option>
            </select>
          </div>
        </div>
      <?php endfor; ?>
      <button type="button" class="fieldset-btn" id="add-subjects">+</button>
    </div>

    <!-- School of Midwifery Attended Fieldset -->
    <div class="fieldset">
      <div class="fieldset-title">School of Midwifery / Psychiatry Attended<span class="required">*</span></div>
      <?php $midSchool = json_decode($row['midwifery_school'], true); ?>
      <?php for($i = 0; (count($midSchool) == 0 || $i < count($midSchool)); $i++): ?>
        <div class="midwifery_school form-row">
          <div class="form-group">
            <label for="" class="<?php echo $i > 0 ? 'desktop-hide' : '' ?>">School</label>
            <input type="text" id="" name="midwifery-n-<?php echo $i+1; ?>" class="form-field" value="<?php echo isset($midSchool[$i]['n']) ? $midSchool[$i]['n'] : '' ?>" required>
          </div>
          <div class="form-group">
            <label for="" class="<?php echo $i > 0 ? 'desktop-hide' : '' ?>">From (year)</label>
            <input type="number" id="" name="midwifery-f-<?php echo $i+1; ?>" class="form-field" value="<?php echo isset($midSchool[$i]['f']) ? $midSchool[$i]['f'] : '' ?>" min="1900" max="2099" step="1">
          </div>
          <div class="form-group">
            <label for="" class="<?php echo $i > 0 ? 'desktop-hide' : '' ?>">To (year)</label>
            <input type="number" id="" name="midwifery-t-<?php echo $i+1; ?>" class="form-field" value="<?php echo isset($midSchool[$i]['t']) ? $midSchool[$i]['t'] : '' ?>" min="1900" max="2099" step="1">
          </div>
        </div>
      <?php endfor; ?>
      <button type="button" class="fieldset-btn" id="add-midwifery_school">+</button>
    </div>

    <!-- Experience Fieldset -->
    <div class="fieldset">
      <div class="fieldset-title">Number of Years of Experience - Post Qualification<span class="required">*</span></div>
      <div class="experience form-row">
        <div class="form-group">
          <input type="number" id="experience" name="experience" class="form-field" value="<?php echo isset($row['experience']) ? $row['experience'] : '' ?>" required>
        </div>
      </div>
    </div>

    <!-- Employment Fieldset -->
    <div class="fieldset">
      <div class="fieldset-title">List of Employments<span class="required">*</span></div>
      <?php $employment = json_decode($row['employment'], true); ?>
      <?php for($i = 0; (count($employment) == 0 || $i < count($employment)); $i++): ?>
        <div class="employment form-row">
          <div class="form-group">
            <label for="" class="<?php echo $i > 0 ? 'desktop-hide' : '' ?>">Present Employment</label>
            <input type="text" id="" name="employment-p-<?php echo $i+1; ?>" class="form-field"value="<?php echo isset($employment[$i]['p']) ? $employment[$i]['p'] : '' ?>">
          </div>
          <div class="form-group">
            <label for="" class="<?php echo $i > 0 ? 'desktop-hide' : '' ?>">Name of Employer</label>
            <input type="text" id="" name="employment-n-<?php echo $i+1; ?>" class="form-field"value="<?php echo isset($employment[$i]['n']) ? $employment[$i]['n'] : '' ?>">
          </div>
          <div class="form-group">
            <label for="" class="<?php echo $i > 0 ? 'desktop-hide' : '' ?>">Address of Employer</label>
            <input type="text" id="" name="employment-a-<?php echo $i+1; ?>" class="form-field" value="<?php echo isset($employment[$i]['a']) ? $employment[$i]['a'] : '' ?>">
          </div>
        </div>
      <?php endfor; ?>
      <button type="button" class="fieldset-btn" id="add-employment">+</button>
    </div>

    <!-- Postal Address Fieldset -->
    <div class="fieldset">
      <div class="fieldset-title">Present Postal Address<span class="required">*</span></div>
      <div class="postal_address form-row">
        <div class="form-group">
          <input type="text" id="postal_address" name="postal_address" class="form-field" value="<?php echo isset($row['postal_address']) ? $row['postal_address'] : '' ?>" required>
        </div>
      </div>
    </div>

    
    <input type="hidden" name="formName" value="form2">
    <input type="button" class="submit-button" value="Save" onclick="save('form2')">
    <input type="button" class="submit-button" value="Previous" onclick="prev('form1')">
    <input type="submit" class="submit-button" value="Next">
</form>