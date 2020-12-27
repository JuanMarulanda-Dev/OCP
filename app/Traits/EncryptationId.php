<?php

namespace App\Traits;

use Illuminate\Support\Facades\Crypt;

trait EncryptationId
{
    /**
     * Funcion que recupera el id del modelo y lo encripta
    * @param $value valor del id autonumerico
    * @return string con el valor del id encriptado
    */
    public function getEncidAttribute()
    {
        return Crypt::encrypt($this->attributes['id']);
    }
    
    
}