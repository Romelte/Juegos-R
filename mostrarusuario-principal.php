    
            <?php 
            //Si existe la sesión "correo"...
            if(isset($_SESSION['correo'])){
                echo "<p class='bienvenido'><span class='negrita'>".$cliente."</span>&nbsp;&nbsp;";
                //echo "<a class='pushy__btn pushy__btn--sm pushy__btn--red' href='../logout.php'>Salir</a></p>";
                //Si existe y hemos pulsado el link "Salir"...
                if(isset($_REQUEST["salir"])){
                    //Borramos o destruimos la sesión "correo".
                    unset($_SESSION["correo"]);
                }
            }
            ?>

