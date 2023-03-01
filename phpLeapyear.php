<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leap Year</title>
</head>
<body>
    <h2>Leap year</h2>
    <?php
    for ($year=1850; $year<=1950; $year++)
    {
        if($year%4==0){
            echo "$year:  Leap year <br>";
        }
        else{
            echo"$year:  Not a Leap year <br>";
        }
    }
    ?>
    

    
</body>
</html>
