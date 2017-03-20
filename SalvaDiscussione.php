<!DOCTYPE html>
<html>
	<head>
  		<title>
        	Convalida Registrazione
        </title>
        <?php
        	function ControlloNome()
            	{
                	$discussione = fopen("Discussioni/".$_POST['nomeDiscussione'], "r");
                    if ($discussione == null)
                    	return true;
                    else
                    	return false;
                }

            function SalvaDiscussione()
            	{
                	$discussione = fopen("Discussioni/".$_POST['nomeDiscussione'], "w");
                    fputs($discussione, "0\n");
                    if ($_POST['anoni'] == "NP")
                    	fputs($discussione, "Anonimo\n");
                    else
                    	fputs($discussione, $_POST['id']."\n");
                    fwrite($discussione, $_POST['testo']);
                    fclose($discussione);
                    $indiceDiscussioni = fopen("Discussioni/discussioni", "a");
                    fwrite($indiceDiscussioni, $_POST['nomeDiscussione']."\n");
                    fclose($indiceDiscussioni);
                    echo "<h2> Discussione Salvata con Successo </h2>";
               	}
        ?>
	</head>

	<body>

        <?php
        	if (ControlloNome())
							if (preg_match('/^[a-z0-9A-Z]{6,12}$/', $_POST['nomeDiscussione']))
            			SalvaDiscussione();
							else
									echo "Discussione non Salvata!<BR/>Requisiti Nome:<BR/>- Non presenti caratteri speciali.<BR/>- Minimo 6 elementi.<BR/>- Massimo 12 elementi.";
            else
            	echo "<h2> Nome Discussione gia' Presente </h2>";
        ?>

    </body>
</html>
