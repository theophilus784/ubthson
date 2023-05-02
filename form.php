<style>

  * {
    box-sizing: border-box;
  }

  body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
  }

  .my-form {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    padding: 20px;
  }

  .form-row {
    display: flex;
    /* flex-wrap: wrap; */
    margin: -10px;
    /* justify-content: space-between; */
    /* width: 100%; */
    margin-bottom: 10px;
  }

  .form-group {
    flex-basis: calc(50% - 20px);
    margin: 10px;
  }

  .form-field {
    width: 100%;
    padding: 10px;
    margin: 0;
    border: none;
    border-radius: 5px;
    background-color: #f2f2f2;
  }

  .form-field:focus {
    outline: none;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
  }

  .form-label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: #333;
  }

  .submit-button {
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    width: 100%;
    margin-top: 20px;
  }

  .submit-button:hover {
    background-color: #3e8e41;
  }

  .fieldset-title {
    font-weight: bold;
    line-height: 30px;
    margin-top: 20px;
    margin-bottom: 10px;
  }

  .fieldset-btn {
    margin-bottom: 10px;
    padding: 5px;
  }

  @media (max-width: 767px) {
    .form-row {
      flex-direction: column;
    }
  }

  @media (min-width: 767px) {
    .desktop-hide{
      display: none;
    }
  }


</style>




<div id="form-container">
    <?php include 'forms/form1.php'; ?>
</div>
  

  <script>
    listenToSubmit();
    function listenToSubmit(){
      // get the form element
      const form = document.getElementById('my-form');
      formName = document.getElementsByName('formName')[0].value;

      // add an event listener to the form submit button
      form.addEventListener('submit', function(event) {
        // prevent the default form submission behavior
        event.preventDefault();
        submitForm(formName, true);
        next();
      });
    }

    function save(formName){
      submitForm(formName, false);
    }

    currentForm = 'form1';
    function next(){
      if(currentForm == 'form1'){
        changeForm('form2', form2Script);
        currentForm = 'form2';
      } else if(currentForm == 'form2'){
        changeForm('form3', ()=>{});
        currentForm = 'form3';
      }
      // forms = ['form1', 'form2', 'form3'];
      // if(forms.indexOf(currentForm) < forms.length - 1){
      //   nextForm = forms.indexOf(currentForm) + 1;
      //   changeForm(forms[nextForm]);
      //   currentForm = forms[nextForm];
      // }
    }

    function changeForm(formName, callback = null){
      let xhr = new XMLHttpRequest();
      xhr.open('POST', 'forms/'+formName+'.php');
      xhr.onload = function() {
        if (xhr.status === 200) {
          document.getElementById('form-container').innerHTML = xhr.responseText;
          callback();
        } else {
          console.error('Request failed.  Returned status of ' + xhr.status);
        }
      };
      xhr.send();

    }

    function submitForm(formName, validate = false){
      // create a new XMLHttpRequest object
      const xhr = new XMLHttpRequest();

      // set up the request
      xhr.open('POST', 'process/'+formName+'.php');

      // set the content type header
      // xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

      // set up the response handler
      xhr.onreadystatechange = function() {
          if (xhr.readyState === 4 && xhr.status === 200) {
              document.getElementById("message").innerHTML = xhr.responseText;
          }
      };

      // get the form data
      let form = document.getElementById('my-form');
      let formData = new FormData(form);
      if (validate){
        formData.append('validate', '')
      }

      // send the request
      xhr.send(formData);
    }

  </script>

<script>
  // script for form 2
  function form2Script(){
    listenToSubmit();
    const replicables = ['school', 'subjects', 'midwifery-school', 'employment'];

    // Loop through each element in the array
    replicables.forEach(function(item) {
      // Find the element by its ID
      let addButton = document.getElementById('add-'+item);
      
      // Add a click event listener to the element
      addButton.addEventListener('click', function() {
        replicate(item, addButton);
      });
    });


    function replicate(source, btn){
      const entry = document.querySelector('.'+source);
      const clone = entry.cloneNode(true);
      const entryCount = document.querySelectorAll('.'+source).length + 1;
      const inputs = clone.querySelectorAll('input');
      inputs.forEach(input => {
        const name = input.getAttribute('name');
        if (name) {
          input.setAttribute('name', `${name.replace(/-\d+$/, '')}-${entryCount}`);
        }
        const id = input.getAttribute('id');
        if (id) {
          input.setAttribute('id', `${id}-${entryCount}`);
        }
        input.value = '';
      });
      const labels = clone.querySelectorAll('label');
      labels.forEach(label => label.setAttribute('class', 'desktop-hide'));
      
      entry.parentNode.insertBefore(clone, btn);
    }
  }
</script>