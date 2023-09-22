<?php
include_once("..//template/navbar.php");
include_once("../template/connection.php");

function randomdtn()
{
    $characters = '0123456789';
    $randomString = '';

    for ($i = 0; $i < 9; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    $dtn = "DTN-" . $randomString;
    return $dtn;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $soort = $_POST['soort'];
    $ras = $_POST['ras'];
    $geslacht = $_POST['geslacht'];
    $geboortedatum = $_POST['geboortedatum'];
    $gecastreerd = isset($_POST['gecastreerd']) ? 1 : 0;
    $lengte = $_POST['lengte'];
    $gewicht = $_POST['gewicht'];
    $bijzonderheden = $_POST['bijzonderheden'];
    $vaccinaties = implode(", ", $_POST['vaccinations']);
    $hadeigenaar = isset($_POST['hadeigenaar']) ? 1 : 0;
    $beschikbaarheid = $_POST['beschikbaarheid'];

    // Prepare the SQL query
    $query = "INSERT INTO dieren (dtn, soort, ras, geslacht, geboortedatum, gecastreerd, lengte, gewicht, bijzonderheden, vaccinaties, hadeigenaar, beschikbaarheid)
              VALUES (:dtn, :soort, :ras, :geslacht, :geboortedatum, :gecastreerd, :lengte, :gewicht, :bijzonderheden, :vaccinaties, :hadeigenaar, :beschikbaarheid)";

    // Execute the query
    try {
        $statement = $conn->prepare($query);
        $statement->execute([
            'dtn' => randomdtn(),
            'soort' => $soort,
            'ras' => $ras,
            'geslacht' => $geslacht,
            'geboortedatum' => $geboortedatum,
            'gecastreerd' => $gecastreerd,
            'lengte' => $lengte,
            'gewicht' => $gewicht,
            'bijzonderheden' => $bijzonderheden,
            'vaccinaties' => $vaccinaties,
            'hadeigenaar' => $hadeigenaar,
            'beschikbaarheid' => $bx1
        if (!empty($_FILES['images']['name'][0])) {
            $imagePath = '../images/';

            // Create the directory if it doesn't exist
            if (!is_dir($imagePath)) {
                mkdir($imagePath);
            }

            $uploadedImages = $_FILES['images'];
            $imageCount = count($uploadedImages['name']);

            for ($i = 0; $i < $imageCount; $i++) {
                $imageName = $uploadedImages['name'][$i];
                $imageTmp = $uploadedImages['tmp_name'][$i];
                $imageExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
                $newImageName = 'image_' . ($i + 1) . '_' . $lastInsertedId . '.' . $imageExtension;
                $imageDestination = $imagePath . $newImageName;

                // Move the uploaded image to the destination directory
                move_uploaded_file($imageTmp, $imageDestination);

                // Insert the image information into the database
                $imageQuery = "INSERT INTO images (dier_id, image_name) VALUES (:dierId, :imageName)";
                $imageStatement = $db->prepare($imageQuery);
                $imageStatement->execute([
                    'dierId' => $lastInsertedId,
                    'imageName' => $newImageName
                ]);
            }
        }

        echo "Gegevens succesvol toegevoegd aan de database.";
    } catch (PDOException $e) {
        die("Er is een fout opgetreden bij het toevoegen van gegevens aan de database: " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dierenasiel Admin | Voeg dier</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.16/css/bootstrap-multiselect.min.css">
    <style>
        body {
            background-color: lightblue;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="mt-5">Dierenformulier</h2>
        <form method="POST" action="..//index/dieren.php" class="mt-4" enctype="multipart/form-data">
            <div class="form-group">
                <label for="soort">Soort:</label>
                <input type="text" name="soort" id="soort" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="ras">Ras:</label>
                <input type="text" name="ras" id="ras" class="form-control" required>
            </div>

            <label for="geslacht">Geslacht:</label>
            <select name="geslacht" id="geslacht" class="form-control" required>
                <option value="vrouw">Vrouw</option>
                <option value="man">Man</option>
            </select><br>

            <div class="form-group">
                <label for="geboortedatum">Geboortedatum:</label>
                <input type="date" name="geboortedatum" id="geboortedatum" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="gecastreerd">Gecastreerd:</label>
                <input type="checkbox" name="gecastreerd" id="gecastreerd">
            </div>

            <div class="form-group">
                <label for="lengte">Lengte:</label>
                <input type="number" name="lengte" id="lengte" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="gewicht">Gewicht:</label>
                <input type="number" name="gewicht" id="gewicht" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="bijzonderheden">Bijzonderheden:</label>
                <textarea name="bijzonderheden" id="bijzonderheden" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="vaccinaties">Vaccinaties:</label>
                <select name="vaccinations[]" id="vaccinaties" class="form-control">
                    <option value="Hondenziekte">Hondenziekte</option>
                    <option value="Parvo">Parvo</option>
                    <option value="Hepatitis">Hepatitis</option>
                    <option value="Parainfluenza">Parainfluenza</option>
                    <option value="Leptospirose">Leptospirose</option>
                </select>
            </div>

            <div class="form-group">
                <label for="hadeigenaar">Heeft een eigenaar:</label>
                <input type="checkbox" name="hadeigenaar" id="hadeigenaar">
            </div>

            <div class="form-group">
                <label for="beschikbaarheid">Beschikbaarheid:</label>
                <input type="text" name="beschikbaarheid" id="beschikbaarheid" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="images">Afbeeldingen:</label>
                <div id="dropzone" class="dropzone">
                    Sleep hier afbeeldingen naartoe of klik om te bladeren.<br>
                    <small class="form-text text-muted">Ondersteunde bestandstypen: jpg, jpeg, png.</small>
                </div>
                <input type="file" name="images[]" id="images" class="form-control" multiple style="display: none;">
            </div>

            <button type="submit" class="btn btn-primary">Toevoegen</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.16/js/bootstrap-multiselect.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#vaccinaties').multiselect({
                includeSelectAllOption: true,
                selectAllText: 'Selecteer alle vaccinaties'
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Enable drag and drop
            var dropzone = document.getElementById('dropzone');

            dropzone.addEventListener('dragover', function(e) {
                e.preventDefault();
                e.stopPropagation();
                dropzone.classList.add('dragover');
            });

            dropzone.addEventListener('dragleave', function(e) {
                e.preventDefault();
                e.stopPropagation();
                dropzone.classList.remove('dragover');
            });

            dropzone.addEventListener('drop', function(e) {
                e.preventDefault();
                e.stopPropagation();
                dropzone.classList.remove('dragover');

                var files = e.dataTransfer.files;
                var imagesInput = document.getElementById('images');
                imagesInput.files = files;

                // Display selected file names
                var fileList = Array.from(files).map(function(file) {
                    return file.name;
                }).join(', ');

                dropzone.innerHTML = fileList;
            });

            // Show file input on click
            dropzone.addEventListener('click', function() {
                var imagesInput = document.getElementById('images');
                imagesInput.click();
            });

            // Display selected file names
            var imagesInput = document.getElementById('images');
            imagesInput.addEventListener('change', function() {
                var files = Array.from(this.files);
                var fileList = files.map(function(file) {
                    return file.name;
                }).join(', ');

                dropzone.innerHTML = fileList;
            });
        });
    </script>
</body>

</html>
