<?php
    if (class_exists('aspirantes')!=true){
        class aspirantes{
            protected $RFC;
            protected $NOMBRE;
            protected $PATERNO;
            protected $MATERNO;
            protected $EMPRESA;
            protected $TELEFONO;
            protected $EMAIL;
            protected $FECHA_REGISTRO;

        public function __construct(
             $RFC=NULL,
             $NOMBRE=NULL,
             $PATERNO=NULL,
             $MATERNO=NULL,
             $EMPRESA=NULL,
             $TELEFONO=NULL,
             $EMAIL=NULL,
             $FECHA_REGISTRO=NULL           
            ){
                    $this->RFC=$RFC;
                    $this->NOMBRE=$NOMBRE;
                    $this->PATERNO=$PATERNO;
                    $this->MATERNO=$MATERNO;
                    $this->EMPRESA=$EMPRESA;
                    $this->TELEFONO=$TELEFONO;
                    $this->EMAIL=$EMAIL;
                    $this->FECHA_REGISTRO=$FECHA_REGISTRO;                          
            }//END CONSTRUCTOR
                

    
    public function getRFC()
    {
        return $this->RFC;
    }

    
    public function setRFC($RFC)
    {
        $this->RFC = $RFC;

        return $this;
    }

    
    public function getNOMBRE()
    {
        return $this->NOMBRE;
    }

    
    public function setNOMBRE($NOMBRE)
    {
        $this->NOMBRE = $NOMBRE;

        return $this;
    }

    
    public function getPATERNO()
    {
        return $this->PATERNO;
    }

    
    public function setPATERNO($PATERNO)
    {
        $this->PATERNO = $PATERNO;

        return $this;
    }

    
    public function getMATERNO()
    {
        return $this->MATERNO;
    }

   
    public function setMATERNO($MATERNO)
    {
        $this->MATERNO = $MATERNO;

        return $this;
    }

    
    public function getEMPRESA()
    {
        return $this->EMPRESA;
    }

   
    public function setEMPRESA($EMPRESA)
    {
        $this->EMPRESA = $EMPRESA;

        return $this;
    }

    
    public function getTELEFONO()
    {
        return $this->TELEFONO;
    }

    
    public function setTELEFONO($TELEFONO)
    {
        $this->TELEFONO = $TELEFONO;

        return $this;
    }

    
    public function getEMAIL()
    {
        return $this->EMAIL;
    }

    
    public function setEMAIL($EMAIL)
    {
        $this->EMAIL = $EMAIL;

        return $this;
    }

   
    public function getFECHAREGISTRO()
    {
        return $this->FECHA_REGISTRO;
    }

    
    public function setFECHAREGISTRO($FECHA_REGISTRO)
    {
        $this->FECHA_REGISTRO = $FECHA_REGISTRO;

        return $this;
    }
  }//end class    
}//end exists
?>