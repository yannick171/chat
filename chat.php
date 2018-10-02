<?php
session_start();
include('mesfunctionsphp/connectionamabasededonnees.php');
// Appel de la fonction de connexion à la base de données
$db = db_connect();
?>
<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="stylechat.css">
    <script src="chat.js"></script>
    <!--//Ensuite, nous devons afficher le champ de sélection du statut :-->

</head>


<div id="container">
    <h1>Mon super chat</h1>
<?php

      if(isset($_POST['login']) AND !preg_match("#^[-. ]+$#", $_POST['login'])) {


          //!-- Statut //////////////////////////////////////////////////////// -->
    echo '<table class="status"><tr>
        <td>
            <span id="statusResponse"></span>
            <select name="status" id="status" style="width:200px;" onchange="setStatus(this)">
                <option value="0">Absent</option>
                <option value="1">Occup&eacute;</option>
                <option value="2" selected>En ligne</option>
            </select>
        </td>
    </tr></table>';
    //<!--//Ensuite, nous incluons la zone où les messages seront affichés et les membres connectés. Veuillez noter que l'image ajax-loader.gif peut être modifiée. Je vous donne donc un bon site d'images de préchargements : Ajaxload. Celle utilisée actuellement est la suivante :Image utilisateur-->

    echo'<table class="chat"><tr>
        <!-- zone des messages -->
        <td valign="top" id="text-td">
            <div id="annonce"></div>
            <div id="text">
                <div id="loading">
                    <center>
                        <span class="info" id="info">Chargement du chat en cours...</span><br />
                        <img src="mes%20images/ajax-loader.gif" alt="patientez...">
                    </center>
                </div>
            </div>
        </td>

        <!-- colonne avec les membres connectés au chat -->
        <td valign="top" id="users-td"><div id="users">Chargement</div></td>
    </tr></table>';
    //<!--//Enfin, nous affichons la barre contenant la zone de texte pour taper le message et le bouton :-->

    //<!-- Zone de texte //////////////////////////////////////////////////////// -->
    echo'<a name="post"></a>
    <table class="post_message"><tr>
        <td>
            <form action="" method="" onsubmit="envoyer(); return false;">
                <input type="text" id="message" maxlength="255" />
                <input type="button" onclick="envoyer()" value="Envoyer" id="post" />
            </form>
            <div id="responsePost" style="display:none"></div>
        </td>
    </tr></table>
</div>';
}



?>