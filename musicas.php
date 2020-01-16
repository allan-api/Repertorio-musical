<?php require_once 'global.php' ?>
<?php
    try {
        $lista = Musica::listar();
    } catch (Exception $e) {
        Erro::trataErro($e);
    }
?>
<?php require_once 'cabecalho.php' ?>
<div class="row">
    <div class="col-md-12">
        <h2>Músicas</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <a href="musicas-criar.php" class="btn btn-info btn-block">Inserir Nova Música</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?php if (count($lista) > 0): ?>
            <table class="table">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Tom</th>
                    <th>Capotraste</th>
                    <th>Inicio</th>
                    <th>Acordes</th>
                    <th class="acao">Editar</th>
                    <th class="acao">Excluir</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista as $linha): ?>
                    <tr>
                        <td>
                            <a href="http://<?php echo $linha['link']?>" target="_blank">
                            <?php echo ucwords($linha['nome'])?>
                            </a>
                        </td>
                        <td><?php echo ucwords($linha['tom'])?></td>
                        <td><?php echo $linha['capotraste']?>ª casa</td>
                        <td><?php echo ucfirst($linha['inicio'])?></td>
                        <td><?php echo ucwords($linha['acordes'])?></td>
                        <td><a href="./musicas-editar.php?id=<?php echo $linha['id'] ?>" class="btn btn-info">Editar</a></td>
                        <td><a href="./musicas-excluir-post.php?id=<?php echo $linha['id'] ?>" class="btn btn-danger">Excluir</a></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhuma música cadastrada</p>
        <?php endif ?>
    </div>
</div>
<?php require_once 'rodape.php' ?>
