<?php
class control{
    private $model;

    public function __construct(){
        require_once "../modelo/userModel.php";
        $this->model=new userModel();
    }

    public function insert_paciente($nom,$ape,$dni,$fech){
        $id=$this->model->insert_paciente($nom,$ape,$dni,$fech);
        return ($id!=false)?header("Location: paciente.php"): header("Location:paciente.php");
    }

    public function index_paciente(){
		return($this->model->index_paciente())? $this->model->index_paciente():false;
	}

    public function eliminar_paciente($id){
        return($this->model->eliminar_paciente($id))? header("Location:paciente.php"):header("Location: paciente.php?id=".$id);
    }

    public function show_paciente($id){
        return ($this->model->show_paciente($id) != false) ? $this->model->show($id) : header("Location:paciente.php");
    }

    public function update_paciente($id,$nom,$ape,$dni,$fech){
        return ($this->model->update_paciente($id,$nom,$ape,$dni,$fech) != false) ? header("Location:paciente.php?id=".$id) : header("Location:paciente.php");
    }

    //
    public function insert_examen($des){
        $id=$this->model->insert_examen($des);
        return($id!=false)?header("Location: examen.php"):header("Location: examen.php");
    }

    public function index_examen(){
        return($this->model->index_examen())? $this->model->index_examen():false;
    }

    public function eliminar_examen($id){
        return($this->model->eliminar_examen($id))? header("Location:examen.php"):header("Location: examen.php?id=".$id);
    }

    public function show_examen($id){
        return ($this->model->show_examen($id) != false) ? $this->model->show($id) : header("Location:examen.php");
    }
    public function update_examen($id,$des){
        return ($this->model->update_examen($id,$des) != false) ? header("Location:examen.php?id=".$id) : header("Location:examen.php");
    }


}


