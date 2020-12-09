<?php 

    include ('../Models/Cotizacion.php');

    /**
     *  Verifica cual será el movimiento seleccionado
     *  
     */
    

     if (isset($_POST['clp']) == true and isset($_POST['moneda_extranjera']) == false) {
          $monto = $_POST["clp"];
          $pais = $_POST["pais"];
          $montoDolares = Cotizacion::convertirPesoChilenoADollar($monto); /** 1.- Flujo: Convierte el monto en Dolares */
          $totalMonedaExtranjera = Cotizacion::convertirDollarAMonedaExtranjera($montoDolares, $pais);
            echo '<table>';
            echo '<thead>';
            echo '<th>'.'Resultado'.'</th>';
            echo '<th>'.'Valor'.'</th>';
            echo '</thead>';
            echo '<tbody>';
            echo '<tr>';
            echo '<td>'.$totalMonedaExtranjera.'</td>';
            echo '</tr>';
            echo '</tbody>';
            echo '</table>';
     }

     if (isset($_POST['moneda_extranjera']) == true and isset($_POST['clp']) == false) {
        $monto = $_POST['moneda_extranjera'];   /** 1.- Inicio Flujo: Ingresa monto en divisa extranjera */
        $pais = $_POST["pais"];
        $montoDolares = Cotizacion::convertirMonedaExtranjeraADollar($monto, $pais);
        $montoEnPesosChilenos = Cotizacion::convertirAPesoChileno($montoDolares, $pais);   
        echo '<table class="table table-striped table-bordered table-hover">';
        echo '<thead>';
        echo '<th>'.'Resultado'.'</th>';
        echo '<th>'.'Valor'.'</th>';
        echo '</thead>';
        echo '<tbody>';
        echo '<tr>';
        echo '<td>'.$montoEnPesosChilenos.'</td>';
        echo '</tr>';
        echo '</tbody>';
        echo '</table>';
     }
?>
