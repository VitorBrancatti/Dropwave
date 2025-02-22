<?php include_once("cabec.php"); ?>
<style>
	.card {
  width: 170px;
  height: 234px;
  background: black;
  position: relative;
  display: flex;
  place-content: center;
  place-items: center;
  overflow: hidden;
  border-radius: 20px;
}

.card h2 {
  z-index: 1;
  color: white;
  font-size: 1.5em;
}

.card::before {
  content: '';
  position: absolute;
  width: 100px;
  background-color: rgb(175, 0, 219);
  height: 130%;
  animation: rotBGimg 10s linear infinite;
  transition: all 0.2s linear;
}

@keyframes rotBGimg {
  from {
    transform: rotate(0deg);
  }

  to {
    transform: rotate(360deg);
  }
}

.card::after {
  content: '';
  position: absolute;
  background: black;
  ;
  inset: 5px;
  border-radius: 15px;
}  
/* .card:hover:before {
  background-image: linear-gradient(180deg, rgb(81, 255, 0), purple);
  animation: rotBGimg 3.5s linear infinite;
} */


</style>
	<p>&nbsp;</p>

	<h2 align="center" class="cor_texto"><?php echo $lng['selecioneIdioma']; ?></h2>

	<p>&nbsp;</p>

	<div class="container">
		<div class="row row-cols-lg-8 row-cols-sm-6 g-4">
			<div class="col">
				<div class="card">
					<h2><a href="idiomaSeleciona.php?idioma=pt_BR"><img src="./icones/pt_BR.png" width="100px"></a></h2>
					<h2><?php echo $lng['portugues']; ?></h2>
				</div>
			</div>
			
			<div class="col">
			<div class="row row-cols-lg-8 row-cols-sm-6 g-4">
			<div class="col">
				<div class="card">
					<h2><a href="idiomaSeleciona.php?idioma=en_US"><img src="./icones/en_US.png" width="100px"></a></h2>
					<h2><?php echo $lng['ingles']; ?></h2>
				</div>
			</div>
					
				</div>
			</div>
			
			<div class="col">
			<div class="row row-cols-lg-8 row-cols-sm-6 g-4">
			<div class="col">
				<div class="card">
					<h2><a href="idiomaSeleciona.php?idioma=es_ES"><img src="./icones/es_ES.png" width="100px"></a></h2>
					<h2><?php echo $lng['espanhol']; ?></h2>
				</div>
			</div>
					
				</div>
			</div>

			
			<div class="col">
			<div class="row row-cols-lg-8 row-cols-sm-6 g-4">
			<div class="col">
				<div class="card">
					<h2><a href="idiomaSeleciona.php?idioma=fr_FR"><img src="./icones/fr_FR.png" width="100px"></a></h2>
					<h2><?php echo $lng['frances']; ?></h2>
				</div>
			</div>
					
				</div>
			</div>
			
			<div class="col">
			<div class="row row-cols-lg-8 row-cols-sm-6 g-4">
			<div class="col">
				<div class="card">
					<h2><a href="idiomaSeleciona.php?idioma=it_IT"><img src="./icones/it_IT.png" width="100px"></a></h2>
					<h2><?php echo $lng['italiano']; ?></h2>
				</div>
			</div>
					
				</div>
			</div>
			
			<div class="col">
			<div class="row row-cols-lg-8 row-cols-sm-6 g-4">
			<div class="col">
				<div class="card">
					<h2><a href="idiomaSeleciona.php?idioma=de_DE"><img src="./icones/de_DE.png" width="100px"></a></h2>
					<h2><?php echo $lng['alemao']; ?></h2>
				</div>
			</div>
					
				</div>
			</div>
		</div>
		
	</div>

	<p>&nbsp;</p>
	
<?php include_once("rodape.php"); ?>