<?php
    require_once 'global.php';

    try {
        $nome = ucfirst($_POST['nome']);
        $exibir_nome = $_POST['exibir_home'];
        $pl = new Playlist();
        $pl->nome = $nome;
        $pl->exibir_home = $exibir_nome;
        $pl->inserir();

        header('Location: playlists.php');
    } catch (Exception $e) {
        Erro::trataErro($e);
    }