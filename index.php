<?php

include('db.php'); 

$tidpunkt = date('Y-m-d H:i:s');

if (isset($_POST['dagens-input'])):

  $dagenslistan = $_POST['dagenslistan'];
  $dagens = $_POST['dagens-input'];

  $sql = "INSERT INTO win SET text= '$dagens', datum='$tidpunkt'";

  if (mysqli_query($conn, $sql)) {

    $selectquery = "SELECT * FROM win ORDER BY datum DESC";

    $result = mysqli_query($conn, $selectquery) or die( mysqli_error($conn));

    while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {

      $texten = $row['text'];
      $texti = str_replace('"', "'", $texten);

    $dagi .= "<li id='" . $row['id'] . "'>" . $texti . "</li>";

}

  } else {

    $selectquery = "SELECT * FROM win ORDER BY datum DESC";

    $result = mysqli_query($conn, $selectquery) or die( mysqli_error($conn));

    while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {

      $texten = $row['text'];
      $texti = str_replace('"', "'", $texten);

    $dagi .= "<li id='" . $row['id'] . "'>" . $texti . "</li>";

}

  }

  mysqli_close($conn);


  ?>


<!doctype html>

<html lang="sv">

<head>

  <meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>

  <title>Dagens Win</title>

  <meta name="viewport" content="width=device-width, initial-scale=1"/>

  <link rel="stylesheet" href="s.css">


</head>

<body>

  <div class="sida">

    <header>

      <nav class="meny">
        <ul>
          <li><a href="/win/" class="titel">Dagens Win</a></li>
        </ul>
      </nav>
    
    </header>

    <main>

    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="dagens-win">

          <p id="victory">"...but declare victory every day. It doesn’t matter how small, it just needs to be something that improves your life. Going for a walk is a win, doing 10 pushups is a win, going to a job interview is a win, reading 10 pages is a win. Write down your wins, and celebrate yourself, don’t beat yourself up for what you didn’t do." </p>


          <input type='text' name='dagens-input' value='' id='dagens-input' autofocus>

        <input type="submit" class="spara" value="Spara">

</form>


  <ul class="wins">

            <?php 
            echo $dagi; 
            ?>

        </ul>


    </main>

  </div>  

  </body>

  </html>
 





<?php
else:


    $selectquery = "SELECT * FROM win ORDER BY datum DESC";

    $result = mysqli_query($conn, $selectquery) or die( mysqli_error($conn));

    while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {

    $dagens .= "<li id='" . $row['id'] . "'>" . $row['text'] . "</li>";

}

?>



  <!doctype html>

<html lang="sv">

<head>

  <meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>

  <title>Dagens Win</title>

  <meta name="viewport" content="width=device-width, initial-scale=1"/>

  <link rel="stylesheet" href="s.css">


</head>

<body>

  <div class="sida">

    <header>

      <nav class="meny">
        <ul>
          <li><a href="/win/" class="titel">Dagens Win</a></li>
        </ul>
      </nav>
    
    </header>

    <main>

   
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="dagens-win">

          <p id="victory">"...but declare victory every day. It doesn’t matter how small, it just needs to be something that improves your life. Going for a walk is a win, doing 10 pushups is a win, going to a job interview is a win, reading 10 pages is a win. Write down your wins, and celebrate yourself, don’t beat yourself up for what you didn’t do."</p>


          <input type='text' name='dagens-input' value='' id='dagens-input' autofocus>

        <input type="submit" class="spara" value="Spara">

</form>


  <ul class="wins">

            <?php 
            echo $dagens; 
            ?>

        </ul>

    </main>

<?php endif; ?>

  </div>  

  </body>

  </html>