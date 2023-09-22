<?php
include_once("..//template/navbar.php");
include_once("../template/connection.php");

// Haal alle gegevens op uit de database
$query = "SELECT * FROM dieren";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Controleer of er resultaten zijn
if (count($result) > 0) {
    echo "<h2>Alle ingevoerde gegevens:</h2>";
    echo "<div class='row'>"; // Add a div with the 'row' class
    foreach ($result as $row) {
        echo "<div class='col-md-3'>"; // Divide each block into 4 columns (adjust the class based on your CSS framework)
        echo "<div class='animal-block'>"; // Add a div with a class for styling and click event
        echo "<img src='../../img/animal.png' alt='" . $row['soort'] . "'>";
        echo "<div class='overlay'>";
        echo "<div class='animal-info'>";
        echo "<p><strong>DTN: </strong>" . $row['dtn'] . "</p>";
        echo "<p><strong>Soort: </strong>" . $row['soort'] . "</p>";
        echo "<p><strong>Ras: </strong>" . $row['ras'] . "</p>";
        echo "<p><strong>Geslacht: </strong>" . $row['geslacht'] . "</p>";
        echo "<p><strong>Geboortedatum: </strong>" . $row['geboortedatum'] . "</p>";
        echo "<p><strong>Gecastreerd: </strong>" . ($row['gecastreerd'] ? 'Ja' : 'Nee') . "</p>";
        echo "<p><strong>Lengte: </strong>" . $row['lengte'] . "</p>";
        echo "<p><strong>Gewicht: </strong>" . $row['gewicht'] . "</p>";
        echo "<p><strong>Bijzonderheden: </strong>" . $row['bijzonderheden'] . "</p>";
        echo "<p><strong>Vaccinaties: </strong>" . $row['vaccinaties'] . "</p>";
        echo "<p><strong>Had eigenaar: </strong>" . ($row['hadeigenaar'] ? 'Ja' : 'Nee') . "</p>";
        echo "<p><strong>Beschikbaarheid: </strong>" . $row['beschikbaarheid'] . "</p>";
        echo "</div></div>"; // Close the divs for overlay and animal-info
        echo "</div></div>"; // Close the divs for animal-block and column
    }
    echo "</div>"; // Close the row div
} else {
    echo "Er zijn geen gegevens gevonden.";
}

include_once("..//template/footer.php");
?>
