$(document).ready(function() {
   $("#send").click(function(){
     var prezzo = $("#prezzo").val();
     var quantita = $("#quantita").val();
     $.ajax({
       type: "POST",
       url: "./js/calcola.php",
       data: "prezzo=" + prezzo + "&quantita=" + quantita,
       dataType: "html",
       success: function(msg)
       {
         $("#prezzo").html(msg);
       },
       error: function()
       {
         alert("Error: Chiamata AJAX fallita");
       }
     });
   });
 });