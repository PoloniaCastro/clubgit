function confirmar(e){
     var respuesta=confirm("¿Está seguro que desea ELIMINAR?");
     if(respuesta)
         window.location="ejecutarEliminarLista.php";
    else
    e.preventDefault();
}
