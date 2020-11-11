function DetailController() {

  let ajaxType = 7390;

  let modalBackground = document.getElementById("course-modal-background");
  let modalContainer = document.getElementById("course-modal-container");
  let modalContent = document.getElementById("course-modal-content");
  let button = document.getElementById("modal-close");


  this.init = function () {

    document.addEventListener('click', function (event) {
      if (event.target.classList.contains('course-scheduler-ajaxified')) {

        event.preventDefault();

        let httpRequest = new XMLHttpRequest();
        httpRequest.onreadystatechange = function () {

          if (httpRequest.readyState == XMLHttpRequest.DONE && httpRequest.status === 200) {

            let xmlCnt = httpRequest.responseText;
            modalBackground.style.height = document.body.clientHeight + 'px';
            modalContainer.style.marginTop = (window.pageYOffset + 32) +'px';
            modalBackground.classList.remove("hidden");
            modalContent.innerHTML = xmlCnt;
          }
        };
        let ajaxUri = event.target.href + '&type=' + ajaxType;
        httpRequest.open('GET', ajaxUri, true);
        httpRequest.send();
      }
    });

    button.addEventListener('click', function () {
      modalBackground.classList.add("hidden");
    });

    modalBackground.addEventListener('click', function (event) {
      if (event.target === modalBackground) {
        modalBackground.classList.add("hidden");
      }
    });
  }
}

  document.addEventListener("DOMContentLoaded", function (event) {
    let courseDetailController = new DetailController();
    courseDetailController.init();
  });
