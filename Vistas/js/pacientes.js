$(".DT").on("click", ".EliminarPaciente", function(){
    var Pid = $(this).attr("Pid");
    var imgP = $(this).attr("imgP");

    window.location = "index.php?url=pacientes&Pid="+Pid+"&imgP="+imgP;

})