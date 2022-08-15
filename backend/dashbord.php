
<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <title>DASHBORD</title>
    <link href="../bootstrap-5.1.3/dist/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="css/icofont/icofont.css" type="text/css" rel="stylesheet">
  </head>
  <body>
    <header></header>
    <main>
    
      <div class="row" style="text-align: center; margin-top:30px">
        <div class="col-lg-6 " ><a class="btn btn-primary" href="dashbord.php?androany=true"><h4>Afficher les achats aujourd'hui</h4> </a>          
          
        </div>
        <div class="col-lg-6">
          <div class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDate">
            <h4>Afficher achats sp&eacute;cifiques</h4>            
          </div>
        </div>
      
          <div class="modal fade " data-bs-backdrop="static" id="modalDate">
            <div class="modal-dialog " role="document">
              <div class="modal-content bg-dark text-white ">
                <div class="toast-header">
                  <h2 class="modal-title me-auto">Voir achats avec d&eacute;tails sp&eacute;cifiques</h2>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                  <p>Entrer la date dans laquelle vous voulez voir les achats</p>
                  <form action="dashbord.php?special=true" method="post" class="text-black">
                  <p class="form-floating mb-3" require>
                    <span><input type="radio" name="type" value="*" checked/>Tous les loisirs</span>
                    <span><input type="radio" name="type" value="piscine"/> Piscine</span>  
                    <span><input type="radio" name="type" value="kermesse"/> Jeux de kermesse</span>
                    <span><input type="radio" name="type" value="restauration"/> Restauration</span>
                    <span><input type="radio" name="type" value="jeux videos"/> Jeux vid&eacute;os</span>
                    <span><input type="radio" name="type" value="chambre"/> Chambre</span>
                    <span><input type="radio" name="type" value="terrains"/> Terrains</span>
                    <span><input type="radio" name="type" value="jeux de table"/> Jeux de table</span>
                    <span><input type="radio" name="type" value="casino"/> Casino</span>
                  </p>
                    <p class="form-floating mb-3">
                      <input type="date" class="form-control rounded-4" name="date" required>
                      <label for="date">date souhait&eacute;e</label>
                    </p>
                    <input type="submit" value="afficher" class="btn btn-primary"/>
                  </form>

                </div>
              </div>
            </div>
          </div>
         
        </div>
      </div>
      <table class="table table-bordered table-striped table-condensed" style="margin-top:30px;">
        <thead>
          <tr>
            <th>Numero Achat</th>
            <th>Stand</th>
            <th>Nombre de billet</th>
            <th>Client</th>
            <th>dateAjout</th>
          </tr>
        </thead>
        <tbody>
            <?php
              $db = new PDO('mysql:host=localhost;dbname=andrana', 'root', 'toor');
              if($_GET['androany'] == 'true'){
              
                $reponse = $db->query('SELECT * FROM billet WHERE dateAjout = CURDATE()');
                while ($donnees = $reponse->fetch())
                {
                echo '<tr> <td>' .$donnees['id'] . '</td><td> '.$donnees['loisir'] . '</td><td>'
                . $donnees['nbr'] .' </td><td>'.$donnees['client'] . '</td><td>'. $donnees['dateAjout'] .'</td></tr>';
                }
              }
              else if($_GET['special'] == 'true'){
            
                $reponse = $db->query('SELECT '.$_POST['type']. 'FROM billet WHERE dateAjout = \''.$_POST['date'].'\'');
                while ($donnees = $reponse->fetch())
                {
                echo '<tr> <td>' .$donnees['id'] . '</td><td> '.$donnees['loisir'] . '</td><td>'
                . $donnees['nbr'] .' </td><td>'.$donnees['client'] . '</td><td>'. $donnees['dateAjout'] .'</td></tr>';
                }
              }
              else{
                $reponse = $db->query('SELECT * FROM billet');
                while ($donnees = $reponse->fetch())
                {
                echo '<tr> <td>' .$donnees['id'] . '</td><td> '.$donnees['loisir'] . '</td><td>'
                . $donnees['nbr'] .' </td><td>'.$donnees['client'] . '</td><td>'. $donnees['dateAjout'] .'</td></tr>';
                }
              }


              
              
                  
          ?>

        </tbody>
      </table>

    </main>
    <footer></footer>
    <script src="../bootstrap-5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
  </body>
  
</html>
