<form class="my-form" method="post" id="my-form">
  <div id="message"></div>
    <!-- School Attended Fieldset -->
    <div class="fieldset">
      <div class="fieldset-title">School Attended<span class="requiredd">*</span></div>
      <div class="school form-row">
        <div class="form-group">
          <label for="school-attended">School</label>
          <input type="text" id="school-attended-1" name="school-attended-1" class="form-field" requiredd>
        </div>
        <div class="form-group">
          <label for="from-year">From (year)</label>
          <input type="number" id="from-year-1" name="from-year-1" class="form-field" min="1900" max="2099" step="1">
        </div>
        <div class="form-group">
          <label for="to-year">To (year)</label>
          <input type="number" id="to-year-1" name="to-year-1" class="form-field" min="1900" max="2099" step="1">
        </div>
      </div>
      <button type="button" class="fieldset-btn" id="add-school">+</button>
    </div>


    <!-- Subjects Fieldset -->
    <div class="fieldset">
      <div class="fieldset-title">Subject passed with grades<span class="requiredd">*</span></div>
      <div class="subjects form-row">
        <div class="form-group">
          <label for="subjects">Subject</label>
          <input type="text" id="subjects-1" name="subjects-1" class="form-field" requiredd>
        </div>
        <div class="form-group">
          <label for="from-year">Grade</label>
          <select name="grade-1" id="grade-1" class="form-field" requiredd>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
            <option value="E">E</option>
            <option value="F">F</option>
          </select>
        </div>
      </div>
      <button type="button" class="fieldset-btn" id="add-subjects">+</button>
    </div>

    <!-- School of Midwifery Attended Fieldset -->
    <div class="fieldset">
      <div class="fieldset-title">School of Midwifery / Psychiatry Attended<span class="requiredd">*</span></div>
      <div class="midwifery-school form-row">
        <div class="form-group">
          <label for="school-attended">School</label>
          <input type="text" id="midwifery-school-attended-1" name="midwifery-school-attended-1" class="form-field" requiredd>
        </div>
        <div class="form-group">
          <label for="from-year">From (year)</label>
          <input type="number" id="midwifery-from-year-1" name="midwifery-from-year-1" class="form-field" min="1900" max="2099" step="1">
        </div>
        <div class="form-group">
          <label for="to-year">To (year)</label>
          <input type="number" id="midwifery-to-year-1" name="midwifery-o-year-1" class="form-field" min="1900" max="2099" step="1">
        </div>
      </div>
      <button type="button" class="fieldset-btn" id="add-midwifery-school">+</button>
    </div>

    <!-- Experience Fieldset -->
    <div class="fieldset">
      <div class="fieldset-title">Number of Years of Experience - Post Qualification<span class="requiredd">*</span></div>
      <div class="experience form-row">
        <div class="form-group">
          <input type="text" id="experience" name="experience" class="form-field" requiredd>
        </div>
      </div>
    </div>

    <!-- Employment Fieldset -->
    <div class="fieldset">
      <!-- <div class="fieldset-title"><span class="requiredd">*</span></div> -->
      <div class="employment form-row">
        <div class="form-group">
          <label for="present-employment-1">Present Employment</label>
          <input type="text" id="present-employment-1" name="present-employment-1" class="form-field">
        </div>
        <div class="form-group">
          <label for="employer-name-1">Name of Employer</label>
          <input type="text" id="employer-name-1" name="employer-name-1" class="form-field">
        </div>
        <div class="form-group">
          <label for="employer-address">Address of Employer</label>
          <input type="text" id="employer-address-1" name="employer-address-1" class="form-field">
        </div>
      </div>
      <button type="button" class="fieldset-btn" id="add-employment">+</button>
    </div>

    <!-- Postal Address Fieldset -->
    <div class="fieldset">
      <div class="fieldset-title">Present Postal Address<span class="requiredd">*</span></div>
      <div class="postal-address form-row">
        <div class="form-group">
          <input type="text" id="postal-address" name="postal-address" class="form-field" requiredd>
        </div>
      </div>
    </div>

    
    <input type="button" class="submit-button" value="Save" onclick="save('form2')">
    <input type="hidden" name="formName" value="form2">
    <input type="submit" class="submit-button" value="Next">
</form>