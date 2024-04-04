<?php
class userModel{
    private $PDO;


    public function __construct(){
        require_once("../conexion/conexion.php");
        $con=new conexion();
		$this->PDO=$con->conexion();
    }

    public function insert_paciente($nom,$ape,$dni,$fech)
    {
        $nom=$_POST["nombres"];
        $ape=$_POST["apellidos"];
        $dni=$_POST["dni"];
        $fech=$_POST["fecha_nacimiento"];
        $statement=$this->PDO->prepare("INSERT INTO paciente VALUES(null,:nombres,:apellidos,:dni,:fecha_nacimiento);");
        $array=array($nom,$ape,$dni,$fech);
        $statement->bindParam(":nombres",$nom);
        $statement->bindParam(":apellidos",$ape);
        $statement->bindParam(":dni",$dni);
        $statement->bindParam(":fecha_nacimiento",$fech);
        return($statement->execute())?$this->PDO->lastInsertId():false;
    }

    public function index_paciente(){
		$statement=$this->PDO->prepare("SELECT*FROM paciente");
		return($statement->execute())?$statement->fetchaLL():false;
	}

    public function eliminar_paciente($id){
        $stament = $this->PDO->prepare("DELETE FROM paciente WHERE idpaciente = :id");
        $stament->bindParam(":id",$id);
        return ($stament->execute()) ? true : false;
    }
    public function show_paciente($id){
        $stament = $this->PDO->prepare("SELECT * FROM paciente where idpaciente = :id limit 1");
        $stament->bindParam(":id",$id);
        return ($stament->execute()) ? $stament->fetch() : false ;
    }
    public function update_paciente($id,$nom,$ape,$dni,$fech){
        $statement = $this->PDO->prepare("UPDATE paciente SET nombres=:nombres,apellidos=:apellidos,dni=:dni,fecha_nacimiento=:fecha_nacimiento WHERE idpaciente = :id");
        $statement->bindParam(":nombres",$nom);
        $statement->bindParam(":apellidos",$ape);
        $statement->bindParam(":dni",$dni);
        $statement->bindParam(":fecha_nacimiento",$fech);
        $statement->bindParam(":id",$id);
        return ($statement->execute()) ? $id : false;
    }


    //examen
    public function insert_examen($des)
    {
        $des=$_POST["descripcion"];
        $statement=$this->PDO->prepare("INSERT INTO examen VALUES(null,:descripcion);");
        
        $statement->bindParam(":descripcion",$des);
        return($statement->execute())?$this->PDO->lastInsertId():false;
    }

    public function index_examen(){
        $stament=$this->PDO->prepare("SELECT*FROM paciente, examen where paciente.idpaciente= examen.idexamen;");
        return($stament->execute())?$stament->fetchaLL():false;
    }

    
    public function eliminar_examen($id){
        $stament = $this->PDO->prepare("DELETE FROM examen WHERE idexamen = :id");
        $stament->bindParam(":id",$id);
        return ($stament->execute()) ? true : false;
    }
    public function show_examen($id){
        $stament = $this->PDO->prepare("SELECT * FROM examen where idexamen= :id limit 1");
        $stament->bindParam(":id",$id);
        return ($stament->execute()) ? $stament->fetch() : false ;
    }
    public function update_examen($id,$des){
        $statement = $this->PDO->prepare("UPDATE examen SET descripcion=:descripcion WHERE idexamen = :id");
        $statement->bindParam(":descripcion",$des);
        $statement->bindParam(":id",$id);
        return ($statement->execute()) ? $id : false;
    }

   
}