<?php require_once 'global.php' ?>
<?php
    try {
        $listaPlaylist = Playlist::listar();
    } catch (Exception $e) {
        Erro::trataErro($e);
    }
?>
<?php require_once 'cabecalho.php' ?>
<div class="row">
    <div class="col-md-12">
        <h2>Adicionar Nova Música</h2>
    </div>
</div>
    <form action="musicas-criar-post.php" method="post">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    <label for="nome">Música*</label>
                    <input type="text" name="nome" class="form-control" placeholder="Ex: Há um lugar" required maxlength="50">
                </div>
                <div class="form-group">
                    <label for="autor">Autor(a)</label>
                    <input type="text" name="autor"  min="0" class="form-control" placeholder="Ex: Heloisa Rosa" maxlength="50">
                </div>
                <div class="form-group">
                    <label for="tom">Tom*</label>
                    <input type="text" name="tom" step="0.01" min="0" class="form-control" placeholder="Ex: G " required maxlength="50">
                </div>
                <div class="form-group" >
                    <label for="capotraste">Capotraste</label>
                    
                    <!-- radio -->
                        
                    <div class="form-check form-check-inline end" >
                        
                    <?php for($i = 0; $i <= 11; $i++): ?>
                        <?php if($i == 0):?>
                            <input style="margin-left: 5px" class="form-check-input" type="radio" name="capotraste" id="inlineRadio1" value="<?php echo $i?>">
                            <label class="form-check-label" for="inlineRadio<?php echo $i?>">Nenhuma</label>
                        <?php else:?>
                        <input style="margin-left: 5px" class="form-check-input" type="radio" name="capotraste" id="inlineRadio1" value="<?php echo $i?>">
                        <label class="form-check-label" for="inlineRadio<?php echo $i?>"><?php echo $i?>ª casa </label>
                            <?if($i == 2 || $i == 5 || $i == 8 || $i == 11):?>
                                </br>
                            <?php endif ?>
                        <?php endif ?>
                    <?php endfor ?>
                            </br>
                        </div>
                    <div class="d-flex flex-row bd-highlight mb-3">
                </div>
                        
                <div class="form-group">
                    <label for="inicio">Frase para lembrar início da música*</label>
                    <input type="text" name="inicio"  min="0" class="form-control" placeholder="Ex: Há um lugar de descanso em Ti" required maxlength="50">
                </div>
                <div class="form-group">
                    <label for="acordes">4 acordes para lembrar início da música</label>
                    <input type="text" name="acordes"  min="0" class="form-control" placeholder="Ex: G D E C" maxlength="50">
                </div>
                <div class="form-group">
                    <label for="link">Link da música no CifraClub*</label>
                    <input type="text" name="link"  min="0" class="form-control" placeholder="Ex: www.cifraclub.com/musicas/ha-um-lugar-de-descanso-em-ti" required maxlength="50">
                </div>
                

                <!--<div class="form-group">
                    <label for="nome">Categoria do Produto</label>

                     <?php $contador = 0;?>
                    <?php foreach ($listaPlaylist as $linha){ ?>
                        
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="playlistId<?php echo $linha['id'] ?>" value="option<?php echo $contador?>">
                            <label class="form-check-label" for="playlistId<?php echo $linha['id'] ?>">
                            <?php echo $linha['nome']?>
                            </label>
                        </div>
                    <?php
                        $contador++;
                    }
                     ?> -->
                </div>
                <input type="submit" class="btn btn-success btn-block" value="Salvar">
            </div>
        </div>
    </form>
<?php require_once 'rodape.php' ?>
