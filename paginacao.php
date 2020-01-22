<?php if($totalLista > $qtdPorPaginas): ?>
  <?php 
         ?>
  <nav class="text-center" aria-label="Navegação de página exemplo">
      <ul class="pagination">
        <?php if($paginaAnterior != 0 ):?>
          <li class="page-item"><a class="page-link" href="<?php echo $caminho?>?pagina=<?php echo $paginaAnterior?>">Anterior</a></li>
        <?php else: ?>
          <li class="page-item"><a class="page-link" >Anterior</a></li>
          <?php endif ?>
          <?php for($i = 0; $i < $numPagina; $i++) { ?>
              <li class="page-item"><a class="page-link" href="<?php echo $caminho?>?pagina=<?php echo $i+1?>"><?php echo $i + 1;?></a></li>
              <?php } ?>
        <li class="page-item"><a class="page-link" href="#">Próximo</a></li>
      </ul>
    </nav>
<?endif?>