<!DOCTYPE html>
<html>

	<head>

			<title>
					Crea Discussione
			</title>

			<style>

					.div-centrato
							{
									position:absolute;
									top:50%;
									left:50%;
									margin-top:-250px;
									margin-left:-450px;
									width:900px;
									height:500px;
							}

			</style>

			<?php
      		function FormMessage()
          		{
									echo "<form name='login' action = 'SalvaDiscussione.php' method = 'POST'>";
											echo "<center>";
                  				echo "<h1> Crea Discussione: </h1>";
            							echo "Nome Discussione:  <input type='text' name='nomeDiscussione' />";
            							echo "<BR/><BR/>";
            							echo "&nbsp <textarea name='testo' rows='6' cols='50'></textarea> &nbsp";
                  				echo "<input type='hidden' name='id' value='".$_POST['id']."'/>";
													echo "<BR/> <BR/>";
													echo "<input type='submit' value='Crea'/>";
													echo "<BR/> <BR/>";
											echo "</center>";

                  		echo "<input type='radio' name='anoni' value='P' checked='true'/> Pubblica con il Proprio Nome Utente <BR/>";
											echo "<input type='radio' name='anoni' value='NP'/> Pubblica in Anonimo";
											echo "<BR/>";
											echo "<BR/>";

                  echo "</form>";
              }
			?>


	</head>

	<body>
			<center>
					<div class="div-centrato">
							<table style="border: 1px solid black;">
									<td>
        							<?php
            							if ($_POST['id'])
															FormMessage();
                					else
                							echo "<t1>Errore </t1>";
            					?>
									</td>
							</table>
					</div>
			</center>
   </body>

</html>
