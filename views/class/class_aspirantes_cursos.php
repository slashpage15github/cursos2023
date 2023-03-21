<?php
if (class_exists('AspiranteCurso')!=true){
	class AspiranteCurso{
		protected $id_curso;
		protected $rfc;
		protected $fecha_registro;

		public function __construct($id_curso=NULL,$rfc=NULL,$fecha_registro=NULL){
			$this->id_curso=$id_curso;
			$this->rfc=$rfc;
			$this->fecha_registro=$fecha_registro;
		}//END constructor


	public function getIdCurso()
    {
        return $this->id_curso;
    }

    public function setIdCurso($id_curso)
    {
        $this->id_curso = $id_curso;

        return $this;
    }

    
    public function getRfc()
    {
        return $this->rfc;
    }

    
    public function setRfc($rfc)
    {
        $this->rfc = $rfc;

        return $this;
    }

   
    public function getFechaRegistro()
    {
        return $this->fecha_registro;
    }

    
    public function setFechaRegistro($fecha_registro)
    {
        $this->fecha_alta = $fecha_registro;

        return $this;
    }		

	}//end class
}//end void redefinition
?>