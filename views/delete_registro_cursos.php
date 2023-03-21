<?php
include("class/class_aspirantes_cursos_dal.php");
if(isset($_POST['rfc']) and isset($_POST['id_curso'])){
   $rfc=  $_POST['rfc'];
   $id_curso=  $_POST['id_curso'];
			$metodos_registro_cursos=new AspiranteCurso_dal;
			$obj_registro_cursos=new AspiranteCurso($id_curso,$rfc);
				
			$cuantosRfc=$metodos_registro_cursos->cuantosRfc($rfc);	
			if ($cuantosRfc>1){	
				$cuantos=$metodos_registro_cursos->borrar_curso($obj_registro_cursos);
			}
			else{
				include("class/class_aspirante_dal.php");
				$cuantos=$metodos_registro_cursos->borrar_curso($obj_registro_cursos);

				$metodos_aspirantes=new aspirantes_dal;
				$obj_aspirantes=new aspirantes($rfc,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
				$cuantos_rfc=$metodos_aspirantes->borra_aspirante($obj_aspirantes);

				if ($cuantos==1 && $cuantos_rfc==1){
					$cuantos=1;
				}
				else{
					$cuantos=-1000;
				}
			} 
      

      echo $cuantos;
}
else{
  echo "no llego correctamente el id, error backend";
}
?>