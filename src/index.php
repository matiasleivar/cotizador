<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotizador</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="jumbotron jumbotron-fluid">
        <div class="container" >
            <div class="row">
                <div class="col-md-12">
                    <form action="Controllers/calcular.php" method="POST">
                        <div class="card-box bg-secondary">
                            <div class="row">
                            
                            
                                 <div class="col-md-2">
                                     <div class="form-group">
                                        <div class="option-group">
                                             <label class="btn btn-primary">
                                                 <input type="radio"  id="options_1" name="options" value="1" onchange="handleChange(this);" autocomplete="off" > Envías
                                                <input type="radio"  id="options_2" name="options" value="2"  onchange="handleChange(this);" autocomplete="off"> Recibes
                                            </label>
                                        </div>
                                     </div>
                                 </div>
                             
                                  <div class="col-md-4">
                                      <div class="form-group"> 
                                          <label for="">Monto a enviar</label>
                                          <input type="number" placeholder="$" id="montoChilenos" name="clp" class="form-control" disabled>
                                      </div>
                                 </div>
                                 <div class="col-md-1 mt-3 text-warning font-weight-bold">
                                      <div class="form-group">
                                          <h5 for=""  style="margin-top: 1.4rem;">CLP</h5>
                                      </div>
                                 </div>
                            </div>
                            <div class="row">
                                  <div class="col-md-4 offset-2">
                                      <div class="form-group">
                                          <label for="">Monto a recibir</label>
                                          <input type="number" placeholder="$" id="montoExtranjeros" name="moneda_extranjera" class="form-control" disabled>
                                      </div>
                                 </div>
                                 <div class="col-md-2  font-weight-bold">
                                      <div class="form-group">
                                          <label for="">Pais de procedencia</label>
                                         <select id="pais" name="pais" class="form-control select">
                                             <option value="1" selected>Colombia</option>
                                             <option value="2">Brasil</option>
                                             <option value="3">Perú</option>
                                         </select>
                                      </div>
                                 </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 offset-2">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block btn-success">
                                            <i class="fas fa-smile"></i>
                                            Cotizar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
            </div>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    function handleChange(checkbox) {
        let inputNacional = document.getElementById('montoChilenos');
        let inputExtranjero = document.getElementById('montoExtranjeros');
        let chkBox1 = document.getElementById('options_1');
        let chkBox2 = document.getElementById('options_2');
        console.log(chkBox1.checked + ' ' + chkBox2.checked);
        if (chkBox1.checked == true) {
            inputNacional.removeAttribute('disabled');
            inputExtranjero.setAttribute('disabled', true);
            return;
        }
        if (chkBox2.checked == true) {
            inputExtranjero.removeAttribute('disabled');
            inputNacional.setAttribute('disabled', true);
            return;
        } else {
            inputExtranjero.setAttribute('disabled', true);
            inputNacional.setAttribute('disabled', true);
            return;
        }
  
}

function onChange(input) {
  input = this;
  this.input.setAttribute('checked');
}
</script>
</body>
</html>