<?php
include("class/class_aspirantes_cursos_dal.php");
if(isset($_POST['rfc']) and isset($_POST['id_curso'])){
   $rfc=  $_POST['rfc'];
   $id_curso=  $_POST['id_curso'];

      $metodos_aspirantes_cursos=new AspiranteCurso_dal;
      $result_aspirantes_cursos=$metodos_aspirantes_cursos->existe_aspirantecurso($id_curso,$rfc);

       echo $result_aspirantes_cursos; 
}
else{
  echo "no llego correctamente el id y rfc, error backend,checa existe rfc,id_curso";
  exit;  
}
?>