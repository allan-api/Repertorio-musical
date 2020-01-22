<?php require_once 'global.php' ?>
<?php
    try {
        $lista = Playlist::listar();
    } catch(Exception $e) {
        Erro::trataErro($e);
    }
?>
<?php require_once 'cabecalho.php' ?>
<div class="row">
    <div class="col-md-12">
        <h2>Playlist</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <a href="playlists-criar.php" class="btn btn-info btn-block">Crair Nova Playlist</a>
    </div>
    <div class="row" id="buscar">
        <div class="input-group" id="divBuscar">
            <input type="text" class="form-control" placeholder="Buscar Playlist" />
            <span class="input-group-btn">
                <button type="button" class="btn btn-default">
                    <i class="glyphicon glyphicon-search"></i>
                </button>
            </span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
                <tr>
                <th>Id<span class="glyphicon glyphicon-arrow-down" onclick="ordenarPorId()"></span></th>
                    <th>Nome</th>
                    <th>Exibir na Home</th>
                    <th class="acao">Editar</th>
                    <th class="acao">Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lista as $linha): ?>
                    <tr>
                        <td><?php echo $linha['id']?></td>
                        <td><?php echo $linha['nome']?></td>
                        <td><?php echo $linha['exibir_home']? "Sim" : "Não";?></td>
                        <td><a href="./playlists-editar.php?id=<?php echo $linha['id'] ?>" class="btn btn-info">Editar</a></td>
                        <td><a href="./playlists-excluir-post.php?id=<?php echo $linha['id'] ?>" class="btn btn-danger">Excluir</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once 'rodape.php' ?>
