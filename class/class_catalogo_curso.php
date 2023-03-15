<?php
    if (class_exists("catalogo_curso")!=true){
        class catalogo_curso{
            protected $ID_CURSO;
            protected $NOMBRE_CURSO;
            protected $FECHA_ALTA;
        public function __construct($id_curso=NULL,$nombre_curso=NULL,
            $fecha_alta=NULL
        ){
            $this->ID_CURSO=$id_curso;
            $this->NOMBRE_CURSO=$nombre_curso;
            $this->FECHA_ALTA=$fecha_alta;
        }
        
/**
             * Get the value of ID_CURSO
             */ 
            public function getID_CURSO()
            {
                        return $this->ID_CURSO;
            }

            /**
             * Set the value of ID_CURSO
             *
             * @return  self
             */ 
            public function setID_CURSO($ID_CURSO)
            {
                        $this->ID_CURSO = $ID_CURSO;

                        return $this;
            }

              /**
             * Get the value of NOMBRE_CURSO
             */ 
            public function getNOMBRE_CURSO()
            {
                        return $this->NOMBRE_CURSO;
            }

            /**
             * Set the value of NOMBRE_CURSO
             *
             * @return  self
             */ 
            public function setNOMBRE_CURSO($NOMBRE_CURSO)
            {
                        $this->NOMBRE_CURSO = $NOMBRE_CURSO;

                        return $this;
            }

            /**
             * Get the value of FECHA_ALTA
             */ 
            public function getFECHA_ALTA()
            {
                        return $this->FECHA_ALTA;
            }

            /**
             * Set the value of FECHA_ALTA
             *
             * @return  self
             */ 
            public function setFECHA_ALTA($FECHA_ALTA)
            {
                        $this->FECHA_ALTA = $FECHA_ALTA;

                        return $this;
            }
 }//end class
    }//end if 
?>