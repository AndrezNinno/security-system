/* ========================================================================

HopScotch Init

=========================================================================
 */


"use strict";


/*======== Doucument Ready Function =========*/
var tour;
$(document).ready(function() {
    tour= {
        id: "hello-hopscotch",
        steps: [
            {
                title: "Inicio",
                content: "En esta sección se encuentran los valores totales de los datos más importantes a mostrar dentro de la plataforma.",
                target: "inicio",
                placement: "bottom"
            },
            {
                title: "Visitantes",
                content: "En esta seccion podrá ver cuantos usuarios se encuentran dentro del centro comercial y cuanto tiempo llevan allí.",
                target: "visitantes_tour",
                placement: "right"
            },
            {
                title: "Empleados",
                content: "En esta sección podrá crear empleados del centro comercial, también podrá ver la lista de los mismos, con algunos datos adicionales.",
                target: "empleados_tour",
                placement: "right"
            },
            {
                title: "Vigilantes",
                content: "En esta sección podrá crear usuarios de categoria vigilantes con usuario y contraseña, para luego asígnar puertas. ",
                target: "vigilantes_tour",
                placement: "right"
            },
            {
                title: "Puertas",
                content: "En esta sección podrá crear puertas y asignar vigilantes a ellas, también podrá editarlas y borrarlas de ser necesario.",
                target: "puertas",
                placement: "right"
            },
            {
                title: "Configuraciones",
                content: "En la sección señalada puedes cambiar variables importantes como el aforo total del lugar y el tiempo máximo de duración de un visitante.",
                target: "puertas",
                placement: "right"
            },
            
            {
                title: "Datos Personales",
                content: "En la sección señalada puedes cambiar datos personales y tu contraseña, recuerda siempre finalizar la sesión al terminar.",
                target: ".navbar-nav-right",
                placement: "left"
            },
            {
                title: "Tour Explicado",
                content: "Si deseas saber como funcionan algunas de las caracteristicas de esta plataforma solo debes dar click aquí y te explicamos todo.",
                target: "startTourBtn",
                placement: "right"
            }
        ]
    }
});
$("#startTourBtn").on("click", function(t) {
    hopscotch.startTour(tour)
});
/*======== End Doucument Ready Function =========*/