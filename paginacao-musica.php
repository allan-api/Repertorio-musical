<?php 

$base_url = $_SERVER['REQUEST_URI'];
$arr = explode('?', $base_url);
$caminho = $arr[0];  

$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

$qtdLista = Musica::listar();

$totalLista = count($qtdLista);

$qtdPorPaginas = 2;

$numPagina = ceil($totalLista / $qtdPorPaginas);
$inicio = ($qtdPorPaginas*$pagina) - $qtdPorPaginas;

$lista = Musica::paginar($inicio, $qtdPorPaginas);

$paginaAnterior = $pagina - 1;
$paginaPosterior = $pagina + 1;
