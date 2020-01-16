<?php require_once 'global.php' ?>
<?php
    try {
        $id = $_GET['id'];
        $playlist = new Playlist($id);
        $playlist->carregarMusica();
        print_r($playlist); exit;
    } catch (Exception $e) {
        Erro::trataErro($e);
    }
?>
<?php require_once 'cabecalho.php' ?>
<div class="row">
    <div class="col-md-12">
        <h2>Detalhe da Playlist</h2>
    </div>
</div>

<dl>
    <dt>ID</dt>
    <dd><?php echo $playlist->id ?></dd>
    <dt>Nome</dt>
    <dd><?php echo $playlist->nome ?></dd>
    <dt>Músicas</dt>
    <?php if (count($playlist) > 0): ?>
        <dd>
            <ul>
                <?php foreach($playlist as $linha): ?>
                    <li><a href="./musicas-editar.php?id=<?php echo $linha['id'] ?>"><?php echo $linha['nome'] ?></a></li>
                <?php endforeach ?>
            </ul>
        </dd>
    <?php else: ?>
        <dd>Não existem musicas para esta categoria</dd>
    <?php endif ?>
</dl>
<?php require_once 'rodape.php' ?>
