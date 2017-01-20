

<br>
<br>
<center>
<?php    //nazwa obrazka


		$fileobrazek="nazwaobrazka.txt";
	$fp10 = fopen($fileobrazek, "r");
	//fread($fpobrazek, "$nro");
	$nro = fread($fp10, 100);
	fclose($fp10);
				$nro=$nro+1;
		

	if ($_FILES['obrazek']['type'] == 'image/jpeg'){

	$plik_tmp = $_FILES['obrazek']['tmp_name'];
	$plik_nazwa = $nro;
	$plik_rozmiar = $_FILES['obrazek']['size'];
$flag=0;
	if(is_uploaded_file($plik_tmp)) {
     	move_uploaded_file($plik_tmp, "photos/$plik_nazwa.jpg"); }}
	else{ printf("Zły format pliku");
    $flag=1;
	}
			

	//zapisanie nazwy
	$fp11 = fopen($fileobrazek, "w");
	fwrite($fp11, "$nro");
	fclose($fp11); 

if($flag == 0){
//DODANIE DO BAZY

    try
	{
		$pdo = new PDO('mysql:host=serwer1663009.home.pl;dbname=21680363_0000014;','21680363_0000014', 'niewiem1234');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $nro2 = '<img src="photos/' . $nro.'.jpg" width="200" height="100" />';

		$liczba = $pdo->exec('INSERT INTO `tabela2` (`Nazwa`, `Numerkatalogowy`, `Stan`, `Opis`, `Obraz`, `Cena`)	VALUES(
			\''.$_POST['Nazwa'].'\',
                \''.$_POST['Numer'].'\',
                    \''.$_POST['Stan'].'\',
                        \''.$_POST['Opis'].'\',
			\''.$nro2.'\',
			\''.$_POST['Cena'].'\')');
			
echo "DODANO OFERTE<br><br>";
printf ("<a href=\"index.php?id=strona2\">POWROT DO OFERT</a><br><br>");    

	}
	catch(PDOException $e)
	{
		echo 'Wystąpił błąd biblioteki PDO: ' . $e->getMessage();
	}
}
?>
</center>