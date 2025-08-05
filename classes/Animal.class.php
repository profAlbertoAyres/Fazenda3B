<?php

class Animal extends CRUD{

    protected $table = 'animal';
    private $id;
    private $identificador;
    private $dataNascimento;
    private $sexo;
    private $idRaca;
    private $idMae;
    private $idLote;

    #Métodos Gets
    public function getId(){
        return $this->id;
    }

    public function getIdentificador(){
        return $this->identificador;
    }

    public function getDataNascimento(){
        return $this->dataNascimento;
    }
    public function getSexo(){
        return $this->sexo;
    }
    public function getIdRaca(){
        return $this->idRaca;
    }
    public function getIdMae(){
        return $this->idMae;
    }
    public function getIdLote(){
        return $this->idLote;
    }

    #Métodos Sets
    public function setId($id){
        $this->id = $id;
    }

    public function setIdentificador( $identificador){
        $this->identificador = $identificador;
    }

    public function setDataNascimento($dataNascimento){
        $this->dataNascimento = $dataNascimento;
    }
    public function setSexo($sexo){
        $this->sexo = $sexo;
    }
    public function setIdRaca($idRaca){
        $this->idRaca = $idRaca;
    }
    public function setIdMae($idMae){
        $this->idMae = $idMae;
    }
    public function setIdLote($idLote){
        $this->idLote = $idLote;
    } 

    public function add(){
        $sql = "INSERT INTO {$this->table}(identificador, data_nascimento, sexo, id_raca, id_mae, id_lote) VALUES(:identificador, :data_nascimento, :sexo, :id_raca, :id_mae, :id_lote)";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":identificador", $this->identificador);
        $stmt->bindParam(":data_nascimento", $this->dataNascimento);
        $stmt->bindParam(":sexo", $this->sexo);
        $stmt->bindParam(":id_raca", $this->idRaca, PDO::PARAM_INT);
        $stmt->bindParam(":id_mae", $this->idMae,PDO::PARAM_INT);
        $stmt->bindParam(":id_lote", $this->idLote,PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function update(string $campo, int $id){
        $sql = "UPDATE {$this->table} SET identificador = :identificador, data_nascimento = :data_nascimento, sexo = :sexo, id_raca = :id_raca, id_mae = :id_mae, id_lote = :id_lote where {$campo} = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":identificador", $this->identificador);
        $stmt->bindParam(":data_nascimento", $this->dataNascimento);
        $stmt->bindParam(":sexo", $this->sexo);
        $stmt->bindParam(":id_raca", $this->idRaca, PDO::PARAM_INT);
        $stmt->bindParam(":id_mae", $this->idMae,PDO::PARAM_INT);
        $stmt->bindParam(":id_lote", $this->idLote,PDO::PARAM_INT);
        $stmt->bindParam(":id", $id,PDO::PARAM_INT);
        return $stmt->execute();
    }
}




