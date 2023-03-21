<?php
if (class_exists('catalogo_curso')!=true){
	class catalogo_curso{
		protected $id_curso;
		protected $nombre_curso;
		protected $fecha_alta;

		public function __construct($id_curso=NULL,$nombre_curso=NULL,$fecha_alta=NULL){
			$this->id_curso=$id_curso;
			$this->nombre_curso=$nombre_curso;
			$this->fecha_alta=$fecha_alta;
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

    
    public function getNombreCurso()
    {
        return $this->nombre_curso;
    }

    
    public function setNombreCurso($nombre_curso)
    {
        $this->nombre_curso = $nombre_curso;

        return $this;
    }

   
    public function getFechaAlta()
    {
        return $this->fecha_alta;
    }

    
    public function setFechaAlta($fecha_alta)
    {
        $this->fecha_alta = $fecha_alta;

        return $this;
    }		

	}//end class
}//end void redefinition
?>