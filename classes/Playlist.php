<?php

class Playlist
{

    public $id;
    public $nome;
    public $musica_id;
    public $exibir_home;

    public function __construct($id = false)
    {
        if ($id) {
            $this->id = $id;
            $this->carregar();
        }
    }

    public static function listar()
    {
        $query     = "SELECT id, nome, exibir_home FROM playlist WHERE ativo = 1 ORDER BY nome ";
        $conexao   = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista     = $resultado->fetchAll();
        return $lista;
    }

    public function carregar()
    {
        $query   = "SELECT id, nome, exibir_home FROM playlist WHERE id = :id AND ativo = 1";
        $conexao = Conexao::pegarConexao();
        $stmt    = $conexao->prepare($query);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
        $linha = $stmt->fetchAll();
        $this->nome        = $linha['nome'];
        $this->exibir_home = $linha['exibir_home'];
    }

    public function inserir()
    {
        $query = "INSERT INTO playlist (nome, exibir_home) VALUES (:nome, :exibir_home);";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':exibir_home', $this->exibir_home);
        $stmt->execute();
    }

    public function atualizar()
    {
        $query = "UPDATE playlist set nome = :nome, exibir_home = :exibir_home, data_modificado = now() WHERE id = :id";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':exibir_home', $this->exibir_home);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
    }

    public function excluir()
    {
        $query = "UPDATE playlist set ativo = 0, data_modificado = now() WHERE id = :id";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
    }
    
    public function carregarMusica()
    {
        $query = "SELECT  m.nome as nome_musica, p.nome AS nome_playlist, tom, autor, inicio  FROM  playlist AS p INNER JOIN musica AS m WHERE p.id = :id AND ativo = 1";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
    }

    public function inserirMusicaNaPlaylist()
    {
        $query = "INSERT INTO playlist (musica_id, data_modificado) VALUES (:musica_id, now()) WHERE id = :id AND ativo = 1 ";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':musica_id', $this->id);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
    }
    
    public function ordenarPorId($tipo)
    {
        $query = "SELECT * FROM playlist WHERE ativo = 1 ORDER BY :id ";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id', $this->tipo);
        $stmt->execute();


    }
}