<?php
    require_once 'global.php';

    try {
        $nome = $_POST['nome'];
        $pl = new Playlist();
        $pl->nome = $nome;
        $pl->inserir();

        header('Location: playlists.php');
    } catch (Exception $e) {
        Erro::trataErro($e);
    }