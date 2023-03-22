<?php
include("../class/class_catalogo_curso_dal.php");
if(isset($_POST['id'])){
   $id=  $_POST['id'];
			$metodos_cursos=new catalogo_curso_dal;
			$cuantos=$metodos_cursos->borrar_curso($id);
      echo $cuantos;
}
else{
  echo "no llego correctamente el id, error backend";
}
?>