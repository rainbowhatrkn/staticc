<!DOCTYPE html>
<html>
<head>
    <title>Résultats de l'exploration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        body {
            background-color: black;
            color: white;
            font-family: 'Courier New', monospace;
        }

        h1 {
            color: red;
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
        }

        li:hover {
            background-color: #00FF00;
            transform: scale(1.05);
        }

        a {
            text-decoration: none;
            color: green;
        }

        .directory {
            padding-left: 20px;
            background-color: #333;
            cursor: pointer;
        }

        .hidden {
            display: none;
        }
    </style>
    <script>
        function toggleDirectory(directory) {
            const ul = directory.nextElementSibling;
            ul.classList.toggle("hidden");
        }
    </script>
</head>
<body>
    <h1 class="animate__animated animate__bounce">Résultats de l'exploration</h1>
    <ul>
    <?php
    require 'vendor/autoload.php';

// Function to verify the password using password-compat
function isPasswordCorrect($enteredPassword) {
    $hash = password_hash('trkntrkntrkn', PASSWORD_BCRYPT); // Use PASSWORD_BCRYPT here
    return password_verify($enteredPassword, $hash);
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
                    if (isPasswordCorrect($enteredPassword)) {
                        listFilesAndDirectoriesByExtension($itemPath, $extensions);
                    }
                    echo '</ul>';
                } else {
                    $fileExtension = pathinfo($itemPath, PATHINFO_EXTENSION);
                    if (in_array($fileExtension, $extensions)) {
                        echo '<li class="animate__animated animate__fadeIn"><a href="' . $itemPath . '">' . $item . '</a></li>';
                    }
                }
            }
        }
    }

    $webPath = "../../../../"; // Chemin web de votre choix
    $allowedExtensions = ["php", "html", "aspx"]; // Extensions autorisées
    $enteredPassword = $_POST['password'] ?? '';

    listFilesAndDirectoriesByExtension($webPath, $allowedExtensions);
    ?>
    </ul>

    <?php if (!isPasswordCorrect($enteredPassword)): ?>
    <form method="POST">
        Password: <input type="password" name="password">
        <input type="submit" value="Submit">
    </form>
    <?php endif; ?>
</body>
</html>