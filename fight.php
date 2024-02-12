<?php

include './config/Autoload.php';
require("./classes/HeroesManager.php");
require("./config/db.php");
require_once './classes/FightsManager.php';
require_once './classes/Monster.php';


$fightManager = new FightsManager();


$monster = $fightManager->createMonster();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <link rel="stylesheet" href="style.css">
    <style>
  @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');
  body{

    background-image: url("./images/SSBU-Pokémon_Stadium_2.webp");
    font-family: 'Press Start 2P', cursive;
    font-size: 15px;
  }

  .logs {
    margin-bottom: 10px;
    padding: 5px;
    background-color: #f2f2f2;
    border-radius: 5px;
}




.boxes {
    display: flex;
    flex-direction: row; 
}

.herobox, .evilbox {
    text-align: center;
}

.evil {
    width: 100px; 
    height: auto; 
}

</style>
</head>
<body>
    <?php



    $heroesManager = new HeroesManager($db);


    $heroId = $_POST['hero_id']; 
    


    $selectedHero = $heroesManager->find($heroId);
 

    
$heroesManager = new HeroesManager($db);
$hero = $heroesManager->find($_POST["hero_id"]);




 

$fightManager = new FightsManager;
$monster = $fightManager->createMonster();
$fightResults = $fightManager->fight($hero, $monster);
$heroesManager->update($hero);


foreach ($fightResults as $result) { ?>

<div class="logs" >
    <p ><?php echo $result ?></p>
</div>
    
<?php }


    ?>

    <div class="boxes">
    <div class="herobox">

    <img src="./images/hakari_dance_by_aximbin_dgffbct-fullview.png">

    </div>

    <div class="evilbox">

    <img src="./images/PikPng.com_blue-flame-png_840679.png" class="evil">


    </div>
    </div>

<a button id="use-character-button" href="index.php" > Retour à l'accueil</a>
</body>
</html>