<?php require_once 'global.php' ?>

<?php
    try {
        $id = $_POST['id'];
        $nome = $_POST['nome'];

        $pl = new Playlist($id);
        $pl->nome = $nome;

        $pl->atualizar();

        header('Location: playlists.php');
    } catch (Exception $e) {
        Erro::trataErro($e);
    }

