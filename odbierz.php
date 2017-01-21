 <link rel="Stylesheet" type="text/css" href="paint.css" />
<?php 
if (is_uploaded_file($_FILES['plik']['tmp_name']))
{ 
echo 'Odebrano plik: '.$_FILES['plik']['name'].'<br/>'; move_uploaded_file($_FILES['plik']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/z12/photos/'.$_FILES['plik']['name']);
} 
else {echo 'Błąd przy przesyłaniu danych!';} ?>

<br/><a href="index.php"> Wróć </a>
