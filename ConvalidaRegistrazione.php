<!DOCTYPE html>
<html>
	<head>
  		<title>
        	Convalida Registrazione
        </title>
        <?php
        	function ControlloPassword()
            	{
                	if ($_POST['password'] == $_POST['ripetiPassword'])
                    	return true;
                    else
                    	return false;
                }

            function ControlloPresenzaAccount()
            	{
                	$account = fopen("Utenti/".$_POST['id'], "r");
                    if ($account == null)
                    	return true;
                    else
                        return false;
               	}

            function CreaAccount()
            	{
                	$account = fopen("Utenti/".$_POST['id'], "w");
                    fwrite($account, $_POST['password']);
                    fclose($account);
                    echo "<h1> Account Registrato con Successo! </h1>";
                }
        ?>
	</head>

	<body>
    	<?php
			if (!ControlloPassword())
            	echo "<h1> Le due Password non Corrispondono </h1>";
            else
      	            if (ControlloPresenzaAccount())
												if (preg_match('/^[a-z0-9A-Z]{6,12}$/', $_POST['id']))
														CreaAccount();
												else
														echo "Registrazione Fallita!<BR/>Requisiti Nome:<BR/>- Non presenti caratteri speciali.<BR/>- Minimo 6 elementi.<BR/>- Massimo 12 elementi.";
                    else
  	                 	echo "<h1> Il nome utente e' gia' utilizzato </h1>";
        ?>

        <a href="http://cinquinidavide1996.altervista.org/ProvaLogin/login.html">Torna alla Pagina di Login</a>

    </body>
</html>
