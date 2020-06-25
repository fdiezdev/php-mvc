<?php 

class UserController {

    static public function auth() {
        
        if(isset($_SESSION['id'])) {
            echo "Ya tenés una sesión iniciada.";
        } else {
            if(isset($_POST['email'])) {
            
                $email = $_POST['email'];
                $password = $_POST['password'];
                
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    
                    echo "<p style='color: red;'>Revisá el correo</p>";
                    
                } else {
                    
                    $response = UserModel::read("email", $email);
                    
                    if($response) {
                        #print_r($response);
                        if(password_verify($_POST['password'], $response['password'])) {
                            
                            #echo "<p style='color: green;'>Validado correctamente</p>";
                            
                            # Armamos la id de sesión
                            $_SESSION['id'] = $response['id'];
                            $_SESSION['role'] = $response['role'];
                            $_SESSION['name'] = $response['name'];
                            $_SESSION['last_name'] = $response['last_name'];
                            
                            # Dependiendo del rol, direccionamos al usuario a su página correspondiente
                            if($response['role'] == 2) {
                                header("Location: admin");
                            } elseif ($response['role'] == 1) {
                                header("Location: panel");
                            } else {
                                header("Location: dashboard");
                            }
                        } else {
                            echo "<p style='color: red;'><b>Revisá tus credenciales</b></p>";
                        }
                        
                    } else {
                        if($_GET['ref'] == "cerrar") {
                            echo "<p style='color: red;'>Sesión cerrada</p>";
                        } else {
                            echo "<p style='color: red;'>Ocurrió un error</p>";
                        }
                    }
                    
                
                }
            
            } else {
                echo "<p style='color: red;'>Ocurrió un error inesperado.</p>";
            }
        }
    
    }


}