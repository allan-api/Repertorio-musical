<?php require_once 'cabecalho.php' ?>

<div class="row">
    <div class="col-md-12">
        <h2>Criar Nova Playlist</h2>
    </div>
</div>

<form action="playlists-criar-post.php" method="post">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <label for="nome">Nome da Playlist</label>
                <input name="nome" type="text" class="form-control" placeholder="Nome da playlist">
            </div>
            <div class="form-droup">
                <label for="home">Destacar na Home?</label>
                <div class="form-check form-check-inline end" >
                    <input style="margin-left: 5px" class="form-check-input" type="radio" name="exibir_home" id="exibir_home1" value="1">
                    <label class="form-check-label" for="sim">Sim</label>
                    
                    <input style="margin-left: 5px" class="form-check-input" type="radio" name="exibir_home" id="exibir_home0" value="0">
                    <label class="form-check-label" for="nao">Não</label>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <input type="submit" class="btn btn-success btn-block" value="Salvar">
            </div>
        </div>
    </form>
        
<?php require 'rodape.php' ?>
