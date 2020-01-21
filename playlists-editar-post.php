<?php require_once 'global.php' ?>

<?php
    try {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $exibir_home = $_POST['exibir_home'];

        $pl = new Playlist($id);
        $pl->nome = $nome;
        $pl->nome = $exibir_nome;

        $pl->atualizar();

        header('Location: playlists.php');
    } catch (Exception $e) {
        Erro::trataErro($e);
    }

