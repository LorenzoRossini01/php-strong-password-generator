<?php

include_once __DIR__."./partials/functions.php";


// definire array di caratteri possibili da utilizzare 
$numbers=explode(' ','1 2 3 4 5 6 7 8 9 0');
$letters=explode(' ','a b c d e f g h i j k l m n o p q r s t u v w x y z A B C D E F G H I J K L M N O P Q R S T U V W X Y Z');
$simbols=explode(' ','! " £ € $ % & / ( ) = ? * _ - . : , ; ç @ # ] [ { }');

$all_char=[];

$form_sent=!empty($_GET);
$digit_number=isset($_GET['digit-number'])?(int)$_GET['digit-number']:'';
$select_numbers=isset($_GET['number'])?$_GET['number']:'';
$select_letters=isset($_GET['letters'])?$_GET['letters']:'';
$select_simbols=isset($_GET['simbols'])?$_GET['simbols']:'';
$select_repetitions=isset($_GET['repetitions'])?$_GET['repetitions']:'';


if($select_numbers=='on') $all_char= array_merge($all_char,$numbers);
if($select_letters=='on') $all_char= array_merge($all_char,$letters);
if($select_simbols=='on') $all_char= array_merge($all_char,$simbols);

// unire i 3 array in uno solo 
// $all_char= array_merge($numbers,$letters,$simbols);
$password=[];


// var_dump( $numbers );
// var_dump( $letters );
// var_dump( $simbols );
if($form_sent){
    // var_dump( $digit_number );
    if(count($all_char)<$digit_number && $select_repetitions==0){

    }else{
        if(!$select_repetitions){
            $password_str=get_unique_rand_password($digit_number,$all_char,$password);
            
        } else{
            $password_str=get_rand_password($digit_number,$all_char,$password);
    
        }
        
        session_start();
        $_SESSION['password']=$password_str;
        header('Location: ./newpsw.php');
    
    var_dump($password_str);
    
    }



}


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


    <div class="card text-center mt-3">
        <div class="card-header">Crea la tua password</div>
        <div class="card-body">
            <form method="GET" class="row g-3">
                <div class="col-12">
                    <label for="digit-number" class="form-label">Di quanti caratteri sarà composta la tua password</label>
                    <input type="number" min="4"  name="digit-number" id="digit-number" class="form-control" value=<?= $form_sent? $digit_number:''?>>
                </div>
                <div class="col-2">
                        <div class="form-check">
                            <label for="number" class="form-check-label">Numeri</label>
                            <input type="checkbox" name="number" id="number" class="form-check-input" <?= $select_numbers? 'checked':''?>>
                        </div>

                        <div class="form-check">
                            <label for="letters" class="form-check-label">Lettere</label>
                            <input type="checkbox" name="letters" id="letters" class="form-check-input" <?= $select_letters? 'checked':''?>>
                        </div>

                        <div class="form-check">
                            <label for="simbols" class="form-check-label">Simboli</label>
                            <input type="checkbox" name="simbols" id="simbols" class="form-check-input" <?= $select_simbols? 'checked':''?>>
                        </div>
                </div>
                <div class="col">
                <label for="repetitions" class="form-label">Example range</label>
                <input type="range" class="form-range" min="0" max="1" value=<?= $select_repetitions? $select_repetitions:0?> id="repetitions" name="repetitions">
                </div>
                <div class="col-12">
                    <button class="btn btn-primary">Genera</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form>
        </div>
    </div>

<?php if(count($all_char)<$digit_number && $select_repetitions==0):?>
    <div class="alert alert-danger mt-3">
        il numero dev'essere minore di <?= count($all_char)?>
    </div>
</div>
<?php endif;?>
    
</body>
</html>