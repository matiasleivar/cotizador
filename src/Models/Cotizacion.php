<?php 

class Cotizacion {

    var $montoChilenos;
    var $montoDolares;
    var $montoExtranjera;
    var $spread;
    var $margen;
    var $pais;

    function __construct($montoChilenos, $montoDolares, $montoExtranjera, $spread, $margen, $pais)
    {
        $this->montoChilenos = $montoChilenos;
        $this->montoDolares = $montoDolares;
        $this->montoExtranjera = $montoExtranjera;
        $this->spread = $spread;
        $this->margen = $margen;
        $this->pais = $pais;
    } 

    /**
     * Recibe un $monto y un $pais
     * @param int $monto
     * @param int $pais 
     * @return float $montoDolares
     */
    static function convertirMonedaExtranjeraADollar(int $monedaExtranjera, int $pais)
    {
        switch ($pais) {
            case 1:
                 $valUsd = 0.00027;
                 $montoDolares = $monedaExtranjera * $valUsd;
                 $montoDolares = $montoDolares *100;
                 $spread = $montoDolares * 0.0180;
                 $montoDolares = $montoDolares + $spread;
                 return $montoDolares;
                break;
            case 2: 
                $valUsd = 0.19;
                $montoDolares = $monedaExtranjera * $valUsd;
                $spread = $montoDolares * 0.0120;
                $montoDolares = $montoDolares + $spread;
                return $montoDolares;
                break;
            case 3: 
                $valUsd = 0.28;
                $montoDolares = $monedaExtranjera * $valUsd;
                $spread = $montoDolares * 0.0150;
                $montoDolares = $montoDolares + $spread;
                return $montoDolares;
                break;
            
            default:                
            break;
        }
    }
    /**
     * Recibe monto en USD, y un país
     * @param float $montoDolares
     * @param int $pais
     * @return float $totalMonedaExtranjera
     */
    static function convertirDollarAMonedaExtranjera(float $montoDolares, int $pais)
    {
        switch ($pais) {
            case 1:
                $valUsd =  0.00027; /** 1 COP = 0.00027 usd */
                $pesoColombiano = $montoDolares / $valUsd;
                $totalMonedaExtranjera = $pesoColombiano;
                $totalMonedaExtranjera = round($totalMonedaExtranjera,0, PHP_ROUND_HALF_UP);
                $totalMonedaExtranjera = number_format($totalMonedaExtranjera, 0, '.', ',');
                return $totalMonedaExtranjera;
                break;
            case 2:
                $valUsd = 0.19;
                $realBrasilero = $montoDolares / $valUsd;
                $totalMonedaExtranjera = $realBrasilero;
                $totalMonedaExtranjera = round($totalMonedaExtranjera,0, PHP_ROUND_HALF_UP);
                $totalMonedaExtranjera = number_format($totalMonedaExtranjera, 0, '.', ',');
                return $totalMonedaExtranjera;
            case 3:
                $valUsd = 0.28;
                $solPeruano = $montoDolares / $valUsd;
                $totalMonedaExtranjera = $solPeruano;
                $totalMonedaExtranjera = round($totalMonedaExtranjera,0, PHP_ROUND_HALF_UP);
                $totalMonedaExtranjera = number_format($totalMonedaExtranjera, 0, '.', ',');
                return $totalMonedaExtranjera;
            default:
                # code...
                break;
        }
    }

    /**
     * Recibe un $monto en CLP
     * Retorna $montoDolares en USD
     * @param int $monto
     * @return float $montoDolares
     */
    static function convertirPesoChilenoADollar($monto)
    {
        $valUsd = 757;
        $montoDolares = $monto / $valUsd;
        $spread = round($montoDolares * 0.004);
        $montoDolares = $montoDolares - $spread;
        return $montoDolares;
    }
    /**
     * Recibe un monto en USD, y un país.
     * Retorna monto en pesos Chilenos CLP
     * @param float $montoDolares
     * @param int $pais
     * @return int $montoEnPesosChilenos
     */
    static function convertirAPesoChileno($montoDolares, $pais)
    {        
        switch ($pais) {
            case 1:
                $dolar = 757;
                $montoEnPesosChilenos = $montoDolares * $dolar;
                $montoEnPesosChilenos = round($montoEnPesosChilenos);          
                $spread = round($montoEnPesosChilenos * 0.004);
                $montoEnPesosChilenos = $montoEnPesosChilenos + $spread;
                $margen = $montoEnPesosChilenos * 0.035;
                echo $margen;
                $montoEnPesosChilenos = $montoEnPesosChilenos + $margen;
                $montoEnPesosChilenos = number_format($montoEnPesosChilenos, 0, ',', '.');
               
                break;
            case 2: 
                $dolar = 757;
                $montoEnPesosChilenos = $montoDolares * $dolar;
                $montoEnPesosChilenos = round($montoEnPesosChilenos);          
                $spread = round($montoEnPesosChilenos * 0.004);
                $montoEnPesosChilenos = $montoEnPesosChilenos + $spread;
                $margen = $montoEnPesosChilenos * 0.029;
                $montoEnPesosChilenos = $montoEnPesosChilenos + $margen;
                $montoEnPesosChilenos = number_format($montoEnPesosChilenos, 0, ',', '.');
            
                break;
            case 3:
                $dolar = 757;
                $montoEnPesosChilenos = $montoDolares * $dolar;
                $montoEnPesosChilenos = round($montoEnPesosChilenos);          
                $spread = round($montoEnPesosChilenos * 0.004);
                $montoEnPesosChilenos = $montoEnPesosChilenos + $spread; 
                $margen = $montoEnPesosChilenos * 0.030;
                $montoEnPesosChilenos = $montoEnPesosChilenos + $margen;
                $montoEnPesosChilenos = number_format($montoEnPesosChilenos, 0, ',', '.');                
                return $montoEnPesosChilenos;
                break;
            default:

                break;
        }

        
    }

}


?>