<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoreo</title>
    <?php include "../incl/links.php"?>
</head>
<body class="cuerpo">
    <?php include "../incl/header.php"?>
    
    <div class="container">
        <div class="msgbox"></div>
        <h3>Resultados de Monitoreo</h3>
        <div class="form">

            <div class="txts">
                <label for="">Nivel de Oxigeno:</label>
                <input 
                    type="text" 
                    class="Txt100 TxtNumb"
                    id="txt_Oxigeno"
                    placeholder="Oxigeno" 
                    onkeypress="return esNumero(event, this.id);"
                    required
                /> Lps.
            </div>
            
            <div class="txts">
                <label for="">Temperatura:</label>
                <input 
                    type="text" 
                    class="Txt100 TxtNumb"
                    id="txt_Temperatura"
                    placeholder="Temperatura" 
                    onkeypress="return esNumero(event, this.id);"
                    required
                /> Lps.
            </div>
            
            <div class="txts">
                <label for="">pH:</label>
                <input 
                    type="text" 
                    class="Txt100 TxtNumb"
                    id="txt_pH"
                    placeholder="pH" 
                    onkeypress="return esNumero(event, this.id);"
                    required
                /> Lps.
            </div>
            
            <div class="txts">
                <label for="">NAT:</label>
                <input 
                    type="text" 
                    class="Txt100 TxtNumb"
                    id="txt_NAT"
                    placeholder="NAT" 
                    onkeypress="return esNumero(event, this.id);"
                    required
                /> Lps.
            </div>
            
            <div class="txts">
                <label for="">Amonio:</label>
                <input 
                    type="text" 
                    class="Txt100 TxtNumb"
                    id="txt_Amonio"
                    placeholder="Amonio" 
                    onkeypress="return esNumero(event, this.id);"
                    required
                /> Lps.
            </div>
            
            <div class="txts">
                <label for="">Nitrato:</label>
                <input 
                    type="text" 
                    class="Txt100 TxtNumb"
                    id="txt_Nitrato"
                    placeholder="Nitrato" 
                    onkeypress="return esNumero(event, this.id);"
                    required
                /> Lps.
            </div>
            
            <div class="txts">
                <label for="">Mortalidad:</label>
                <input 
                    type="text" 
                    class="Txt100 TxtNumb"
                    id="txt_Mortalidad"
                    placeholder="Mortalidad" 
                    onkeypress="return esNumero(event, this.id);"
                    required
                /> Lps.
            </div>


            <button class="btnGuardar"><i class="far fa-save"></i> Guardar</button>
        </div>
    </div>
    .
    <div class="container transp80 footer">
        <?php include "../incl/footer.php"?>
    </div>    

    <script>
        window.onload=function(){
            FechaActual();
            HoraActual();            
        }

        $(document).on('click', '.cancelbtn', function() {
            window.location='Menu_Registro.php';
        });
        


    </script>
</body>
</html>