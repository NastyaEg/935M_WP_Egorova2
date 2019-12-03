<?php
$menu = array( 
    "Главная" => "index.php", 
    "Работа №1" => "lab_rab1.html", 
    "Работа №2" => "lab_rab2.php"
);
?>

<ul id="menu">
    <?php getMenu($menu);?>
</ul>
