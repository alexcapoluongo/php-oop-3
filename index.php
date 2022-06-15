<?php 
// L'e-commerce vende prodotti per gli animali.
// I prodotti saranno oltre al cibo, anche giochi, cucce, etc.
// L'utente potrà sia comprare i prodotti senza registrarsi, oppure iscriversi e ricevere il 20% di sconto su tutti i prodotti.
// Il pagamento avviene con la carta di credito, che non deve essere scaduta.

//CREARE una classe product separata -> non andra in index
//CREARE classi figlie che importano product -> andranno in index

require_once __DIR__ . "/Food.php";
require_once __DIR__ . "/Game.php";
require_once __DIR__ . "/Bed.php";
require_once __DIR__ . "/User.php";

$croccantelle = new Food('Cibo','croccantelle', 3, true, 'carne mista ovina', 200);
$pupazzo = new Game('Gioco', 'pupazzo', 20, true);
$woodhouse = new Bed('Cuccie', 'cuccia in legno', 50, false, '5x7');

$alex = new User('Alex Capoluongo', 'alex@gmail.com', false, date("2023-08-14"), 'Italy', 'Lombardia', 'via Lenin 4', 34040);
try {
    $alex->addItemToCard($pupazzo); 
} catch (Exception $e) {
    var_dump($e->getMessage());
    echo 'Alex, questo prodotto: <br><b>' .  $pupazzo->name . '</b><br>' . 'non è disponibile <br>';
}

try {
    $alex->addItemToCard($woodhouse); 
} catch (Exception $e) {
    var_dump($e->getMessage());
    echo 'Alex, questo prodotto: <br><b>' .  $woodhouse->name . '</b><br>' . 'non è disponibile <br>';
}

$alex->getTotal();
$alex->getRegistered();
$alex->insertCard();

$frank = new User('Frank Poirot', 'ppp@gmail.com', true, date("2020-08-14"), 'France', 'Corsica', 'rue D\'Avois 23', 3990);

try {
    $frank->addItemToCard($croccantelle);
    $frank->addItemToCard($woodhouse); 
} catch (Exception $e) {
    echo 'Frank, questo prodotto: <br><b>' . $woodhouse->name . '</b><br>' . 'non è disponibile';
}

$frank->insertCard();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce</title>
</head>
<body>

    <h3>Nel carrello di Alex ci sono: </h3>
    <ul><?php foreach($alex->cart as $item) 
            {
                echo '<li>' . $item->printInfo() . '</li>';
            } 
    ?></ul>
    <p><?php echo "il carrello totale è  di" . " " . $alex->getTotal()?></p>
    <p><?php echo $alex->insertCard() ?></p>
    <p><?php echo $alex->printAddress() ?></p>

    <!-- test su frank -->
    <h3>Nel carrello di Frank ci sono: </h3>
    <ul><?php foreach($frank->cart as $item) 
            {
                echo '<li>' . $item->printInfo() . '</li>';
            } 
    ?></ul>
    <p><?php echo "il carrello totale è  di" . " " . $frank->getTotal() . "€"?></p>
    <p><?php echo $frank->insertCard() ?></p>
    <p> <?php echo $frank->printAddress() ?> </i></p>

</body>
</html>