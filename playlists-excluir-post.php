<?php require_once "global.php" ?>

<?php
    try {
    $id = $_GET['id'];
    $pl = new Playlist($id);

    $pl->excluir();

    header('Location: playlists.php');
    } catch (Exception $e) {
        Erro::trataErro($e);
    }