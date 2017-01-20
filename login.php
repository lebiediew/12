<?php
ob_start();
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="Stylesheet" type="text/css" href="pit.css" />
    <title>Forum</title>
</head>

<?php
session_start();
// nawiazujemy polaczenie
$connection = @mysql_connect('serwer1663009.home.pl', '21680363_0000014', 'niewiem1234')
// w przypadku niepowodznie wyświetlamy komunikat
or die('Brak połączenia z serwerem MySQL.<br />Błąd: '.mysql_error());
// połączenie nawiązane ;-)
echo "Udało się połączyć z serwerem!<br />";
// nawiązujemy połączenie z bazą danych
$db = @mysql_select_db('21680363_0000014', $connection)
// w przypadku niepowodzenia wyświetlamy komunikat
or die('Nie mogę połączyć się z bazą danych<br />Błąd: '.mysql_error());
// połączenie nawiązane ;-)
echo "Udało się połączyć z bazą dancych!";
// zamykamy połączenie
//mysql_close($connection);
print '<br/>';

if ( isset($_POST['nazwa_uzytkownika']) && isset($_POST['haselko']) )
{
    //print '<font size="5"> Rejestracja zakonczona sukcesem!</font>';
    //wyciaganie informacji o danym uzytkowniku
    $nazwa = $_POST['nazwa_uzytkownika'];
    $haslo = $_POST['haselko'];
    $query = "SELECT * FROM TAB_USER WHERE NAZWA='$nazwa' AND HASLO='$haslo'";
    $wynik = mysql_fetch_row( mysql_query( $query ) );
    
    print '<font size="5"> Pomyslnie zalogowano jako '.$wynik[1].'!</font>
    <br/><a href="index.php"> Wróć </a>';
    
    $_SESSION['log'] = $wynik[0];
    $_SESSION['logged'] = true;
    
    //$query = "INSERT INTO TAB_USER (ID, NAZWA, HASLO) VALUES ('$id','$nazwa','$haslo')";
    //mysql_query( $query ) or die('Błąd: '.mysql_error());
}
else
{
    print 'nie wprowadzono danych! <a href="/index.html> Wróć </a>';
}
ob_end_flush();

?>