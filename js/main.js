let reg_container = document.querySelector('.reg__container');
let regSubmitBtn = document.querySelector('.reg__submit');
let stuRegForm = document.querySelector('.register__main');
let qualForm = document.querySelector('.qualification__main');

function submit() {
  let close = document.querySelector('.dismiss');
  let mainContainer = document.querySelector('.card__main__container');
  
  close.addEventListener('click', function() {
    mainContainer.classList.add('closeWindow');
    console.log('clicked');
  });
}

function clearInputField() {
  document.querySelector(".form__container").reset()
}


function hideSection() {
  reg_container.classList.add('hide');
}

function toggleOtherHobbies(checkbox) {
  const inputField = document.getElementById('otherHobbiesInput');
  inputField.disabled = !checkbox.checked;
  if (checkbox.checked) inputField.focus(); 
}

document.addEventListener('DOMContentLoaded', function() {
  const othersCheckbox = document.querySelector('input[name="hobbies[]"][value="Others:"]');
  const otherHobbiesInput = document.getElementById('otherHobbiesInput');
  otherHobbiesInput.disabled = !othersCheckbox.checked;
});

document.querySelector('.next__btn').addEventListener('click', function() {
  stuRegForm.classList.add('hide');
  qualForm.classList.add('show');
})

document.querySelector('.back__btn').addEventListener('click', function() {
  stuRegForm.classList.remove('hide');
  qualForm.classList.remove('show');
})



