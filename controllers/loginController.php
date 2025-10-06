<?php
if(isset($_GET['logout'])){
    $_SESSION['user']=false;
    header('Location:index.php');
    exit();
 }

if(!isset($_SESSION['user'])){
    $_SESSION['user']=false;
}


// SI PULSA EL BOTÓN LOGIN
if(isset($_POST['username']) && isset($_POST['password'])){
    $user = LoginRepository::getUser($_POST['username'], md5($_POST['password']));
    if($user){
        $_SESSION['user'] = $user;
            header('location:index.php');
        }
    }

// SI PULSA EL BOTÓN REGISTRAR
if (isset($_POST['Registrar'])) {
    require_once('views/registro.phtml');

    // COMPROBAR QUE LOS CAMPOS NO ESTÉN VACÍOS
    if (isset($_POST['newUsername']) && isset($_POST['newPassword']) && isset($_POST['newEmail']) && isset($_POST['confirmPassword'])) {
        if (!empty($_POST['newUsername']) && !empty($_POST['newPassword']) && !empty($_POST['newEmail']) && !empty($_POST['confirmPassword'])) {

            // COMPROBAR QUE LAS CONTRASEÑAS COINCIDEN
            if ($_POST['newPassword'] != $_POST['confirmPassword']) {
                echo "<script>alert('Las contraseñas no coinciden.');</script>";
                exit();
            }

            // COMPROBAR QUE EL USUARIO NO EXISTE
            $checkUser = "SELECT * FROM users WHERE username='" . $_POST['newUsername'] . "'";
            $result2 = $db->query($checkUser);
            if (mysqli_num_rows($result2) > 0) {
                echo "<script>alert('El usuario ya existe.');</script>";
                exit();
            }

            // COMPROBAR QUE EL EMAIL NO EXISTE
            $checkEmail = "SELECT * FROM users WHERE email='" . $_POST['newEmail'] . "'";
            $result2 = $db->query($checkEmail);
            if (mysqli_num_rows($result2) > 0) {
                echo "<script>alert('El email ya está en uso.');</script>";
                exit();
            }

            // INSERTAR USUARIO EN LA BASE DE DATOS
            $created = LoginRepository::createUser($_POST['newUsername'], md5($_POST['newPassword']), md5($_POST['confirmPassword']), $_POST['newEmail']);
            if ($created) {
                echo "<script>alert('Usuario registrado con éxito.'); window.location.href='index.php';</script>";
            } else {
                echo "<script>alert('Error al registrar el usuario.');</script>";
            }
        } else {
            echo "<script>alert('Rellena todos los campos.');</script>";
        }
    }
    exit();
}


// SI NO PULSA NADA Y NO HAY NADA SETEADO MUESTRA ESTO
if(!($_SESSION['user'] || isset($_GET['logout']))){
    require_once('views/login.phtml');
    exit();
}



