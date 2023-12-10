document.addEventListener("DOMContentLoaded", function () {
    var agregarBtn = document.querySelector("#agregarBtn");
    var agregarModal = new bootstrap.Modal(document.getElementById("agregarModal"));
  
    agregarBtn.addEventListener("click", function () {
      agregarModal.show();
    });
  });
  