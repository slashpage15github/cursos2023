<?php
	include('class_aspirantes_cursos.php');
	include('class_db.php');
	class AspiranteCurso_dal extends class_db{
		function __construct(){
			parent::__construct();
		} 

		function __destruct(){
			parent::__destruct();
		}

		function datos_por_idrfc($id,$rfc){
			$id=$this->db_conn->real_escape_string($id);
			$rfc=$this->db_conn->real_escape_string($rfc);			
			$sql="select * from aspirantes_cursos where ID_CURSO='$id' and RFC='$rfc'";
			$this->set_sql($sql);
			$result=mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));
			$total_cursos=mysqli_num_rows($result);
			$obj_det=null;

			if ($total_cursos==1){

				$renglon=mysqli_fetch_assoc($result);
				$obj_det= new AspiranteCurso($renglon["ID_CURSO"],$renglon["RFC"],$renglon["FECHA_REGISTRO"]);
			}
				return $obj_det;
		}


		function obtener_lista_aspirantescursos(){
			$sql="select * from aspirantes_cursos";
			$this->set_sql($sql);
			$rs=mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));
			$total_cursos=mysqli_num_rows($rs);
			$obj_det=null;

			if ($total_cursos>0){
				$i=0;
				while ($renglon = mysqli_fetch_assoc($rs)) {
					$obj_det= new AspiranteCurso($renglon["ID_CURSO"],utf8_encode($renglon["RFC"]),$renglon["FECHA_REGISTRO"]);

					$i++;
					$lista[$i]=$obj_det;
					unset($obj_det);
				}
				return $lista;
			} 		
		}


		//inserta
		function inserta_aspirantecurso($obj){
			$fecha=date("Y-m-d H:i:s");
			$sql="insert into aspirantes_cursos(";
			$sql.="ID_CURSO,";
			$sql.="RFC,";
			$sql.="FECHA_REGISTRO)";
			$sql.=" values(";
			$sql.="'".$obj->getIdCurso()."',";
			$sql.="'".$obj->getRfc()."',";
			$sql.="'".$fecha."'";
			$sql.=")";

			//echo $sql;exit;
			$this->set_sql($sql);
			$this->db_conn->set_charset("utf8");
			mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));

			if (mysqli_affected_rows($this->db_conn)==1){
				$insertado=1;
			}
			else{
				$insertado=0;
			}
			unset($obj);
			return $insertado;
		}



		public function existe_aspirantecurso($id,$rfc){
			$id=$this->db_conn->real_escape_string($id);
			$rfc=$this->db_conn->real_escape_string($rfc);			
			$sql="select count(*) from aspirantes_cursos";
			$sql.=" where ID_CURSO='$id' and RFC='$rfc'";

			$this->set_sql($sql);
			$rs=mysqli_query($this->db_conn,$this->db_query) or 
			die(mysqli_error($this->db_conn));

			$renglon=mysqli_fetch_array($rs);
			$cuantos=$renglon[0];

			return $cuantos;
		}

		public function borra_aspirantecurso($id,$rfc){
			$id=$this->db_conn->real_escape_string($id);
			$rfc=$this->db_conn->real_escape_string($rfc);			
			$sql="delete from aspirantes_cursos where ID_CURSO='$id' and RFC='$rfc'";
			$this->set_sql($sql);
			mysqli_query($this->db_conn,$this->db_query) or die(mysqli_query($this->db_conn));
			if (mysqli_affected_rows($this->db_conn)==1){
				$borrado=1;
			}
			else{
				$borrado=0;
			}
			return $borrado;
		}
	
		function cuantosRfc($rfc){
		        $rfc=$this->db_conn->real_escape_string($rfc);
		        
		        $sql = "select count(*) from aspirantes_cursos";
		        $sql .= " where RFC='$rfc'";

		        //print $sql;
		        $this->set_sql($sql);
		        $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
		        //$total_de_registro = mysqli_num_rows($rs);
		        $renglon= mysqli_fetch_array($rs);
		        $cuantos= $renglon[0];

        return $cuantos;
    }

	function borrar_curso($obj){
        
        $sql = "delete from aspirantes_cursos where RFC='".$obj->getRFC()."' and ID_CURSO='".$obj->getIdCurso()."'";
     
        //print $sql;exit;
        $this->set_sql($sql);
        $this->db_conn->set_charset("utf8");
        
        mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));

        if(mysqli_affected_rows($this->db_conn)==1) {
            $insertado=1;
        }else{
            $insertado=0;
        }
        unset($obj);
        return $insertado;
    }


    function actualiza_curso($obj,$iid_curso){
/*
        echo '<pre>';
        echo print_r($obj);
        echo '</pre>';exit;
*/
        $sql = "update aspirantes_cursos set ";
        $sql .= "ID_CURSO=".$obj->getIdCurso();
        $sql .= " where RFC = '".$obj->getRfc()."' and ID_CURSO=$iid_curso";

       //echo $sql;//exit;
       
        $this->set_sql($sql);
        $this->db_conn->set_charset("utf8");
        
        mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));

        if(mysqli_affected_rows($this->db_conn)==1) {
            $actualizado=1;
        }else{
            $actualizado=0;
        }
        unset($obj);
        return $actualizado;
    }


	}//end class
?>