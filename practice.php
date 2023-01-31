<?php

include 'OOP.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

$car = new Car;

$car->change_brand('Vespa');

$color = new Color;

echo $color->add_color('red') . "<br/>";

?>
    
</body>
</html>



