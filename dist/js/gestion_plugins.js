$(function () {

  "use strict";

  //sortable Using jquery UI
  $(".connectedSortable").sortable({
    placeholder: "sort-highlight",
    connectWith: ".connectedSortable",
    handle: ".box-header, .nav-tabs",
    forcePlaceholderSize: true,
    zIndex: 999999
  });
  $(".connectedSortable .box-header, .connectedSortable .nav-tabs-custom").css("cursor", "move");

  //jQuery UI sortable para listas
  $(".todo-list").sortable({
    placeholder: "sort-highlight",
    handle: ".handle",
    forcePlaceholderSize: true,
    zIndex: 999999
  });

  //Calendario
  $("#calendar").datepicker();

  //Slimscroll
  $('#chat-box').slimScroll({
    height: '250px'
  });

  //Listas
  $(".todo-list").todolist({
    onCheck: function (ele) {
      window.console.log("El elemento ha sido seleccionado");
      return ele;
    },
    onUncheck: function (ele) {
      window.console.log("El elemento ha sido deseleccionado");
      return ele;
    }
  });

});
