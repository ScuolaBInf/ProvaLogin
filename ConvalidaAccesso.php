<!DOCTYPE html>
<html>
	<head>

        <title>
        	Pannello Utente
        </title>

        <style>
			table, th, td
				{
					border: 1px solid black;
					border-collapse: collapse;
				}
		</style>

        <?php
        	function ControlloPassword()
            	{
                	$account = fopen("Utenti/".$_POST['id'], "r");

                	if ($_POST['password'] == fgets($account))
                    	return true;
                    else
                    	return false;
                }

            function ControlloPresenzaAccount()
            	{
                	$account = fopen("Utenti/".$_POST['id'], "r");

                    if ($account == null || $_POST['id'] == "")
                    	{
                        	echo "<h1> Account ".$_POST['id']." non presente </h1>";
                        	return true;
                        }
                    else
                        return false;
               	}

            function IndicizzaDiscussioni()
            	{
                	$nomi = array();

                	$indice = fopen("Discussioni/"."discussioni", "r");
                    for ($i = 0; !feof($indice); $i++)
                    	$nomi[$i] = fgets($indice);
                    fclose($indice);

                    return $nomi;
                }

            function TabellaDiDiscussioni()
            	{
                	echo "<table>";
                    	StampaIntestazioneTabella();
  						StampaCorpoTabella(IndicizzaDiscussioni());
					echo "</table>";
                }

            function StampaForm()
            	{
                    echo "</BR>";
                    echo "<form name='CreaPost' action = 'CreaPost.php' method = 'POST'>";
                    echo "<input type='submit' value='Crea Discussione'/>";
                    echo "<input type='hidden' name='id' value='".$_POST['id']."'/>";
                    echo "<form>";
                }

			function StampaIntestazioneTabella()
            	{
                    echo "<tr>";
                     	echo "<th>";
                           	echo "Numero";
                        echo "</th>";
                        echo "<th>";
                          	echo "Nome Discussione";
                        echo "</th>";
                        echo "<th>";
                           	echo "Visualizzazioni";
                        echo "</th>";
                        echo "<th>";
                           	echo "Nickname creatore";
                        echo "</th>";
												echo "<th>";
														echo "Seleziona";
												echo "</th>";
                    echo "</tr>";
                }

			function StampaCorpoTabella($nomi)
            	{
                	for ($j = 0; $j < count($nomi) - 1; $j++)
                       	{
                           	echo "<tr>";
                               	echo "<td><center>";
                                   	echo $j+1;
                                echo "</center></td>";
                               	echo "<td>";
                                   	sscanf($nomi[$j], "%s", $nomi[$j]);
                           			echo "<a href=\"\ProvaLogin/Discussioni/RichiestaTesto.php?link=".$nomi[$j]."&\"\>".$nomi[$j]."</a> ";
                               	echo "</td>";

                                $file = fopen("Discussioni/".$nomi[$j], "r");
                           		echo "<td><center>";
                                	echo fgets($file);
                               	echo "</center></td>";
                           		echo "<td>";
                                	echo fgets($file);
                               	echo "</td>";
                                fclose($file);
																echo "<td>";
																echo "<center>";
																echo "<input type='checkbox' name='select' value='".$nomi[$j]."'>";
																echo "</center>";
																echo "</td>";
                            echo "</tr>";
						}
                }
        ?>
	</head>

	<body>
		<center>
    	<?php
						if (!preg_match('/^[a-z0-9A-Z]{6,12}$/', $_POST['id']) && $_POST['id'] != "root")
								{
										echo "Requisiti Nome:<BR/>- Non presenti caratteri speciali.<BR/>- Minimo 6 elementi.<BR/>- Massimo 12 elementi.";
								}
            else if (ControlloPassword() && !ControlloPresenzaAccount())
               	{
                	echo "<h2> Account: ". $_POST['id'] ."</h2>";
					TabellaDiDiscussioni();
					StampaForm();
				}
			else
            	echo "<h1> Password Sbagliata </h1>";
        ?>
			</center>
	</body>
</html>
