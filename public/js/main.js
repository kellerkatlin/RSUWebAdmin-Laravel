(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($("#spinner").length > 0) {
                $("#spinner").removeClass("show");
            }
        }, 1);
    };
    spinner();

    // Initiate the wowjs
    new WOW().init();

    // Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $(".sticky-top").addClass("shadow-sm").css("top", "0px");
        } else {
            $(".sticky-top").removeClass("shadow-sm").css("top", "-100px");
        }
    });

    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $(".back-to-top").fadeIn("slow");
        } else {
            $(".back-to-top").fadeOut("slow");
        }
    });
    $(".back-to-top").click(function () {
        $("html, body").animate({ scrollTop: 0 }, 1500, "easeInOutExpo");
        return false;
    });

    // Modal Video
    $(".btn-play").click(function () {
        var videoSrc = $(this).attr("href");
        window.location.href = videoSrc;
    });

    // Project and Testimonial carousel
    $(".project-carousel, .testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        margin: 25,
        loop: true,
        center: true,
        dots: false,
        nav: true,
        navText: [
            '<i class="bi bi-chevron-left"></i>',
            '<i class="bi bi-chevron-right"></i>',
        ],
        responsive: {
            0: {
                items: 1,
            },
            576: {
                items: 1,
            },
            768: {
                items: 2,
            },
            992: {
                items: 3,
            },
        },
    });
})(jQuery);

// JS para el formulario de voluntariado
$(function()  {
    const tipoDocumento = $("#tipo_doc");
    const campoAdicional = $("#campoAdicional");
    const campoAdicionalLabel = $("#campoAdicionalLabel");
    const campoAdicionalInput = $("#campoAdicionalInput");

    tipoDocumento.on("change", function () {
        const seleccionado = tipoDocumento.val();
        const nombreSeleccionado = tipoDocumento
            .find(":selected")
            .data("nombre");
        campoAdicional.css("display", seleccionado !== "" ? "block" : "none");
        campoAdicionalLabel.text(
            seleccionado !== "" ? nombreSeleccionado + ":" : ""
        );
    });
});
$(function() {
    const seguro = $("#seguro");
    const idseguro = $("#idseguro");

    seguro.on("change", function () {
        const seleccionado = seguro.val();
        if (seleccionado === "NO") {
            idseguro.prop("disabled", true);
            idseguro.val("");
        } else {
            idseguro.prop("disabled", false);
        }
    });
});
$(document).ready(function () {
    const discapacidad = $("#discapacidad");
    const iddiscapacidad = $("#iddiscapacidad");

    discapacidad.on("change", function () {
        const seleccionado = discapacidad.val();
        if (seleccionado === "NO") {
            iddiscapacidad.prop("disabled", true);
            iddiscapacidad.val("");
        } else {
            iddiscapacidad.prop("disabled", false);
        }
    });
});

$(function()  {
    // Obtener los campos "Departamento", "Provincia" y "Distrito"
    let departamentoSelect = $("#departamento");
    let provinciaSelect = $("#provincia");
    let distritoSelect = $("#distrito");

    // Agregar un evento para capturar el cambio en el campo "Departamento"
    departamentoSelect.on("change", function () {
        let departamentoId = departamentoSelect.val();

        // Bloquear los campos de "Provincia" y "Distrito"
        provinciaSelect.prop("disabled", true);
        distritoSelect.prop("disabled", true);

        // Realizar la solicitud AJAX para obtener las provincias
        $.ajax({
            url: "obtenerprovincias",
            type: "POST",
            data: {
                departamento: departamentoId,
                _token: csrfToken,
            },
            dataType: "json",
            success: function (response) {
                actualizarProvincias(response.provincias);
            },
        });
    });

    // Agregar un evento para capturar el cambio en el campo "Provincia"
    provinciaSelect.on("change", function () {
        let provinciaId = provinciaSelect.val();

        // Bloquear el campo "Distrito"
        distritoSelect.prop("disabled", true);

        // Realizar la solicitud AJAX para obtener los distritos
        $.ajax({
            url: "obtenerdistritos",
            type: "POST",
            data: {
                provincia: provinciaId,
                _token: csrfToken,
            },
            dataType: "json",
            success: function (response) {
                actualizarDistritos(response.distritos);
            },
        });
    });

    // Función para actualizar el campo "Provincia" con las opciones recibidas
    function actualizarProvincias(provincias) {
        provinciaSelect.html('<option value="">Seleccionar</option>');

        // Agregar las opciones de provincia recibidas
        provincias.forEach(function (provincia) {
            let option = $("<option></option>");
            option.val(provincia.idprovincia);
            option.text(provincia.provincia);
            provinciaSelect.append(option);
        });

        // Habilitar el campo "Provincia"
        provinciaSelect.prop("disabled", false);
    }

    // Función para actualizar el campo "Distrito" con las opciones recibidas
    function actualizarDistritos(distritos) {
        distritoSelect.html('<option value="">Seleccionar</option>');

        // Agregar las opciones de distrito recibidas
        distritos.forEach(function (distrito) {
            let option = $("<option></option>");
            option.val(distrito.iddistrito);
            option.text(distrito.distrito);
            distritoSelect.append(option);
        });

        // Habilitar el campo "Distrito"
        distritoSelect.prop("disabled", false);
    }
});
$(function() {
    const horarioFlexible = $("#horario_flexible");
    const diasDisponibles = $('input[name="dias_disponibles[]"]');

    horarioFlexible.on("change", function () {
        const seleccionado = horarioFlexible.val();
        if (seleccionado === "SI") {
            diasDisponibles.prop("checked", false);
            diasDisponibles.prop("disabled", true);
        } else {
            diasDisponibles.prop("disabled", false);
        }
    });
});

// Actualizar la página cuando se cambia el número de filas por página
$(function() {
    $('#rowsPerPage').on('change', function () {
        var url = new URL(window.location.href);
        url.searchParams.set('rowsPerPage', $(this).val());
        window.location.href = url.href;
    });
});
