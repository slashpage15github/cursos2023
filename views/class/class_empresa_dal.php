<?php
	include('class_empresa.php');
	include('class_db.php');
	class empresa_dal extends class_db{
		function __construct(){
			parent::__construct();
		} 

		function __destruct(){
			parent::__destruct();
		}

		function datos_por_id($id){
			$id=$this->db_conn->real_escape_string($id);
			$sql="select * from empresa where ID_EMPRESA='$id'";
			$this->set_sql($sql);
			$result=mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));
			$total_cursos=mysqli_num_rows($result);
			$obj_det=null;

			if ($total_cursos==1){

				$renglon=mysqli_fetch_assoc($result);
				$obj_det= new empresa($renglon["ID_EMPRESA"],$renglon["NOMBRE_EMPRESA"]);
			}
				return $obj_det;
		}


		function obtener_lista_empresas(){
			$sql="select * from empresa";
			$this->set_sql($sql);
			$rs=mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));
			$total_cursos=mysqli_num_rows($rs);
			$obj_det=null;

			if ($total_cursos>0){
				$i=0;
				while ($renglon = mysqli_fetch_assoc($rs)) {
					$obj_det= new empresa($renglon["ID_EMPRESA"],utf8_encode($renglon["NOMBRE_EMPRESA"]));

					$i++;
					$lista[$i]=$obj_det;
					unset($obj_det);
				}
				return $lista;
			} 		
		}


		//inserta
		function inserta_empresa($obj){
			$sql="insert into empresa(";
			$sql.="NOMBRE_EMPRESA)";
			$sql.=" values(";
			$sql.="'".$obj->getNombreEmpresa()."'";
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


		function actualiza_empresa($obj){
			$sql="update empresa set ";
			$sql.="NOMBRE_EMPRESA="."'".$obj->getNombreEmpresa()."'";
			$sql.=" where ID_EMPRESA='".$obj->getIdEmpresa()."'";

			//echo $sql;exit;
			$this->set_sql($sql);
			$this->db_conn->set_charset("utf8");
			mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));

			if (mysqli_affected_rows($this->db_conn)==1){
				$actualizado=1;
			}
			else{
				$actualizado=0;
			}
			unset($obj);
			return $actualizado;			
		}

		public function existe_empresa($id){
			$id=$this->db_conn->real_escape_string($id);
			$sql="select count(*) from empresa";
			$sql.=" where ID_EMPRESA='$id'";

			$this->set_sql($sql);
			$rs=mysqli_query($this->db_conn,$this->db_query) or 
			die(mysqli_error($this->db_conn));

			$renglon=mysqli_fetch_array($rs);
			$cuantos=$renglon[0];

			return $cuantos;
		}

		public function borra_empresa($id){
			$id=$this->db_conn->real_escape_string($id);
			$sql="delete from empresa where ID_EMPRESA='$id'";
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
	}//end class
?>