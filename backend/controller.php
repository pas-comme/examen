<?php

$db = new PDO('mysql:host=localhost;dbname=andrana', 'root', 'toor');

$db->exec('INSERT INTO billet(loisir, nbr, client, dateAjout) VALUES ( \''.$_GET['billet'].'\', '.$_POST['nbr'].', \''.$_POST['nom'].'\', CURDATE())');

header('Location: ../index.php?bool=true');

        
        
        ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>billet</title>
  </head>
  <body>
    <header></header>
    <main>
      <div>
        voici le billet acheté

        <p>billet = <?php echo $_GET['billet']; ?></p>
        <p>nombre de billet = <?php echo $_POST['nbr']; ?></p>
        <p>type = <?php echo $_POST['type']; ?></p>
        <p>client = <?php echo $_POST['nom']; ?></p>
        
      </div>
    
    </main>
    <footer></footer>
  </body>
</html>


