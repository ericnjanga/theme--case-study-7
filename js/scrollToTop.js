// JavaScript code for scrolling back to top 


let btnBackToTop = document.querySelector('.btn-back-to-top');

function scrollToTop() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE, and Opera
}


if (btnBackToTop) {

  // Show/hide back-to-top button based on scroll position
  window.onscroll = function () {
    // var button = document.querySelector('.btn-back-to-top');
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      btnBackToTop.style.display = 'block';
    } else {
      btnBackToTop.style.display = 'none';
    }
  };

  btnBackToTop.addEventListener('click', function(event) {
    // Preventing the default behavior of the button (e.g., preventing form submission)
    event.preventDefault();
    scrollToTop();
  });
}




 

