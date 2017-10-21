<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Accueil</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="shortcut icon" href="images/favicon.ico" type="images/x-icon" />                
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="bibliotheques/bootstrap/bootstrap-3.3.5-dist/css/bootstrap.css">
		<!-- jQuery library -->
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
                <script src="bibliotheques/bootstrap/bootstrap-3.3.5-dist/jQuery/jquery-1.11.3.js"></script>

		<!-- Latest compiled JavaScript -->
		<!--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>-->
                <script src="bibliotheques/bootstrap/bootstrap-3.3.5-dist/js/bootstrap.js"></script>
                
                <script src="bibliotheques/Script-page-accueil/recherche.js"></script>
	</head>
        <body style="padding-bottom: 2%;">
            <div class="wrapper">
		<!--Header-->
		<div class="page-header">		                       
			<h1 id="titre"><b>V</b>eille <b>S</b>anitaire <b>I</b>nternationale</h1>
		</div>
		<!--Barre navigation-->
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="index.php?action=accueil">Projet VSI</a>
				</div>
				<div>
					<ul class="nav navbar-nav">
						<li class="active"><a href="index.php?action=accueil">Accueil</a></li>
						<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Consultation<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="index.php?action=formulaireRecherche">Recherche</a></li>
								<li><a href="index.php?action=statistiques">Statistiques</a></li>
							</ul>
						</li>
						<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Paramétrage<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="index.php?action=formulaireParametrageUrl">URL</a></li>
								<li class = "divider"></li>
								<li class="dropdown-header">Ajout Mot-clé</li>
								<li><a href="index.php?action=formulaireAjoutMaladie">Maladie</a></li>
								<li><a href="index.php?action=formulaireAjoutSymptome">Symptôme</a></li>
                                                                <li><a href="index.php?action=formulaireAjoutHote">Hôte</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
                <!--Bandeau navigation -->
                <ol class="breadcrumb">
                    <li class="active">Accueil</li>
                </ol>
		<!--Contenu de la page (5 derniers articles)-->
		<div class = "container">
			<h2 align= center>Les dernières dépêches</h2>
                        <div class="container" style="margin-bottom: 1%;">
                            <a  class="link" style="margin-right: 2%;" onclick="filtrer(1)"> Par date d'aspiration</a>
                            <a  class="link" onclick="filtrer(2)"> Par date de publication </a>
                        </div>
                        <div id="contenuDepeches" class="container">
                            <?php 
                            foreach ($tabArticles as $article) {

                            ?>
                                <div class="list-group">
                                        <a href="#" class="list-group-item" data-toggle="modal" data-target="#afficheInfo" data-whatever="<?= $article->getId() ?>" >
                                            <h4 class="list-group-item-heading"><?= $article->getTitre() ?></h4>
                                            <p class="list-group-item-text"><?=  $article->donnerResumePrecis(620) ?></p>
                                        </a>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
		</div>
		
		<!-- Modal -->
		<div class="modal fade" id="afficheInfo" role="dialog">
                    <div id="contenuModal" class="modal-dialog modal-lg">
    
		<!-- Modal content-->
                

                    </div>
		</div>
            </div>
	</body>
        <div class="footerfix"></div>
        <footer>
		<div class="container hidden-xs">
			<p class="navbar-text pull-right"><a href="http://www.cirad.fr/"><img src="images/CIRAD_logo.png" class="img-rounded" alt="Ciradlogo" width="90" height="30"></a>
                                                          <a href="http://www.lirmm.fr/numev/"><img src="images/NUMEV_logo.png" class="img-rounded" alt="Numevlogo" width="45" height="45"></a> 
                                                          <a href="http://centres.inra.fr/sitecentres/centreunite74"><img src="images/INRA_logo.jpg" class="img-rounded" alt="Inralogo" width="90" height="30" style="padding-left: 3%;"></a>
                        </p>
			<p class="navbar-text pull-left" style="font-size: 75%;">Max Devaud-Thomas Filiol Copyright 2015 All Right Reserved.</p>
		</div>	
	</footer>
</html>

