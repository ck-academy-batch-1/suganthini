<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prime Number</title>
</head>
<body>
    <?php
    for($a=2; $a<=100; $a++){
        for($b=2; $b<$a; $b++){
            if($a % $b == 0){
                break;
            }
        }
        if($b == $a){
            echo $a ."\n";
        }
    }
    ?>
    
    
</body>
</html>