<header>
    <div class="containerh">
        <button class="cancelbtn button" id="btncancel"><i class="fas fa-power-off"></i></button>
        <div class="imgcontainer">
            <img src="../img/usuario.png" alt="Avatar" class="avatar_h">
        </div>
        <p id="user_name"><b ><?php echo $_SESSION['Activo']['Nombre'];?></b></p>
        <p id="user_posicion"><?php echo $_SESSION['Activo']['Descripcion'];?></p>

        <div class="oculto">
            <p id="idFinca"><?php echo $_SESSION['Activo']['ID_fn'];?></p>
            <p id="descFinca"><?php echo $_SESSION['Activo']['Finca'];?></p>
            <p id="especia"><?php echo $_SESSION['Activo']['Especie'];?></p>
        </div>
        
    </div>
</header>  