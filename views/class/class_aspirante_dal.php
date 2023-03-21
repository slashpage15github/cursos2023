<?php
include('class_aspirante.php');
include('class_db.php');

    class aspirantes_dal extends class_db{

        function __construct(){
            parent::__construct();
        }


        function __destruct(){
            parent::__destruct();
        }

        function datos_por_rfc($rfc){
            $rfc=$this->db_conn->real_escape_string($rfc);
            $sql="select * from aspirantes where RFC='$rfc'";
            $this->set_sql($sql);
            $result=mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));
            $total_cursos=mysqli_num_rows($result);
            $obj_det=null;

 

            if ($total_cursos==1){
                $renglon=mysqli_fetch_assoc($result);
                $obj_det=new aspirantes(
                    $renglon["RFC"],
                    $renglon["NOMBRE"],
                    $renglon["PATERNO"],
                    $renglon["MATERNO"],
                    $renglon["ID_EMPRESA"],
                    $renglon["TELEFONO"],
                    $renglon["EMAIL"],                                            
                    $renglon["FECHA_REGISTRO"]        
                    );

 

            }
            return $obj_det;
        }//end datos_por_id

 


        function obtener_lista_aspirantes(){
            $sql="select * from aspirantes";
            $this->set_sql($sql);
            $rs=mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));
            $total_cursos=mysqli_num_rows($rs);
            $obj_det=null;

 

            if ($total_cursos>0){
                $i=0;
                while ($renglon = mysqli_fetch_assoc($rs)){
                    $obj_det=new aspirantes(
                            $renglon["RFC"],
                             $renglon["NOMBRE"],
                             $renglon["PATERNO"],
                            $renglon["MATERNO"],
                            $renglon["ID_EMPRESA"],
                            $renglon["TELEFONO"],
                            $renglon["EMAIL"],                                            
                            $renglon["FECHA_REGISTRO"]
                        );

 

                    $i++;
                    $lista[$i]=$obj_det;
                    unset($obj_det);

 


                }//end while    
                    return $lista;
            }//end if    
        }//end function    

 

        function existe_aspirante($rfc){
            $rfc=$this->db_conn->real_escape_string($rfc);
            $sql = "select count(*) from aspirantes";
            $sql.=" where RFC='$rfc'";

 

            $this->set_sql($sql);
            $rs=mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));

 

            $renglon=mysqli_fetch_array($rs);
            $cuantos=$renglon[0];

 

            return $cuantos;    
        }

 

        function insertar_aspirante($obj){
            
            $fecha=date("Y-m-d H:i:s");
            $sql="insert into aspirantes(";
            $sql.="RFC,";
            $sql.="NOMBRE,";
            $sql.="PATERNO,";
            $sql.="MATERNO,";
            $sql.="ID_EMPRESA,";
            $sql.="TELEFONO,";
            $sql.="EMAIL,";                                                
            $sql.="FECHA_REGISTRO)";            
            $sql.=" values (";
            $sql.="'".$obj->getRFC()."',";    
            $sql.="'".$obj->getNOMBRE()."',";
            $sql.="'".$obj->getPATERNO()."',";
            $sql.="'".$obj->getMATERNO()."',";
            $sql.="'".$obj->getEMPRESA()."',";
            $sql.="'".$obj->getTELEFONO()."',";
            $sql.="'".$obj->getEMAIL()."',";                                            
            $sql.="'".$fecha."'";
            $sql.=")";

 

            $this->set_sql($sql);
            $this->db_conn->set_charset("utf8");
            mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));
            if(mysqli_affected_rows($this->db_conn)==1){
                $insertado=1;
            }
            else{
                $insertado=0;
            }

 

            unset($obj);
            return $insertado;
        }//end function    

 


        function borra_aspirante($obj){
            $rfc=$this->db_conn->real_escape_string($obj->getRFC());
            $sql="delete from aspirantes where RFC='$rfc'";
            //echo $sql;return;
            $this->set_sql($sql);
            mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));
                if(mysqli_affected_rows($this->db_conn)==1){
                    $borrado=1;
                }
                else{
                    $borrado=0;
                }

 

                unset($obj);
                return $borrado;

 

        }    

 

        function actualiza_aspirantes($obj){
/*
        echo '<pre>';
        echo print_r($obj);
        echo '</pre>';
        exit;
*/
        $sql = "update aspirantes set ";
        $sql .= "NOMBRE="."'".$obj->getNOMBRE()."',";
        $sql .= "PATERNO="."'".$obj->getPATERNO()."',";
        $sql .= "MATERNO="."'".$obj->getMATERNO()."',";
        $sql .= "ID_EMPRESA="."'".$obj->getEMPRESA()."',";
        $sql .= "TELEFONO="."'".$obj->getTELEFONO()."',";
        $sql .= "EMAIL="."'".$obj->getEMAIL()."'";
        $sql .= " where RFC = '".$obj->getRFC()."'";

 

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