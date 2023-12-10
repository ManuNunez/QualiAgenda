document.addEventListener("DOMContentLoaded", function () {
    var agregarBtn = document.querySelector("#agregarBtn");
    var agregarModal = new bootstrap.Modal(document.getElementById("agregarModal"));

    agregarBtn.addEventListener("click", function () {
        agregarModal.show();
    });

    var tipoPagoSelect = document.getElementById("tipoPago");
    var pagos = document.querySelectorAll(".pago");

    tipoPagoSelect.addEventListener("change", function () {
        pagos.forEach(function (pago) {
            pago.style.display = "none";
        });

        var selectedOption = tipoPagoSelect.value;

        if (selectedOption === "anual") {
            document.getElementById("pago1").style.display = "block";
        } else if (selectedOption === "semestral") {
            document.getElementById("pago1").style.display = "block";
            document.getElementById("pago2").style.display = "block";
        } else if (selectedOption === "trimestral") {
            document.getElementById("pago1").style.display = "block";
            document.getElementById("pago2").style.display = "block";
            document.getElementById("pago3").style.display = "block";
            document.getElementById("pago4").style.display = "block";
        } else {
            
        }
    });
});
