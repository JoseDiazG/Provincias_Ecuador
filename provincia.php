<?php
  extract($_GET);
  require_once( "sparqllib.php" );

  $sparqlProvincias = sparql_get("https://dbpedia.org/sparql", "SELECT ?s ?p ?o
  WHERE{
   ?s rdf:type <http://dbpedia.org/class/yago/WikicatProvincesOfEcuador> .
   ?s ?p ?o
   FILTER regex(?s, '" .$url. "', 'i')
   FILTER (LANG(?o)='es')
  }
");

$sparqlProvinciass = sparql_get("https://dbpedia.org/sparql", "SELECT ?s ?p ?o
WHERE{
 ?s rdf:type <http://dbpedia.org/class/yago/WikicatProvincesOfEcuador> .
 ?s ?p ?o
 FILTER regex(?s, '" .$url. "', 'i')
}
");

?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SBC - Ecuador</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/landing-page.min.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">

</head>

<body>


  <!-- Image and text -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">SISTEMAS BASADOS EN CONOCIMIENTO</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <ul class="nav nav-pills nav-fill">
    <li class="nav-item">
      <a class="nav-link active" href="provincias.php">Provincias</a>
    </li>
    </ul>
   </nav>

  <!-- Descripcion de cada provincia -->
  <div class="container pt-4">

  <?php foreach( $sparqlProvincias as $provi ){

    if($provi['p'] == 'http://www.w3.org/2000/01/rdf-schema#label'){
      echo '<h1 class="text-center p-4">'.$provi['o'].'</h1>'; 
    }

} ?>
 

  <?php foreach( $sparqlProvinciass as $provis ){
 

    if($provis['p'] == 'http://dbpedia.org/ontology/thumbnail'){
                              
      echo '<img class="rounded mx-auto d-block" src="'.$provis['o'].'" alt="ecudor">'; 
    }

  } ?>
  
  <?php foreach( $sparqlProvincias as $provi ){

      if($provi['p'] == 'http://dbpedia.org/ontology/abstract'){
        
        echo '<p class="text-justify p-4">'.$provi['o'].'</p>'; 
      }
  
  } ?>

    <?php foreach( $sparqlProvinciass as $provis ){
    
    if($provis['p'] == 'http://www.w3.org/2003/01/geo/wgs84_pos#lat'){

      echo ' <table class="table">
        <h1>Datos Geográficos<h1>
        <tbody>
        <tr>
        <th scope="row">Latitud :</th>
        <td>'. $provis['o'].'</td>
        </tr>
        </tbody>
        </table>';
                     
    }

    if($provis['p'] == 'http://www.w3.org/2003/01/geo/wgs84_pos#long'){

      echo ' <table class="table">
        <tbody>
        <tr>
        <th scope="row">Longitud :</th>
        <td>'. $provis['o'].'</td>
        </tr>
        </tbody>
        </table>';

    }

    } ?>
        
  </div>

  

  <!-- Footer -->
  <footer class="footer bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          <ul class="list-inline mb-2">
            <li class="list-inline-item">
              <a href="#">About</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Contact</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Terms of Use</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Privacy Policy</a>
            </li>
          </ul>
          <p class="text-muted small mb-4 mb-lg-0">&copy; Your Website 2020. All Rights Reserved.</p>
        </div>
        <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
          <ul class="list-inline mb-0">
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-facebook fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-twitter-square fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-instagram fa-2x fa-fw"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>
</html>
