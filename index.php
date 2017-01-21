<?php
ob_start();
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="Stylesheet" type="text/css" href="paint.css" />
    <title>Serwer Plików</title>
</head>

<body>

<header id="header">
  <h2> Serwer Plików
</header>

</head>
<body>

</body>
</html>

<a href="https://serwer1663009.home.pl/z12/rejestracja.html"><input type="button" value="Rejestracja" style="position: relative; left: 0; top: 10" /></a><br>
<a href="https://serwer1663009.home.pl/z12/login.html"><input type="button" value="Logowanie" style="position: relative; left: 0; top: 20" /></a><br>
<a href="https://serwer1663009.home.pl/z12/wyslij.html"><input type="button" value="Wyślij plik" style="position: relative; left: 0; top: 30" /></a><br>


<?php
session_start();

if ( isset($_SESSION['log']) )
{
// nawiazujemy polaczenie
$connection = @mysql_connect('serwer1663009.home.pl', '21680363_0000008', 'niewiem1234')
// w przypadku niepowodznie wyświetlamy komunikat
or die('Brak połączenia z serwerem MySQL.<br />Błąd: '.mysql_error());
mysql_query("SET CHARSET utf8");
// połączenie nawiązane ;-)
// nawiązujemy połączenie z bazą danych
$db = @mysql_select_db('21680363_0000008', $connection)
// w przypadku niepowodzenia wyświetlamy komunikat
or die('Nie mogę połączyć się z bazą danych<br />Błąd: '.mysql_error());
// połączenie nawiązane ;-)
// zamykamy połączenie
//mysql_close($connection);

$id = $_SESSION['log'];

$query = "SELECT * FROM TAB_USER WHERE ID='$id'";
$wynik = mysql_fetch_row( mysql_query( $query ) );


print '<br/><br/><br/>Zalogowany jako: '.$wynik[1];
}
ob_end_flush();

echo '<br><br>';

if(isset($_SESSION['logged'])){
foreach (new DirectoryIterator('photos') as $fileInfo) {
    echo '<br>';
    echo '<a href="photos/'.$fileInfo->getFilename().'">'.$fileInfo->getFilename().'</a>';
}
}

?>
