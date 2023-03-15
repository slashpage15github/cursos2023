<?php
    include("class_catalogo_curso_dal.php");
    $obj_curso= new catalogo_curso_dal;
    $resultado= $obj_curso->datos_por_id(1);
    if ($resultado==null){
        echo "no se econtró registro";
    }
    else{
        echo '<pre>';
        print_r($resultado);
        echo '</pre>';
    }


    $resultado2= $obj_curso->obtener_lista_cursos();
    if ($resultado2==null){
        echo "no se econtró registro";
    }
    else{
        echo '<pre>';
        print_r($resultado2);
        echo '</pre>';
    }

    /*insertado*/
    $obj_ins= new catalogo_curso(null,"RUBY",NULL);
    $result_ins=$obj_curso->inserta_curso($obj_ins);
    if ($result_ins==1){
        echo "curso insertado correctamente";
    }
    else{
        echo "no se inserto curso, vuela intentar 100 veces";
    }

    echo '<br>';
    /*update*/
    $obj_upd= new catalogo_curso(4,"RUBY 22",NULL);
    $result_upd=$obj_curso->actualizar_curso($obj_upd);
    if ($result_upd==1){
        echo "curso actualizado correctamente";
    }
    else{
        echo "no se actualizo curso, vuela intentar 200 veces";
    }
    
    echo '<br>';
    /*borrado*/
    $result_del=$obj_curso->borrar_curso(5);
    if ($result_del==1){
        echo "curso borrado correctamente";
    }
    else{
        echo "no se borro curso, vuela intentar 200 veces";
    }

    /*existe curso*/
    echo '<br>';
    $result_exis=$obj_curso->existe_curso(3);
    if ($result_exis==1){
        echo "curso si existe";
    }
    else{
        echo "curso no existe";
    } 


?>