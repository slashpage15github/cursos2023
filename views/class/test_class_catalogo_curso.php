<?php
	include('class_catalogo_curso_dal.php');
	$obj_curso=new catalogo_curso_dal;
	$resultado=$obj_curso->datos_por_id(2);
	if ($resultado==null){
		echo  "no  existe el curso";
	}
	else{
		echo  '<pre>';
		print_r($resultado);
		echo '</pre>';
	}



	$resultado2=$obj_curso->obtener_lista_cursos();
	if ($resultado2==null){
		echo '<br/>NO hay lista';
	}
	else{
		echo  '<pre>';
		print_r($resultado2);
		echo '</pre>';
	}


	//insertado
	$obj_det= new catalogo_curso(null,"CONTANIMACIÓN AMBIENTAL",null);
	$flag_ins=$obj_curso->inserta_curso($obj_det);
	if ($flag_ins==1){
		echo "<br>Curso insertado correctamente";
	}
	else{
		echo "<br>Curso no agregado, vuelva intentar";
	}

	//upDATE
	$obj_det= new catalogo_curso(3,"PLANTAS MEDICINALES",null);
	$flag_upd=$obj_curso->actualiza_curso($obj_det);
	if ($flag_upd==1){
		echo "<br>Curso actualizado correctamente";
	}
	else{
		echo "<br>Curso no actualizado, vuelva intentar";
	}

//existe

	$cuantos=$obj_curso->existe_curso(1);
	print "<br>REcord count:".$cuantos;

//borrado
	print "<br><br>";
	$borrado=$obj_curso->borra_curso(100);
	if ($borrado==1){
		print "registro borrado ok";
	}	
	else{
		print "registro NOOO borrado";
	}

?>
