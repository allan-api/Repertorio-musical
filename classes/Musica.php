<?php

class Musica
{
    public $id;
    public $nome;
    public $autor;
    public $tom;
    public $capotraste;
    public $inicio;
    public $acordes;
    public $link;

    public function __construct($id = false)
    {
        if ($id) {
            $this->id = $id;
            $this->carregar();
        }
    }

    public function carregar()
    {
        $query = "SELECT nome, autor, tom, capotraste, inicio, acordes, link FROM musica WHERE id = :id";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
        $linha = $stmt->fetch();
        $this->nome = $linha['nome'];
        $this->autor = $linha['autor'];
        $this->tom = $linha['tom'];
        $this->capotraste = $linha['capotraste'];
        $this->inicio = $linha['inicio'];
        $this->acordes = $linha['acordes'];
        $this->link = $linha['link'];
    }

    public static function listar()
    {
        $query = "SELECT id, nome, autor, tom, inicio, capotraste, acordes, link
                  FROM musica
                  ORDER BY nome ";
        $conexao = Conexao::pegarConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    // public static function listarPorPlaylist($playlist_id)
    // {
    //     $query = "SELECT id, nome, autor, tom, ininio, capotraste FROM musica WHERE playlist_id = :playlist_id";
    //     $conexao = Conexao::pegarConexao();
    //     $stmt = $conexao->prepare($query);
    //     $stmt->bindValue(':playlist_id', $playlist_id);
    //     $stmt->execute();
    //     return $stmt->fetchAll();
    // }

    public function inserir()
    {
        $query = "INSERT INTO musica (nome, autor, tom, inicio, capotraste, acordes, link)
                  VALUES (:nome, :autor, :tom, :inicio, :capotraste, :acordes, :link)";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':autor', $this->autor);
        $stmt->bindValue(':tom', $this->tom);
        $stmt->bindValue(':inicio', $this->inicio);
        $stmt->bindValue(':capotraste', $this->capotraste);
        $stmt->bindValue(':acordes', $this->acordes);
        $stmt->bindValue(':link', $this->link);
        $stmt->execute();
    }

    public function atualizar()
    {
        $query = "UPDATE musica SET nome = :nome, tom = :tom, inicio = :inicio, capotraste = :capotraste, acordes = :acordes, link = :link  WHERE id = :id";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $this->nome);
        $stmt->bindValue(':tom', $this->tom);
        $stmt->bindValue(':inicio', $this->inicio);
        $stmt->bindValue(':capotraste', $this->capotraste);
        $stmt->bindValue(':acordes', $this->acordes);
        $stmt->bindValue(':link', $this->link);
        $stmt->bindValue(':id', $this->id);
        $stmt->execute();
    }

    public function excluir()
    {
        $query = "UPDATE playlist SET musica_id = NULL WHERE musica_id = :id;
        DELETE FROM musica WHERE id = :id";
        $conexao = Conexao::pegarConexao();
        $stmt = $conexao->prepare($query);
        $stmt->bindValue('id', $this->id);
        $stmt->execute();
    }
}