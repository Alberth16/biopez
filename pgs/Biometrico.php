<?php 
    include "../incl/EstadoUser.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biometrico</title>
    <?php include "../incl/links.php"?>
</head>
<body class="cuerpo">
<<<<<<< HEAD
    <div class="oculto">
        <?php include "../incl/header.php"?>
    </div>
=======
<<<<<<< HEAD
    <div class="oculto">
        <?php include "../incl/header.php"?>
    </div>
=======
    
>>>>>>> 46c3a551dce152eaba9b556b8c12d0f590e58ca1
>>>>>>> 77ada48a42f540a3402ade30cfd3619cf2f4a52e
    <div class="container">
        <h3>Biometrico</h3>
        <div class="form">

<<<<<<< HEAD
            <div class="txts">
                <label for="">No. Muestra:</label>
                <input 
                    type="text"
                    class="Txt100"
                    id="txt_Bio_NoMuestra"
                    max="100"
                    min="1"
                    name="pMuestra"
                    value="0"
                    required
                    disabled
                />
            </div>

            <div class="txts">
                <label for="">Numero de Tanque:</label>
                <select class="select_" id="No_Tanque">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>

            <div class="txts">
                <label for="">Especie:</label>
=======
            <div class="txts">
                <label for="">No. Muestra:</label>
>>>>>>> 77ada48a42f540a3402ade30cfd3619cf2f4a52e
                <input 
                    type="text"
                    class="Txt100"
                    id="txt_Bio_NoMuestra"
                    max="100"
                    min="1"
                    name="pMuestra"
<<<<<<< HEAD
                    value="Tilapia"
=======
                    value="0"
>>>>>>> 77ada48a42f540a3402ade30cfd3619cf2f4a52e
                    required
                    disabled
                />
            </div>

            <div class="txts">
<<<<<<< HEAD
                <label for="pMuestra">% Muestra:</label>
                <input 
=======
                <label for="">Numero de Tanque:</label>
                <select class="select_" id="No_Tanque">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>

            <div class="txts">
                <label for="">Especie:</label>
                <input 
                    type="text"
                    class="Txt100"
                    id="txt_Bio_NoMuestra"
                    max="100"
                    min="1"
                    name="pMuestra"
                    value="Tilapia"
                    required
                    disabled
                />
            </div>

            <div class="txts">
                <label for="pMuestra">% Muestra:</label>
                <input 
>>>>>>> 77ada48a42f540a3402ade30cfd3619cf2f4a52e
                    type="number"
                    class="Txt100"
                    id="txt_Bio_pMuestra"
                    max="100"
                    min="1"
                    placeholder="%"
                    name="pMuestra"
                    onkeypress="return esNumero(event, this.id);"
                    required
                    value="5"
                /><span>%</span>
            </div>
            
            <div class="txts">
                <label for="PecesEstanque">Peces en Estanque:</label>
<<<<<<< HEAD
                <input 
                    type="text"
                    class="Txt100 TxtNumb"
                    id="txt_Bio_PecesEstanque"
                    placeholder="Peces" 
                    name="PecesEstanque"
                    onkeypress="return esNumero(event, this.id);"
                    required
                />
                <span>
                    <div class="txtInline labels">
                    Muestra:
                        <div id="Bio_Muestra" class="resultados"></div>
                    </div>
                </span>
            </div>

            <div class="txts">
                <label for="Peso">Peso:</label>
                <input 
                    type="text"
=======
                <input 
                    type="text"
                    class="Txt100 TxtNumb"
                    id="txt_Bio_PecesEstanque"
                    placeholder="Peces" 
                    name="PecesEstanque"
                    onkeypress="return esNumero(event, this.id);"
                    required
                />
                <span>
                    <div class="txtInline labels">
                    Muestra:
                        <div id="Bio_Muestra" class="resultados"></div>
                    </div>
                </span>
            </div>

            <div class="txts">
                <label for="Peso">Peso:</label>
                <input 
                    type="text"
>>>>>>> 77ada48a42f540a3402ade30cfd3619cf2f4a52e
                    class="Txt100 TxtNumb"
                    id="txt_Peso"
                    placeholder="Peso del pez" 
                    name="Peso"
                    onkeypress="return esNumero(event, this.id);"
                    required
                /><span>gm</span>
            </div>

            <div class="txts">
                <label for="Tamaño">Tamaño:</label>
                <input 
                    type="text"
                    class="Txt100 TxtNumb"
                    id="txt_Tamañoepez"
                    placeholder="Largo del pez"
                    name="Tamaño"
                    onkeypress="return esNumero(event, this.id);"
                    required
                /><span>cm</span>
            </div>

            <button id="btnGuardar" class="button"><i class="far fa-save"></i> Guardar</button>
        </div>
    </div>

    <script>
        window.onload=function(){
            FechaActual();
            HoraActual();
        }

        $(document).on('click', '.cancelbtn', function() {
            window.location='Menu_Registro.php';
        });

        $(document).on('keyup', '#txt_Bio_PecesEstanque', function() {
            CalMuestra();
            colorResultado();
        });

        $(document).on('change', '#txt_Bio_pMuestra', function() {
            CalMuestra();
            colorResultado();
        });

    </script>
</body>
</html>