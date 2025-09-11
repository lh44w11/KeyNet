$(document).ready(function () {
  $("#contactForm").on("submit", function (e) {
    e.preventDefault();

    $.ajax({
      url: "forms/guardar_contacto.php",
      type: "POST",
      data: $(this).serialize(),
      success: function (response) {
            if (response.trim() === "true") {
                $("#contactForm button[type=submit]").hide();
                $("#response").html("<div class='alert alert-success'>Hemos recibido tu mensaje y nos contactaremos a la brevedad. Muchas Gracias!</div>");
                $("#contactForm").trigger("reset");
                setTimeout(function () {
                    $("#successMsg").fadeOut();
                }, 60000);

            } else {
                
                $("#response").html("<div class='alert alert-error'>❌ Error al enviar el mensaje</div>");
                $("#contactForm").trigger("reset");
            }
        },
        error: function () {
            $("#response").html("<div class='alert alert-error'>❌ Error en la comunicación con el servidor</div>");
        }
    });
  });
});