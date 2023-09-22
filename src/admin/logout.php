<!DOCTYPE html>
<html>

<head>
  <title>TijmenK.nl | AdminPaneel</title>
  <meta http-equiv="refresh" content="3;url=login.php">
</head>

<body>
  <?php
    session_start();
    session_destroy();
    echo "<h1>Uitgelogt</h1>";
    echo "<p>U bent successvol uitgelogt. U word elk moment terug gestuurd naar inlog!</p>";
  if (isset($_GET['reden'])) {
      $reden = $_GET['reden'];
      echo "<p>Reden: $reden</p>";
  } else {
      echo "<p>Reden: Geen reden opgegeven.</p>";
  }
    ?>
  <p>Please wait while you are redirected to the login page.</p>
</body>

</html>