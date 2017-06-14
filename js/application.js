/**
 * Created by jordanferreirasaran on 29/05/17.
 */
$(document).ready(function() {
    $('select').material_select();
    $('.modal').modal();
});

$(function () {
   $('#sobre').click(function () {
       $('.tap-target').tapTarget('open');
   });

   $('#btnContinuar').click(function () {
      var value = $('#interacao').val();

      if( value == 0 )
      {
          //
      }
   });
});