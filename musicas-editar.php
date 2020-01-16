<?php require_once 'global.php' ?>
<?php
    try {
        $id = $_GET['id'];
        $musica = new Musica($id);
        $listaPlaylist = Playlist::listar();
    } catch (Exception $e) {
        Erro::trataErro($e);
    }
?>
<?php require_once 'cabecalho.php' ?>
<div class="row">
    <div class="col-md-12">
        <h2>Editar Música</h2>
    </div>
</div>

<form action="musicas-editar-post.php" method="post">
<input type="hidden" name="id" value="<?php echo $musica->id ?>">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <label for="nome">Música*</label>
                <input type="text" name="nome" value="<?php echo $musica->nome ?>" class="form-control" placeholder="Nome da música" required maxlength="50">
            </div>
            <div class="form-group">
                <label for="autor">Autor(a)</label>
                <input type="text" name="autor" value="<?php echo $musica->autor ?>" step="0.01" min="0" class="form-control" placeholder="Nome do autor"maxlength="50">
            </div>
            <div class="form-group">
                <label for="tom">Tom*</label>
                <input type="text" name="tom" value="<?php echo $musica->tom ?>" min="0" class="form-control" placeholder="Tom da música" required maxlength="50">
            </div>
            <div class="form-group" >
                    <label for="capotraste">Capotraste </label>
                    
                    <div class="form-check form-check-inline end" >
                    <?php for($i = 0; $i <= 11; $i++): ?>
                        <?php if($i == 0):?>
                            <input style="margin-left: 5px" class="form-check-input" type="radio" name="capotraste" id="inlineRadio1" value="<?php echo $i?>"<?php if($i == $musica->capotraste) echo 'checked="true"';?> >
                            <label class="form-check-label" for="inlineRadio<?php echo $i?>">Nenhuma</label>
                        <?php else:?>
                        <input style="margin-left: 5px" class="form-check-input" type="radio" name="capotraste" id="inlineRadio1" value="<?php echo $i?>"<?php if($i == $musica->capotraste) echo 'checked="true"';?>>
                        <label class="form-check-label" for="inlineRadio<?php echo $i?>"><?php echo $i?>ª casa </label>
                            <?if($i == 2 || $i == 5 || $i == 8 || $i == 11):?>
                                </br>
                            <?php endif ?>
                        <?php endif ?>
                    <?php endfor ?>
                            </br>
                    <div class="d-flex flex-row bd-highlight mb-3">
                </div>
            <div class="form-group">
                <label for="inicio">Frase para lembrar o início da música*</label>
                <input type="text" name="inicio" value="<?php echo $musica->inicio ?>" min="0" class="form-control" placeholder="Letra que começa a música" required maxlength="30" maxlength="50">
            </div>
            <div class="form-group">
                <label for="acordes">4 acordes para lembrar o início da música</label>
                <input type="text" name="acordes" value="<?php echo $musica->acordes ?>" min="0" class="form-control" placeholder="Ex: G D E C" maxlength="50">
            </div>
            <div class="form-group">
                <label for="link">Link da música no CifraClub*</label>
                <input type="text" name="link" value="<?php echo $musica->link ?>" min="0" class="form-control" placeholder="Letra que começa a música" required maxlength="50">
            </div>
           
            <input type="submit" class="btn btn-success btn-block" value="Salvar">
        </div>
    </div>
</form>

<?php require_once 'rodape.php' ?>
