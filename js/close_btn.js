function submit() {
  let close = document.querySelector('.dismiss');
  let mainContainer = document.querySelector('.card__main__container');
  
  close.addEventListener('click', function() {
    mainContainer.classList.add('closeWindow');
    console.log('clicked');
  });
}