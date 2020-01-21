<?php require_once 'global.php' ?>
<?php
    try {
        $id = $_GET['id'];
        $playlist = new Playlist($id);
    } catch (Exception $e) {
        Erro::trataErro($e);
    }
?>
<?php require_once 'cabecalho.php' ?>
<div class="row">
    <div class="col-md-12">
        <h2>Editar <?php echo ucfirst($playlist->nome)?></h2>
    </div>
</div>
<form action="playlists-editar-post.php" method="post">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <label for="nome">Nome da playlist</label>
                <input type="hidden" name="id" value="<?php echo $playlist->id ?>">
                <input type="text" name="nome" value="<?php echo $playlist->nome ?>" class="form-control" placeholder="Nome da Categoria">
            </div>
            <div class="form-droup">
                <label for="nome">Destacar na Home?</label>
            <div class="form-check form-check-inline end" >
                <input style="margin-left: 5px" class="form-check-input" type="radio" name="exibir_home" id="inlineRadio1" value="1" <?php if($playlist->exibir_nome == 0) echo 'checked="true"'?>>
                <label class="form-check-label" for="sim">Sim</label>
                
                <input style="margin-left: 5px" class="form-check-input" type="radio" name="exibir_home" id="inlineRadio1" value="0" <?php if($playlist->exibir_nome == 0) echo 'checked="true"'?>>
                <label class="form-check-label" for="nao">Não</label>
            </div>
            <br>
            <input type="submit" class="btn btn-success btn-block" value="Salvar">
        </div>
    </div>
    
</form>
<?php require_once 'rodape.php' ?>

