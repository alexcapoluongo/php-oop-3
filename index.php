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

$croccantelle = new Food('Cibo','croccantelle', 3, 'carne mista ovina', 200);
$pupazzo = new Game('Gioco', 'pupazzo', 20);
$woodhouse = new Bed('Cuccie', 'cuccia in legno', 50, '5x7');

$alex = new User('Alex Capoluongo', 'alex@gmail.com', false, date("2023-08-14"), 'italy');
$alex->addItemToCard($pupazzo);
$alex->addItemToCard($woodhouse);
$alex->getTotal();
$alex->getRegistered();
$alex->insertCard();

$frank = new User('Frank Poirot', 'ppp@gmail.com', false, date("2020-08-14"), 'france');
$frank->addItemToCard($woodhouse);
$frank->addItemToCard($woodhouse);
$frank->insertCard();

echo date('j F Y');

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
    <p><?php echo $croccantelle->printInfo() ?></p>
    <p><?php echo $pupazzo->printInfo()?></p>
    <p><?php echo $woodhouse->printInfo()?></p>
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

</body>
</html>