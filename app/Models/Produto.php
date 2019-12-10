<?php

namespace App\Models;
use MF\Model\Model;

class Produto extends Model {
    private $id;
    private $descricao;
    private $estoque;
    private $preco;

    public function __get($atributo) {
		return $this->$atributo;
	}

	public function __set($atributo, $valor) {
		$this->$atributo = $valor;
    }
    
    //Lista de Produtos
    public function getAll() {
        $query = "select id, descricao, estoque, preco from produto";

		$stmt = $this->db->prepare($query);
		$stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    //Salvar
	public function salvar() {

		$query = "insert into produto(descricao, estoque, preco) values (:descricao, :estoque, :preco)";
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':descricao', $this->__get('descricao'));
		$stmt->bindValue(':estoque', $this->__get('estoque'));
		$stmt->bindValue(':preco', $this->__get('preco'));
		$stmt->execute();

		return $this;
	}

}