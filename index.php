<?php
// definire array di caratteri possibili da utilizzare 
$numbers=explode(' ','1 2 3 4 5 6 7 8 9 0');
$letters=explode(' ','a b c d e f g h i j k l m n o p q r s t u v w x y z A B C D E F G H I J K L M N O P Q R S T U V W X Y Z');
$simbols=explode(' ','! " £ € $ % & / ( ) = ? * _ - . : , ; ç @ # ] [ { }');

// unire i 3 array in uno solo 
$all_char= array_merge($numbers,$letters,$simbols);

var_dump( $numbers );
var_dump( $letters );
var_dump( $simbols );
var_dump( $all_char );


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Strong Password Generator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>

<div class="container mt-3">
    <div class="card text-center">
        <div class="card-header">Titolo password generata</div>
        <div class="card-body">password generata</div>
    </div>

    <div class="card text-center mt-3">
        <div class="card-header">Crea la tua password</div>
        <div class="card-body">
            <form method="GET" class="row g-3">
                <div class="col">
                    <label for="digit-number" class="form-label">Di quanti caratteri sarà composta la tua password</label>
                    <input type="number" name="digit-number" id="digit-number" class="form-control">
                </div>
                <div class="col-12">
                    <button type="button" class="btn btn-primary">Genera</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>
    
</body>
</html>