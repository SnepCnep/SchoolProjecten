<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="..//adminpaneel/forum.php"><img class="dtnlogo" src="../../img/default/DTNlogo.png" alt="error"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="..//index/index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="..//index/klachten.php">Klachten</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dieren
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="..//index/dieren.php"><i class="fa-solid fa-dog fa-bounce"></i> Hond</a>
                        <a class="dropdown-item" href="..//index/dieren.php"><i class="fa-solid fa-cat fa-bounce"></i> Kat</a>
                        <a class="dropdown-item" href="..//index/dieren.php"><i class="fa-solid fa-crow fa-bounce"></i> Vogel</a>
                        <a class="dropdown-item" href="..//index/dieren.php"><i class="fa-solid fa-horse fa-bounce"></i> Paard</a>
                        <a class="dropdown-item" href="..//index/dieren.php"><i class="fa-solid fa-dragon fa-bounce"></i> Draak</a>
                        <a class="dropdown-item" href="..//index/dieren.php"><i class="fa-solid fa-frog fa-bounce"></i> Kikker</a>
                        <a class="dropdown-item" href="..//index/dieren.php"><i class="fa-solid fa-person-rifle fa-bounce"></i> Mens</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</body>

</html>

<style>
    .dtnlogo {
        width: auto;
        height: 40px;
    }

    nav {
        box-shadow: 0 3px 4px 0 rgba(0, 0, 0, .3);
    }

    body {
        background-color: lightblue;
    }
</style>