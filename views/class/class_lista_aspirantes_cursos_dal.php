<?php
include("class_lista_aspirantes_cursos.php");
include("class_db.php");
class lista_aspirantes_cursos_dal extends class_db{
	
	function __construct()
	{
		parent::__construct();
	}

	function __destruct()
	{
        parent::__destruct();

	}

    //Obtener listado
    function get_datos_lista_aspirantes_cursos(){
       //$nivel=$this->db_conn->real_escape_string($nivel); evitar sql injection

       $elsql ="select a.RFC,a.NOMBRE,a.PATERNO,a.MATERNO,a.ID_EMPRESA,e.NOMBRE_EMPRESA,a.TELEFONO,
a.EMAIL,c.ID_CURSO,c.NOMBRE_CURSO
from aspirantes_cursos ac join 
aspirantes a on ac.rfc=a.rfc
join catalogo_curso c on ac.id_curso=c.id_curso
join empresa e on a.ID_EMPRESA=e.ID_EMPRESA
order by a.rfc";

        //print $elsql;exit;
        $this->set_sql($elsql);
        $lista=NULL;
        $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
        $total_de_aspirantes = mysqli_num_rows($rs);
        $i=0;
        while($renglon = mysqli_fetch_assoc($rs)) {
                   $obj_det = new lista_aspirantes_cursos($renglon["RFC"],utf8_encode($renglon["NOMBRE"]),$renglon["PATERNO"],$renglon["MATERNO"],$renglon["ID_EMPRESA"],$renglon["NOMBRE_EMPRESA"],$renglon["TELEFONO"],$renglon["EMAIL"],$renglon["ID_CURSO"],utf8_encode($renglon["NOMBRE_CURSO"]));
    
  
            $i++;
            $lista[$i]=$obj_det;
            unset($obj_det);
        }
        mysqli_free_result($rs);
        return $lista;
     }


    //Obtener listado
    function get_datos_lista_aspirantes_cursos_rfc_id_curso($rfc,$id_curso){
       $rfc=$this->db_conn->real_escape_string($rfc);
       $id_curso=$this->db_conn->real_escape_string($id_curso);
       $elsql ="select a.RFC,a.NOMBRE,a.PATERNO,a.MATERNO,a.ID_EMPRESA,e.NOMBRE_EMPRESA,a.TELEFONO,
a.EMAIL,c.ID_CURSO,c.NOMBRE_CURSO
from aspirantes_cursos ac join 
aspirantes a on ac.rfc=a.rfc
join catalogo_curso c on ac.id_curso=c.id_curso
join empresa e on a.ID_EMPRESA=e.ID_EMPRESA
where ac.id_curso='$id_curso' and a.rfc='$rfc'";

        //print $elsql;exit;
        $this->set_sql($elsql);
        $lista=NULL;
        $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
        $total_de_aspirantes = mysqli_num_rows($rs);
        $i=0;
        while($renglon = mysqli_fetch_assoc($rs)) {
                   $obj_det = new lista_aspirantes_cursos($renglon["RFC"],utf8_encode($renglon["NOMBRE"]),$renglon["PATERNO"],$renglon["MATERNO"],$renglon["ID_EMPRESA"],$renglon["NOMBRE_EMPRESA"],$renglon["TELEFONO"],$renglon["EMAIL"],$renglon["ID_CURSO"],$renglon["NOMBRE_CURSO"]);
    
  
            $i++;
            $lista[$i]=$obj_det;
            unset($obj_det);
        }
        mysqli_free_result($rs);
        return $lista;
     }

}
?>