<!DOCTYPE html>
<html>
<head>
	<title>Calculatrice</title>
	<style type="text/css">
	.cal{
		font-size: 20px;
		margin-bottom: -10px;
		font-weight: bolder;
		font-family: tahoma;
		color: white;
		padding-top: 10px;
	}
		form{
			background-color: lightblue;
			width: 550px;
			height: 300px;
			border-radius: 10px;
			text-align: center;
		}
		input,select{
			border-radius: 5px;
			border: none;
			text-align: center;
			margin-top: 40px;
			height: 30px;
			background-color: white;
		}
		input .egal{
			width: 40px;
		}
		textarea{
			border: none;
			border-radius: 5px;
		}
	</style>

</head>

<body>
<form action='' name="calcul" method='POST'>
<p class="cal"> Calculatrice </p>
<input name="nombre1" value="<?php if (isset($_POST['nombre1'])){echo $_POST['nombre1'];} ?>">
<select name="selection">
<option value="+">+</option>
<option value="-">-</option>
<option value="/">/</option>
<option value="*">*</option>
</select>
<input name="nombre2" value="<?php if (isset($_POST['nombre2'])){echo $_POST['nombre2'];} ?>">
<input class="egal" type="submit" value="="/>
<br>

<?php

if(isset($_POST['nombre1']) && isset($_POST['selection']) && isset($_POST['nombre2'])) 
{
    $nombre1 = htmlentities($_POST['nombre1']); 
    $selection = htmlentities($_POST['selection']);
    $nombre2 = htmlentities($_POST['nombre2']);
    $_POST['nombre1'] = str_replace(".", ",",$_POST['nombre1']);
    $_POST['nombre2'] = str_replace(".", ",",$_POST['nombre2']);
 	
    if (is_numeric($_POST['nombre1']) AND is_numeric($_POST['nombre2'])) {
    }else{
    	echo "Ce n'est pas un nombre";}
    }
	    if($_POST['nombre1'] != NULL AND $_POST['nombre2'] != NULL) 
	    {
	        if($_POST['nombre1'] == '/' AND $_POST['nombre2'] == 0)
	        {
	            echo 'Tu ne peux pas diviser par 0 !';
	        }
	        else
	        {  
	            if($_POST['selection'] == '+'){
	            $_POST['$resultat'] = $_POST['nombre1'] + $_POST['nombre2'];
	            $_POST['$resultat'] = str_replace(".",",",$_POST['$resultat']);
	            
	            }
	             
	            if($_POST['selection'] == '-') {
	            $_POST['$resultat'] = $_POST['nombre1'] - $_POST['nombre2'];
	            $_POST['$resultat'] = str_replace(".",",",$_POST['$resultat']); 
	            }
	             
	            if($_POST['selection'] == '*'){  
	            $_POST['$resultat'] = $_POST['nombre1'] * $_POST['nombre2'];
	            $_POST['$resultat'] = str_replace(".",",",$_POST['$resultat']);
	            }
	         
	            if($_POST['selection'] == '/'){
	            $_POST['$resultat'] = $_POST['nombre1'] / $_POST['nombre2'];
	            $_POST['$resultat'] = str_replace(".",",",$_POST['$resultat']);
	            }
	        }
	    }
	    else
	    {
	    echo '<br>';
	    echo 'Pensez à donner deux chiffres !';
	    }
?>
<p>
	<textarea name="bloup" cols="50" rows="10">
		<?php echo $_POST[$resultat];?>
	</textarea>
</p>
</form>
</body>
</html>