<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cpf
{
    

    public function validarCpf ($cpf) {


        //apenas números
        $cpf = str_replace("-", "", $cpf);
        $cpf = str_replace(".", "", $cpf);


        //Validando tamanho, se não possui todos repetidos e se possui apenas digitos númericos.
        if (strlen($cpf) != 11 || preg_match('/([0-9])\1{10}/', $cpf) || !ctype_digit($cpf)) {
            return false;
        }
        
        //Equação de validação de CPF
        if( $this->equacao($cpf, 9) && $this->equacao($cpf, 10)) {
            return true;
        }

        return false;
    }

    public function equacao ($cpf, $indice) {

        $base = $indice == 9 ? 10 : 11;

        $soma = 0;
        $count = 0;
        for ($i=$base; $i>=2; $i--) {
            $soma += $i * intval($cpf[$count]);
            $count++;
        }

        $resultado = ($soma * 10);
        $resultado = $resultado % 11;
        
        if ($resultado == $cpf[$indice]) {
            return true;
        }
       
       return false;
    }

}
