<?php
if (class_exists('empresa')!=true){
	class empresa{
		protected $id_empresa;
		protected $nombre_empresa;

		public function __construct($id_empresa=NULL,$nombre_empresa=NULL){
			$this->id_empresa=$id_empresa;
			$this->nombre_empresa=$nombre_empresa;
		}//END constructor


	public function getIdEmpresa()
    {
        return $this->id_empresa;
    }

    public function setIdEmpresa($id_empresa)
    {
        $this->id_empresa = $id_empresa;

        return $this;
    }

    
    public function getNombreEmpresa()
    {
        return $this->nombre_empresa;
    }

    
    public function setNombreEmpresa($nombre_empresa)
    {
        $this->nombre_empresa = $nombre_empresa;

        return $this;
    }

	}//end class
}//end void redefinition
?>