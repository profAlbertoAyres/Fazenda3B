<?php

class Lote extends CRUD{
    protected $table = "lote";
    private $id;
    private $descricao;

    public function setId($id){
        $this->id = $id;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function getId(){
        return $this->id;
    }

    public function getDescricao(){
        return $this->descricao;
    }
    public function add() {
        $sql = "INSERT INTO $this->table (descricao) VALUES (:descricao)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":descricao", $this->descricao, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function update(string $campo, int $id) {
        $sql = "UPDATE $this->table SET descricao=:descricao WHERE $campo=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":descricao", $this->descricao, PDO::PARAM_STR);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}