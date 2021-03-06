<?php
  extract($_GET);
  require_once( "sparqllib.php" );

  $sparqlArtistas = sparql_get("https://dbpedia.org/sparql", "SELECT ?s ?l ?d
   WHERE{
    ?s rdf:type <http://dbpedia.org/class/yago/WikicatProvincesOfEcuador> .
    ?s rdfs:label ?l .
    ?s <http://dbpedia.org/ontology/abstract> ?d .
    FILTER (lang(?l) = 'es')
    FILTER (lang(?d) = 'es')
  }ORDER BY ASC(?l)
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
    <a class="navbar-brand" href="index.php">SISTEMAS BASADOS EN CONOCIMIENTO</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
   </nav>

    <div class="container">
        <div class="row">
        <?php foreach( $sparqlArtistas as $provi ){ ?>
         <div class="col-sm-6 pt-4">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo $provi['l']; ?></h5>
                <p class="card-text text-justify">
                <?php $provi['d']; $caracteres = 300;
                  echo substr($provi['d'], 0, $caracteres).'...';
                ?>
                </p>
                <a href="provincia.php?url=<?php echo $provi['s'];?>" class="btn btn-primary">Ver más</a>
            </div>
            </div>
         </div>
         <?php } ?>
        </div>
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
