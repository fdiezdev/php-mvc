<?php

    if(isset($_SESSION['id'])) {
    
        echo "<a href='logout'>Cerrar sesión</a>";
    
    } else {
    
        echo `
            <a href="login">Inicia sesión</a><br><a href="help">Necesito ayuda</a>
        `;
    
    }