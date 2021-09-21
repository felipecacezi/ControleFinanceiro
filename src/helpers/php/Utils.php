<?php

class Utils {


    public function transformaCentavosReais(int $centavos = null)
    {
        $return = new stdClass();

        if(!isset($centavos) || empty($centavos)){            
            return 0;
        }

        $reais = (int) $centavos / 100;
        
        return $reais;

    }

    public function transformaReaisCentavos($reais = null)
    {

        $array = new stdClass();

        if(!isset($reais) || empty($reais)){
            
            return 0;

        } else {

            $aux1 = str_replace(".", "", $reais);
            $aux2 = str_replace(",", ".", $aux1);
            $centavos = (float) $aux2 * 100;
            
            return $centavos;

        }

    }

    public function formataMoedaBr(int $reais = null)
    {

        return number_format($reais, 2, ',', '.');
        
    }

}