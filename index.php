<?php
$n1="";
$n2="";
$operazione="";
$risultato=null;
$erroren1=null;
$erroren2=null;
$erroreop=null;
if ($_SERVER["REQUEST_METHOD"]=="GET") {
    $n1 = isset($_GET["1cifra"]) ? floatval($_GET["1cifra"]) : 0;
    $n2 =isset($_GET["2cifra"]) ? floatval($_GET["2cifra"]) : 0;
    $operazione = isset($_GET['Op']) ? $_GET['Op'] : "";
    $asso=isset($_GET["assoluto"]);
    $quad=isset($_GET["quadrato"]);
    $arro=isset($_GET["arrotondo"]);
    // if(in_array("absolute", $_GET["Op"])) per controllare se esiste nell'array
    if ($operazione=="") {
        $erroreop="Inserisci un operazione valida";
    }
    if (!is_numeric($n1)) {
        $erroren1="Inerisci un numero valido";
    }
    if (!is_numeric($n2)) {
        $erroren2="Inerisci un numero valido";
    }
        if($operazione !== "" && in_array("somma", $operazione)) {
        $risultato=$n1+$n2;
    }
    if($operazione !== "" && in_array("sottrazione", $operazione)) {
        $risultato=$n1-$n2;
    }   
    if($operazione !== "" && in_array("moltiplicazione", $operazione)) {
        $risultato=$n1*$n2;
    }
    if($operazione !== "" && in_array("divisione", $operazione)) {
        $risultato=$n1/$n2;
    }    
    if ($risultato !== null) {
            if ($quad) {
                $risultato = pow($risultato, 2);
            }
            if ($asso) {
                $risultato = abs($risultato);
            }
            if ($arro) {
                $risultato = round($risultato, 2);
            }
        }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="GET" action="index.php">
        <h1>Calcolatrice</h1>
        <p>a:<input type="number" name="1cifra"></p>
        <p>b:<input type="number" name="2cifra"></p>
        <fieldset style="width:300px;">
            <legend>Operazione</legend>
            <div><input id="A" type="radio" name="Op[]" value="somma"><label for="A">somma</label></div>
            <div><input id="S" type="radio" name="Op[]" value="sottrazione"><label for="S">sottrazione</label></div>
            <div><input id="M" type="radio" name="Op[]" value="moltiplicazione"><label for="M">moltiplicazione</label></div>
            <div><input id="D" type="radio" name="Op[]" value="divisione"><label for="D">divisione</label></div>
        </fieldset>
        <fieldset style="width:300px;">
            <legend>Opzioni</legend>
            <div><input id="abs" name="assoluto" type="checkbox" value="ass"><label for="abs">valore assoluto</label></div>
            <div><input id="square" name="quadrato" type="checkbox" value="sq"><label for="square">quadrato</label></div>
            <div><input id="round" name="arrotondo" type="checkbox" value="rou"><label for="round">arrotonda a 2 decimali</label></div>
        </fieldset>
        <input type="submit" value="Calcola">
    </form>
        <?php if ($risultato !== null): ?>
        <div>
            <p>RISULTATO: <?php echo $risultato; ?></p>
        </div>
    <?php endif; ?>
</body>
</html>