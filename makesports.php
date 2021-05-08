<?php 
        include 'includes/class-autoload.inc.php';
        session_start();

        $userobj = new user();
        $userid = $userobj->getuserid();
        
        if (isset($_POST['checkboxvar'])) 
        {
            $sportobj = new user();
            foreach ($_POST['checkboxvar'] as $value){
                $sportobj->setsports($userid,$value);
            }
            
        }
        
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Choose sports</title>
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="./css/loadanimation.css">
        <link rel="shortcut icon" type="image/png" href="./images/sportbud.png">
    </head>

    <body>
        <div class="NOG GEEN">
            <form action="makesports.php" method="POST">
                <p>In which sports do you like to participate?</p>
                <div><input type="checkbox" name="checkboxvar[]" id="lan_Fitness" value="Fitness"><label for="lan_Fitness"></label>Fitness</div>
                <div><input type="checkbox" name="checkboxvar[]" id="lan_Basket" value="Basket"><label for="lan_Basket"></label>Basket</div>
                <div><input type="checkbox" name="checkboxvar[]" id="lan_Voetbal" value="Voetbal"><label for="lan_Voetbal"></label>Voetbal</div>
                <div><input type="checkbox" name="checkboxvar[]" id="lan_Gevechtsport" value="Gevechtsport"><label for="lan_Gevechtsport"></label>Gevechtsport</div>
                <div><input type="checkbox" name="checkboxvar[]" id="lan_Cardio" value="Cardio"><label for="lan_Cardio"></label>Cardio</div>
                <div><input type="checkbox" name="checkboxvar[]" id="lan_Frisbee" value="Frisbee"><label for="lan_Frisbee"></label>Frisbee</div>
                <div><input type="checkbox" name="checkboxvar[]" id="lan_Rugby" value="Rugby"><label for="lan_Rugby"></label>Rugby</div>
                <div><input type="checkbox" name="checkboxvar[]" id="lan_Fietsen" value="Fietsen"><label for="lan_Fietsen"></label>Fietsen</div>
                <div><input type="checkbox" name="checkboxvar[]" id="lan_Hockey" value="Hockey"><label for="lan_Hockey"></label>Hockey</div>
                <div><input type="checkbox" name="checkboxvar[]" id="lan_Ijshockey" value="Ijshockey"><label for="lan_Ijshockey"></label>Ijshockey</div>
                <div><input type="checkbox" name="checkboxvar[]" id="lan_Zwemmen" value="Zwemmen"><label for="lan_Zwemmen"></label>Zwemmen</div>
                <div><input type="checkbox" name="checkboxvar[]" id="lan_Golf" value="Golf"><label for="lan_Golf"></label>Golf</div>
                <div><input type="checkbox" name="checkboxvar[]" id="lan_Skiën" value="Skiën"><label for="lan_Skiën"></label>Skiën</div>
                <div><input type="checkbox" name="checkboxvar[]" id="lan_Snowboarden" value="Snowboarden"><label for="lan_Snowboarden"></label>Snowboarden</div>
                <div><input type="submit" value="Create my account!" class="myButton"></div>
            </form>
        </div>
        
    </body>
</html>