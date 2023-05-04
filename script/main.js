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
        next(formName);
      });
    }

    function save(formName){
      submitForm(formName, false);
    }

    function next(formName){
      if(formName == 'form1'){
          changeForm('form2', form2Script);
        } else if(formName == 'form2'){
          changeForm('form3', ()=>{});
        }
    }

    function prev(prevForm){
      if(prevForm == 'form2'){
        changeForm('form2', form2Script);
      } else {
        changeForm(prevForm, ()=>{});
      }
    }

    function changeForm(formName, callback = ()=>{}){
      let xhr = new XMLHttpRequest();
      xhr.open('POST', 'forms/'+formName+'.php');
      xhr.onload = function() {
        if (xhr.status === 200) {
          document.getElementById('form-container').innerHTML = xhr.responseText;
          callback();
          listenToSubmit();
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





    // script for form 2
  function form2Script(){
    const replicables = ['school', 'subjects', 'midwifery_school', 'employment'];

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
      const selects = clone.querySelectorAll('select');
      selects .forEach(select => {
        const name = select.getAttribute('name');
        if (name) {
          select.setAttribute('name', `${name.replace(/-\d+$/, '')}-${entryCount}`);
        }
        const id = select.getAttribute('id');
        if (id) {
          select.setAttribute('id', `${id}-${entryCount}`);
        }
        select.value = '';
      });
      const options = clone.querySelectorAll('option');
      options.forEach(option => {
        const selected = option.hasAttribute('selected');
        if (selected) {
          option.removeAttribute('selected');
        }
      });
      const labels = clone.querySelectorAll('label');
      labels.forEach(label => label.setAttribute('class', 'desktop-hide'));
      
      entry.parentNode.insertBefore(clone, btn);
    }
  }