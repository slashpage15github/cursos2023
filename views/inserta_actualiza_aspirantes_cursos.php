<?php
if(!empty($_POST))  {
require_once 'php/funciones_php.php';
include("class/class_aspirante_dal.php");
include("class/class_aspirantes_cursos_dal.php");

$metodos_aspirantes=new aspirantes_dal;
$metodos_aspirantes_cursos=new AspiranteCurso_dal;

if (isset($_POST["irfc"])) 
  {
    $irfc=strtoupper($_POST["irfc"]);
  }else
    {
    $irfc=null;
    echo "no se recibio post";
    exit;
    }

if (isset($_POST["inombre"])) 
  {
    $inombre=strtoupper($_POST["inombre"]);
  }else
    {
    $inombre=null;
    echo "no se recibio post";
    exit;
    }

if (isset($_POST["ipaterno"])) 
  {
    $ipaterno=strtoupper($_POST["ipaterno"]);
  }else
    {
    $ipaterno=null;
    echo "no se recibio post";
    exit;
    }

if (isset($_POST["imaterno"])) 
  {
    $imaterno=strtoupper($_POST["imaterno"]);
  }else
    {
    $imaterno=null;
    echo "no se recibio post";
    exit;
    }


if (isset($_POST["iempresa"])) 
  {
    $iempresa=strtoupper($_POST["iempresa"]);
  }else
    {
    $iempresa=null;
    echo "no se recibio post";
    exit;
    }


if (isset($_POST["itelefono"])) 
  {
    $itelefono=strtoupper($_POST["itelefono"]);
  }else
    {
    $itelefono=null;
    echo "no se recibio post";
    exit;
    }

if (isset($_POST["iemail"])) 
  {
    $iemail=strtoupper($_POST["iemail"]);
  }else
    {
    $iemail=null;
    echo "no se recibio post";
    exit;
    }

if (isset($_POST["scurso"])) 
  {
    $scurso=strtoupper($_POST["scurso"]);
  }else
    {
    $scurso=null;
    echo "no se recibio post";
    exit;
    }


if (isset($_POST["iid_curso"])) 
  {
    $iid_curso=strtoupper($_POST["iid_curso"]);
  }else
    {
    $iid_curso=null;
    echo "no se recibio post";
    exit;
    }
$errores = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if (!validaRequerido($inombre)) {
      $errores[] = 'El campo nombre de aspirante se recibió vacio.';
   }

  if (!validaRequerido($ipaterno)) {
      $errores[] = 'El campo apellido paterno se recibió vacio.';
   }

  if (!validaRequerido($imaterno)) {
      $errores[] = 'El campo apellido materno se recibió vacio.';
   }

  if (!validaRequerido($iempresa)) {
      $errores[] = 'El campo empresa se recibió vacio.';
   }

  if (!validaRequerido($itelefono) || (strlen($itelefono)!=10)) {
      $errores[] = 'El campo telefono se recibió vacio o no tiene 10 dígitos.';
   }

  if (!validaEmail($iemail) || !validaRequerido($iemail)) {
      $errores[] = 'El campo correo electrónico se recibió vacio o no cumple el formato.';
   }   

  if ($scurso=="0") {
      $errores[] = 'El campo seleccióna curso se recibió vacio.';
   }

   if(!$errores){
//echo $irfc.'-'.$inombre.'-'.$ipaterno.'-'.$imaterno.'-'.$iempresa.'-'.$itelefono.'-'.$iemail.'-'."NULL";exit;

			$obj_aspirantes=new aspirantes($irfc,$inombre,$ipaterno,$imaterno,$iempresa,$itelefono,$iemail,NULL);

      //echo $scurso.'-'.$irfc;exit;
      $obj_aspirantes_cursos=new AspiranteCurso($scurso,$irfc);

if (($obj_aspirantes_cursos->getIdCurso())== $iid_curso){


      if($metodos_aspirantes->actualiza_aspirantes($obj_aspirantes)=="1"){
        echo 'ok'; 
      }else{
        echo 'no-aspirante-cambio';
      } 
}
else //cuando hay que actualizar aspirante y curso 
{
          $result_actual_datos_aspirantes=$metodos_aspirantes->datos_por_rfc($irfc);
              
                $xrfc=$result_actual_datos_aspirantes->getRFC();
                $xnombre=utf8_encode($result_actual_datos_aspirantes->getNOMBRE());
                $xpaterno=utf8_encode($result_actual_datos_aspirantes->getPATERNO());
                $xmaterno=utf8_encode($result_actual_datos_aspirantes->getMATERNO());
                $xempresa=utf8_encode($result_actual_datos_aspirantes->getEMPRESA());
                $xtelefono=$result_actual_datos_aspirantes->getTELEFONO();
                $xemail=$result_actual_datos_aspirantes->getEMAIL();

          

          //echo $xrfc.'-'.$xnombre.'-'.$xpaterno.'-'.$xmaterno.'-'.$xempresa.'-'.$xtelefono.'-',$xemail;

          if ($xnombre!=$inombre || $xpaterno!=$ipaterno || $xmaterno!=$imaterno || $xempresa!=$iempresa || $xtelefono!=$itelefono || $xemail!=$iemail){
            $cambio_en_aspirante=1;
          } 
          else{
            $cambio_en_aspirante=0;
          } 

          if ($cambio_en_aspirante==0){

            if ($metodos_aspirantes_cursos->actualiza_curso($obj_aspirantes_cursos,$iid_curso)=="1"){
              echo 'ok2'; 
            }else{
              echo "fallo-actualiza_curso";
            }

          }
          else if ($cambio_en_aspirante==1){


            if (($metodos_aspirantes_cursos->actualiza_curso($obj_aspirantes_cursos,$iid_curso)==1) and ($metodos_aspirantes->actualiza_aspirantes($obj_aspirantes)==1)){
                echo 'ok3';
            }else{
              print "no-aspirante-curso-cambio";
            }
          }
          else{
              print "fallo-general";
          }

       
}//end $obj_aspirantes_cursos->getId_Curso() == $scurso

/*
			print "<pre>";
			print_r($obj_aspirantes);
      print_r($obj_aspirantes_cursos);

      print ($iid_curso);
      print ($obj_aspirantes_cursos->getId_Curso());
			print "</pre>";
			return;
	*/		

	}
	else{
			echo '<ul style="color: #f00;font-size:25px;">';
      		foreach ($errores as $error):
         	echo '<li>'.$error.'</li>';
      		endforeach;
   			echo '</ul>';
	unset($obj_curso);
  }
}//if ($_SERVER['REQUEST_METHOD'] == 'POST')S
else{
	echo 'No se recibieron datos por el metodo post, vuelva a intentar';
}

} //hay post If(!empty($_POST))
?>