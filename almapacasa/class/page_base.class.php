<?php

class page_base {
	protected $right_sidebar;
	protected $left_sidebar;
	protected $titre;
	protected $js=array('jquery-2.1.4.min', 'bootstrap.min');
	protected $css=array('perso', 'bootstrap.min');
	protected $page;
	protected $metadescription="Bienvenue à  l'accueil périscolaire de l'école les Ptits-Bouts-De-Choux";
	protected $metakeyword=array('Accueil périscolaire','Petits Bouts De Choux' );

	public function __construct($p) {
				$this->titre = $p;
	}
	
	public function __get($prop) {
		switch ($prop)
		{
			case 'titre' : {
				return $this->titre;
				break;
			}
		}
		
	}

	public function __set($propriete, $valeur) {
		switch ($propriete) {
			case 'css' : {
				$this->css[count($this->css)+1] = $valeur;
				break;
			}
			case 'js' : {
				$this->js[count($this->js)+1] = $valeur;
				break;
			}
			case 'metakeyword' : {
				$this->metakeyword[count($this->metakeyword)+1] = $valeur;
				break;
			}
			case 'titre' : {
				$this->titre = $valeur;
				break;
			}
			case 'menu' : {
				$this->menu = $valeur;
				break;
			}
			case 'metadescription' : {
				$this->metadescription = $valeur;
				break;
			}
			case 'right_sidebar' : {
				$this->right_sidebar = $this->right_sidebar.$valeur;
				break;
			}
			case 'left_sidebar' : {
				$this->left_sidebar = $this->left_sidebar.$valeur;
				break;
			}

		}
	}
	/******************************Gestion des styles **********************************************/
	/* Insertion des feuilles de style */
	private function affiche_style() {
		foreach ($this->css as $s) {
			echo "<link rel='stylesheet'  href='css/".$s.".css' />\n";
		}

	}
	/******************************Gestion du javascript **********************************************/
	/* Insertion  js */
	private function affiche_javascript() {
		foreach ($this->js as $s) {
			echo "<script src='js/".$s.".js'></script>\n";
		}
	}
	/******************************affichage metakeyword **********************************************/

	private function affiche_keyword() {
		echo '<meta name="keywords" content="';
		foreach ($this->metakeyword as $s) {
			echo utf8_encode($s).',';
		}
		echo '" />';
	}	
	/****************************** Affichage de la partie entÃªte ***************************************/	
	//TODO : faire le H3
	protected function affiche_entete() {
		echo'
			<header class="page-header hidden-xs hidden-sm">
				<div class="row">
    				<div class="col-xs-3">
    					<img class="img-responsive" src="./image/logo.jpg" alt="logo"/>
					</div>
    				<div class="col-xs-9">
						<h1>
							Kaliémie
						</h1>
						<h3>
							
						</h3>
 					</div>
				</div>
			</header>
			<header class="page-header hidden-md hidden-lg">
				<div class="row">
				    <div class="col-xs-12">
						<h1>
							Kaliémie
						</h1>
						<h3>
							<!-- texte pour plus tard -->
						</h3>    
  					</div>
				</div>
            </header>	
		';
	}
	/****************************** Affichage du menu ***************************************/	
	
	protected function affiche_menu() {
		echo '
				<ul class="nav navbar-nav">
					<li class="active"><a   href="index.php" >Accueil </a></li>
					<li><a   href="reglement.php" >Le reglement</a></li>
				</ul>
				';
	}
	protected function affiche_menu_connexion() {
		
		if(!(isset($_SESSION['id']) && isset($_SESSION['type'])))
		{	
			echo '
					<ul class="nav navbar-nav navbar-right">
						<li><a  href="connect.php">Connexion</a></li>
					</ul>';
		} 
		else
		{
			echo '
					<ul class="nav navbar-nav navbar-right">
				<li><a  href="deconnect.php">Déconnexion</a></li>
					</ul>';
		}
		
	}
	public function affiche_entete_menu() {
		echo '
				<div id="menu_horizontal">
					<nav class="navbar navbar-inverse">
						<div class="container-fluid">
				    		<div class="navbar-header">
      							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"  data-target="#monmenu" aria-expanded="false">
        							<span class="sr-only">Toggle navigation</span>
        							<span class="icon-bar"></span>
        							<span class="icon-bar"></span>
        							<span class="icon-bar"></span>
      							</button>
								<p class="visible-xs navbar-text"><mark>Menu</mark></p>
    						</div>
							<div class="collapse navbar-collapse" id="monmenu">
				';
						
	}
	public function affiche_footer_menu(){
		echo '
						
					
				</div>
			</nav>
		</div>';

	}

		/****************************************** remplissage affichage colonne ***************************/
	public function rempli_right_sidebar() {
		return'

			
				<article>
					<h3>Ptits-Bouts-De-Choux</h3>
										<p>12 rue des gones</br>
										49000 ANGERS</br>
										Tel : 02.41.27.11.71</br>
										Mail : pbdc49@gmai.com</p>
										
											<a  href="contact.php" class="button">Contact</a>
                </article>
				';
							
	}
	
	/****************************************** Affichage du pied de la page ***************************/
	private function affiche_footer() {
		echo '
		<!-- Footer -->
			<footer>
				<p>PPE4 - almapacasa</p>
            </footer>
		';
	}


	
	/********************************************* Fonction permettant l'affichage de la page ****************/

	public function affiche() {
		
		
		?>
			<!DOCTYPE html>
			<html lang='fr'>
				<head>
					<title><?php echo $this->titre; ?></title>
					<meta http-equiv="content-type" content="text/html; charset=utf-8" />
					<meta name="description" content="<?php echo $this->metadescription; ?>" />
					<meta http-equiv="X-UA-Compatible" content="IE=edge">
					<meta name="viewport" content="width=device-width, initial-scale=1">
					<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
					<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
					<!--[if lt IE 9]>
					<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
					<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
					<![endif]-->
					
					<?php $this->affiche_keyword(); ?>
					<?php $this->affiche_javascript(); ?>
					<?php $this->affiche_style(); ?>
				</head>
				<body>
				<div class="global container-fluid">
				
						<?php $this->affiche_entete(); ?>
						<?php $this->affiche_entete_menu(); ?>
						<?php $this->affiche_menu(); ?>
						<?php $this->affiche_menu_connexion(); ?>
						<?php $this->affiche_footer_menu(); ?>
						
  						<div class="row">
						    <div class="col-md-8">
						    	<?php echo $this->left_sidebar; ?>
						    </div>
						    <div class="col-md-4">
								<?php echo $this->right_sidebar;?>
						    </div>
						</div>
						<?php $this->affiche_footer(); ?>
					</div>
				</body>
			</html>
		<?php
	}

}

?>
