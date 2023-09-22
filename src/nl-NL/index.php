<?php
    include_once("../../config/connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/style/style1.css">
    <script src="../../public/scripts/script.js"></script>
    <script src="https://kit.fontawesome.com/1925c94141.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>TijmenK.nl</title>
</head>

<body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/"><img class="navbar-logo" src="../../src/" alt="error"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa-solid fa-house"></i> Home</a><!-- <span class="sr-only">(current)</span> -->
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php#overmij"><i class="fa-solid fa-user"></i> Over mij</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php#projecten"><i class="fa-solid fa-folder-open"></i> Projecten</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php#contact"><i class="fa-solid fa-address-card"></i> Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../index.php"><i class="fa-solid fa-language"></i> en-EN</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="index-container home">
        <h1 class="index-title">TijmenK.nl</h1>
        <h1 class="index-title2">Welkom op mijn website!</h1>
    </div>
    <div class="index-container overmij" id="overmij">
        <h1 class="index-title2">Informatie over mij!</h1>
        <div class="card-group">
            <div class="card">
                <div class="card-header">
                    <h2>Informatie</h2>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Opleiding</h5>
                    <p class="card-text">Horizon college hoorn - Software Development.</p>
                    <h5 class="card-title">Werk</h5>
                    <p class="card-text">Albert heijn.</p>
                    <h5 class="card-title"></h5>
                    <p class="card-text"></p>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h2>Hobbies</h2>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Coderen</h5>
                    <p class="card-text">I enjoy making random or specific projects.</p>
                    <h5 class="card-title">Muzeik</h5>
                    <p class="card-text">I love music very much, I don't really have a taste in music, but I like everything a bit.</p>
                    <h5 class="card-title">Gamen</h5>
                    <p class="card-text">I enjoy gaming. Games like Fivem, R6 and other games.</p>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h2>Future plans</h2>
                </div>
                <div class="card-body">
                    <h5 class="card-title">What I want to become.</h5>
                    <p class="card-text">Cybersecurity.</p>
                    <h5 class="card-title">Waar ik wil wonen!.</h5>
                    <p class="card-text">Amerika of Canada.</p>
                    <h5 class="card-title"></h5>
                    <p class="card-text"></p>
                </div>
            </div>
        </div>
    </div>
    <div class="index-container projecten" id="projecten">
        <h1 class="index-title2">Projecten</h1>
        <?php
        $sth = $conn->prepare("SELECT * FROM projecten");
        $sth->execute();
        $result = $sth->fetchAll();

        if (count($result) > 0) {
            echo "<div class='row row-cols-1 row-cols-md-3 g-4 card-group'>";
            foreach ($result as $row) {
                echo "<div class='col'>";
                echo "<div class='card text-center'>";
                echo "<h5 class='card-header'>" . $row["naam"] . "</h5>";
                echo "<img src=" . $row["image"] . " class='card-img-top' alt='...'>";
                echo "<div class='card-body'>";
                echo "<p class='card-text'>" . $row["beschrijving"] . "</p>";
                echo "</div>";
                echo "<div class='card-footer'>";
                echo "<small class='text-muted'>Laaste aangepast op  (" . $row["bewerktop"] . ") </small>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            echo "</div>"; // Close the row div
        } else {
            echo "Er zijn geen gegevens gevonden.";
        }
        ?>
    </div>
    <div class="index-container contact" id="contact">
        <h1 class="index-title2">Contact</h1>
        <div class="card text-center">
            <div class="card-header">
                Contact Me
            </div>
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
            <div class="card-footer text-muted">
                Tijmenk.nl © 2023
            </div>
        </div>
    </div>
    <footer>

    </footer>
</body>

</html>