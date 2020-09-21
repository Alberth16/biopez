<header>
    <div class="containerh">
        <button class="cancelbtn" id="btncancel"><i class="fas fa-power-off"></i></button>
        <div class="imgcontainer">
            <img src="../img/usuario.png" alt="Avatar" class="avatar_h">
        </div>
        <p id="user_name"><b ><?php echo $_SESSION['Activo']['Nombre'];?></b></p>
        <p id="user_posicion"><?php echo $_SESSION['Activo']['DescRols'];?></p>
        
    </div>
</header>  