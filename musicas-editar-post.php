<?php
    require_once 'global.php';

    try {

        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $autor = $_POST['autor'];
        $tom = $_POST['tom'];
        $capotraste = $_POST['capotraste'];
        $capotraste == '' ? $capotraste = 0 : $capotraste = $capotraste; 
        $inicio = $_POST['inicio'];
        $acordes = $_POST['acordes'];
        $link = $_POST['link'];

        $musicas = new Musica($id);
        $musicas->nome = $nome;
        $musicas->autor = $autor;
        $musicas->tom = $tom;
        $musicas->capotraste = $capotraste;
        $musicas->inicio = $inicio;
        $musicas->acordes = $acordes;
        $musicas->link = $link;
        $musicas->atualizar();

        header('Location: musicas.php');

    } catch (Exception $e) {
        Erro::trataErro($e);
    }