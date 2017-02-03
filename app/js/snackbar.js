//Source: https://github.com/gokulkrishh/demo-progressive-web-app

(function (exports) {
  'use strict';

  var snakBarElement = document.querySelector('.snackbar');
  var snakBarMsg = document.querySelector('.snackbar__msg');

  //To show notification
  function showSnackBar(msg) {
    if (!msg) return;

    if (snakBarElement.classList.contains('snackbar--show')) {
      hideSnackBar();
    }

    snakBarElement.classList.add('snackbar--show');
    snakBarMsg.textContent = msg;

    setTimeout(function () {
      hideSnackBar();
    }, 3000);
  }

  function hideSnackBar() {
    snakBarElement.classList.remove('snackbar--show');
  }

  exports.showSnackBar = showSnackBar; //Make this method available in global

})(typeof window === 'undefined' ? module.exports : window);