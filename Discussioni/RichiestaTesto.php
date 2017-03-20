<!DOCTYPE html>
<html>
	<head>
  		<title>
        	Convalida Registrazione
        </title>
        <?php
        	function Stampa()
            	{
                	$testo = fopen($_GET['link'], "r");
                    
                    $num = 0;
                    fscanf($testo, "%d", $num);
                    fgets($testo);
                    $num++;
                    
                    while(!feof($testo))
                    	{
                        	echo fgets($testo);
                            echo "<BR/>";
                        }
     
                    fclose($testo);
                    
                    $testo = fopen($_GET['link'], "r");
                    $contenuto = array();
                    
                    fgets($testo);
                    for ($int = 0; !feof($testo); $int++)
                    	$contenuto[$int] = fgetc($testo);
                        
                    fclose($testo);
                    
                    $testo = fopen($_GET['link'], "w");
                    
                    fprintf($testo, "%d\n", $num);
                    for ($int = 0; $int < count($contenuto); $int++)
                    	fputs($testo, $contenuto[$int]);
                        
                    fclose($testo);
                }
        ?>
	</head>

	<body>
    	<?php Stampa(); ?>
	</body>
</html>