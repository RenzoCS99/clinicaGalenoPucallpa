$(".DT").on("click", ".EliminarSecretaria", function(){

    var $id = $(this).attr("Sid");
    var imgS = $(this).attr("imgS");

    window.location="index.php?url=secretarias&Sid="+$id+"&imgS="+imgS;

})