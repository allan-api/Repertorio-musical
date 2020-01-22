function ordenarPorId(){
    console.log('entrei na funcao');
   
    $.ajax({
        type: 'post',
        url: 'Playlist.php',
        data: {
              geraSenha: "true",
              tamanho: "6",
              maiusculas: "true",
              numeros: "true",
              simbolos: "true"
        } /* ... */
      });
}