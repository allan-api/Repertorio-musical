<?php
class Ordenar{
    public function __constructor($classe, $tipo, $id){
        $classe = new $classe($id);
        $classe->ordernar($tipo)
        
    }
}