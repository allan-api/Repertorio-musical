<?php
    require_once 'global.php';

    try {
        $id = $_GET['id'];
        $musicas = new Musica($id);
        $musicas->excluir();

        header('Location: musicas.php');

    } catch (Exception $e) {
        Erro::trataErro($e);
    }