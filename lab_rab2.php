<?php  include "lib.inc.php"; ?>
<?php
$way = "";
$time = "";
$result = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $way = trim(strip_tags($_POST['way']));
    $time = trim(strip_tags($_POST['time']));
    $result = calculateSpeed($way, $time);
}

// return result in meters per second
function calculateSpeed($way, $time)
{
    if($time != 0) return $way / $time;
}

function toKilomitersPerHour($value)
{
    return $value * 3.59999712;
}

function toMilePerHour($value)
{
    return $value * 2.23694;
}

function showSpeedValue()
{
    global $result;
    if($result){
        echo "<p>Result: </p>";
        echo "<p>$result.m/s</p>";
        echo "<p>" . toKilomitersPerHour($result) . " km/h</p>";
        echo "<p>" . toMilePerHour($result) . " mile/h</p>";
    }
}

$array = array(
    1,
    2.,
    null,
    true,
    array(
        "a",
        "b",
        "c"
    )
);

function my_var_dump($array)
{
    $i = 0;
    foreach ($array as $value) {
        if (is_array($value)) {
            my_var_dump($value);
        } else {
            echo "<p>[$i] =><p>";
            echo "<p>" . gettype($value) . "($value)</p>";
            $i++;
        }
    }
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Главная</title>
	<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>

	<div id="container">
	<?php include "top.inc.php" ?>

	<?php include "menu.inc.php" ?>

		<div id="content">
        <form method="post">
            <h2><p>Лабораторная работа</p></h2>
		    Путь: <input type="text" name="way"> <br /> <br /> Время: <input
			type="text" name="time"> <br /> <br /> <input type="submit"
			value="Результат" />
	</form>
    <?php showSpeedValue(); ?>
    <<p> My dump: </p>>
    <?php my_var_dump($array); ?>
		</div>

		<div id="clear">
		</div>

		<?php include "bottom.inc.php" ?>
	</div>

</body>

</html>