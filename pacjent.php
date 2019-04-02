<?php 

$db=mysqli_connect('localhost','root','','przychodnia');

?>


<!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="przychodnia.css">
    <title>Przychodnia</title>

</head>
<body>
<header>

        PRAKTYKA LEKARZA RODZINNEGO
</header>

<div id='left' class='mid'>
    <div class="left-title">LISTA PACJENTÓW</div>
    <?php 
    $query='SELECT id, imie, nazwisko FROM pacjenci';
    $res=mysqli_query($db,$query);

    while($x=mysqli_fetch_array($res))
    {
        echo "{$x['id']}.{$x['imie']} {$x['nazwisko']}<br>";
    }


    ?>
    <br><br>
    <form method="POST" action='pacjent.php'>
        <label>Podaj id:<br>
        <input type="number" min='1' name='id_pacjent'></label><input type='submit' value="Pokaż dane"> 

    </form>
    <h3>LEKARZE</h3>
    <ul>
        <li>pn-śr
            <ol>
                <li> Anna Kwiatkowska</li>
                <li> Jan Kowalewski</li>
            </ol>
        </li>
        <li>czw-pt
            <ol>
                <li> Krzysztof Nowak</li>
               
            </ol>
        </li>
    </ul>

</div>

<div id='right' class='mid'>
        <h2>INFORMACJE SZCZEGÓŁOWE O PACJENCIE</h2>
       
        <?php
      
        if(isset($_POST['id_pacjent']))
        {
        $query="SELECT  imie, nazwisko, uczulenia, choroba FROM pacjenci WHERE id='{$_POST['id_pacjent']}'";
        $res=mysqli_query($db,$query);
    
        $x=mysqli_fetch_array($res);
        
            echo "<p>Imię i nazwisko: {$x['imie']} {$x['nazwisko']}</p><p> Choroby przewlekłe: {$x['choroba']}</p><p>Uczulenia: {$x['uczulenia']}</p>";
            
        }
        
    
 ?>
 </div>
<section>
<p>Utworzone przez: 01000011 01001001 01001111 01010100 01000101</p>
<a href='#'>Pobierz plik z kwerendami</a>
</section>
</body>


<?php
mysqli_close($db);
?>

 </html>