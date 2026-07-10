<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>Hockey Tickets Homepage</title>
	</head>
	<body>
		<style>
			body {
			font-family: sans-serif;
			}	
			.Commande {
				border: solid black 1px;
				width: 100%;
				padding: 15px;
			}
			.Commande thead th {
				color: olive;
				font-size: x-large;
				text-align: left;
				padding-bottom: 15px;
			}
			.Commande td {
				font-size: large;
				padding: 5px;
			}
			
			.Tickets {
				border-top: solid black 2px;
				border-collapse: collapse;
				width: 100%;
				page-break-after: always;
			}
			.Tickets td {
				font-size: medium;
				background: transparent;
				border: dashed black 1px;
				padding: 7px;
			}
			.TickSup {
				font-size: large;
				text-align: center;
			}
			.TickInf {
				font-size: small;
			}
			img {
				background-color: transparent;
				background-image: none;
			}
			.Food {
				font-size: 72px;
				float: right;
				text-align: right;
				padding-right: 10px;
			}
			
			@media print  {
				.Tickets td {
					font-size: smaller;
					background: transparent;
					border: dashed black 1px;
					padding: 7px;
				}
				.TickSup {
					font-size: smaller;
					text-align: left;
					float: left;
				}
				.TickInf {
					font-size: smaller;
					text-align: left;
					float: left;
				}
				.Tickets {
					page-break-after: always;
				}	
			}
		</style>
		

	<?php
	$tarifAdulte = 15;
	$tarifEnfant = 12;
	
	$retourCommandes = getCommandesFromCSV();
		
	
	foreach($retourCommandes as $commande) { ?>
		
		<h1>Hockey Embourg - Barbecue 2026</h1>
			
		<table class="Commande">
			<caption></caption>
			<thead>
				<tr>
					<th><?php echo(strtoupper($commande[3]) . ", " . ucfirst($commande[4])); ?></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Repas Adulte</td>
					<td width="20%"><?php echo(intval($commande[8])); ?> x 15 €<td>
					<td width="15%"><?php echo(intval($commande[8]) * $tarifAdulte); ?> €</td>
				</tr>
				
				<tr>
					<td>Repas Enfants</td>
					<td><?php echo(intval($commande[9])); ?> x 12 €<td>
					<td><?php echo(intval($commande[9]) * $tarifEnfant); ?> €</td>
				</tr>
				<tr>
					<td><b>Total</b></td>
					<td></td>
					<td></td>
					<td><b><?php echo(intval($commande[8]) * $tarifAdulte + intval($commande[9]) * $tarifEnfant); ?> €</b></td>
				</tr>	
			</tbody>
		</table>	
		
		<table class="Tickets">
			<tbody>
				<!-- Ligne Enfants -->
				<?php for($x = 0; $x < intval($commande[9]); $x++) {  ?>
				<tr>
					<!-- <td width="30%">
						<span class="TickSup">Boisson Enfant<br>
						<?php echo(strtoupper($commande[3]) . ", " . ucfirst($commande[4])); ?>
							
						</span>
						<span class="Food">&#x1F354</span>
					</td> -->
					
					<td width="30%">
						<span class="TickSup">Repas Enfant<br>
						<?php echo(strtoupper($commande[3]) . ", " . ucfirst($commande[4])); ?>
							
						</span>
						<span class="Food">&#x1F354;&#x1F35F;</span>
					</td>
					
					<td width="30%">
						<span class="TickSup">Dessert Enfant<br>
						<?php echo(strtoupper($commande[3]) . ", " . ucfirst($commande[4])); ?>
							
						</span>
						<span class="Food">&#x1F369</span>
					</td>
				</tr>
			<?php } ?>
			
				<!-- Ligne Adulte -->
			<?php for($x = 0; $x < intval($commande[8]); $x++) {  ?>
			<tr>
				<!-- <td width="30%">
					<span class="TickSup">Boisson Adulte<br>
					<?php echo(strtoupper($commande[3]) . ", " . ucfirst($commande[4])); ?>
						
					</span>
					<span class="Food">&#x1F37B</span>
				</td> -->
				
				<td width="30%">
					<span class="TickSup">Repas Adulte<br>
					<?php echo(strtoupper($commande[3]) . ", " . ucfirst($commande[4])); ?>
						
					</span>
					<span class="Food">&#x1F354;&#x1F35F;</span>
				</td>
				<td width="30%">
					<!-- Ticket Vierge -->
				</td>

					
			</tr>
			
			<?php } ?>	
			</tbody>
		</table>
				
	<?php
	}
	?>

	<?php
	function getCommandesFromCSV() {
		$retourCommandes = array();
		$filePath = "BBQ26bis.csv";
		
		if (($handle = fopen($filePath, 'r')) !== false) {
			while (($data = fgetcsv($handle, 0, ';')) !== false) {
				$retourCommandes[] = $data;
			}
			fclose($handle);
		}
		return $retourCommandes;
	}
	?>	
	</body>
</html>
