<?php
    include('class_catalogo_curso.php');
    include('class_db.php');

    class catalogo_curso_dal extends class_db{
        function __construct(){
            parent::__construct();
        }

        function __destruct(){
            parent::__destruct();
        }

        function datos_por_id($id){
            $id=$this->db_conn->real_escape_string($id);
            $sql="select * from catalogo_curso where ID_CURSO='$id'";
            $this->set_sql($sql);
            $result=mysqli_query($this->db_conn,$this->db_query)
            or die(mysqli_error($this->db_conn));

            $total_cursos=mysqli_num_rows($result);
            $obj_det=null;

            if ($total_cursos==1){
                $renglon=mysqli_fetch_assoc($result);
                $obj_det= new catalogo_curso(
                    $renglon["ID_CURSO"],
                    $renglon["NOMBRE_CURSO"],
                    $renglon["FECHA_ALTA"]
                );

            }
            return $obj_det;
        }

        function obtener_lista_cursos(){
            $sql="select * from catalogo_curso";
            $this->set_sql($sql);
            $rs=mysqli_query($this->db_conn,$this->db_query)
            or die(mysqli_error($this->db_conn));
            $total_cursos=mysqli_num_rows($rs);
            $obj_det=null;
            if ($total_cursos>0){
                $i=0;
                while($renglon = mysqli_fetch_assoc($rs)){
                    $obj_det= new catalogo_curso(
                        $renglon["ID_CURSO"],
                        $renglon["NOMBRE_CURSO"],
                        $renglon["FECHA_ALTA"]
                    );
                    $i++;
                    $lista[$i]=$obj_det;
                    unset($obj_det);
                }
                return $lista;
            }
        }

        function inserta_curso($obj){
            $fecha = date('Y-m-d H:i:s');
            $sql="insert into catalogo_curso(";
            $sql.="NOMBRE_CURSO,";
            $sql.="FECHA_ALTA)";
            $sql.="values(";
            $sql.="'".$obj->getNombre_curso()."',";
            $sql.="'".$fecha."'";
            $sql.=")";

            $this->set_sql($sql);
            $this->db_conn->set_charset('utf8');
            mysqli_query($this->db_conn,$this->db_query)
            or die(mysqli_error($this->db_conn));
            if (mysqli_affected_rows($this->db_conn)==1){
                $insertado=1;
            }
            else{
                $insertado=0;
            }
            unset($obj);
            return $insertado;
        }

        function actualizar_curso($obj){
            $sql="update catalogo_curso set ";
            $sql.="NOMBRE_CURSO="."'".$obj->getNombre_curso()."'";
            $sql.=" where ID_CURSO='".$obj->getID_CURSO()."'";
            
            $this->set_sql($sql);
            $this->db_conn->set_charset('utf8');
            mysqli_query($this->db_conn,$this->db_query)
            or die(mysqli_error($this->db_conn));
            if (mysqli_affected_rows($this->db_conn)==1){
                $actualizado=1;
            }
            else{
                $actualizado=0;
            }
            unset($obj);
            return $actualizado;
        }

        function borrar_curso($id){
            $id=$this->db_conn->real_escape_string($id);
            $sql="delete from catalogo_curso where ID_CURSO='$id'";

            $this->set_sql($sql);
            mysqli_query($this->db_conn,$this->db_query)
            or die(mysqli_error($this->db_conn));
            if (mysqli_affected_rows($this->db_conn)==1){
                $borrado=1;
            }
            else{
                $borrado=0;
            }
            return $borrado;
        }

        function existe_curso($id){
            $id=$this->db_conn->real_escape_string($id);
            $sql="select count(*) from catalogo_curso where ID_CURSO='$id'";
            $this->set_sql($sql);
            $rs=mysqli_query($this->db_conn,$this->db_query)
            or die(mysqli_error($this->db_conn));

            $renglon=mysqli_fetch_array($rs);
            $cuantos=$renglon[0];
            return $cuantos;
        }

    }
?>