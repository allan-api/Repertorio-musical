<?php
    require_once 'global.php';

    try {
        $nome = $_POST['nome'];
        $autor = $_POST['autor'];
        $tom = $_POST['tom'];
        if($valCapotraste == ''){
            $capotraste = $_POST['capotraste'];
        }
        $inicio = $_POST['inicio'];
        $acordes = $_POST['acordes'];
        $link = $_POST['link'];

        $musica = new Musica();

        $musica->nome = $nome;
        $musica->autor = $autor;
        $musica->tom = $tom;
        $musica->capotraste = $capotraste;
        $musica->inicio = $inicio;
        $musica->acordes = $acordes;
        $link->link = $link;
        $musica->inserir();
        header('Location: musicas.php');


    } catch (Exception $e) {
        Erro::trataErro($e);
    }