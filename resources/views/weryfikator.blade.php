<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <link rel="shortcut icon" href="img/logo.png" />
        <meta charset="UTF-8">
        <title>Our-parking -rezerwuj miejsca parkingowe, zgłoś parking</title>
        <<link rel="stylesheet" href="CSS/forms.css"/>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
        <?php
        $array = array("LBI54915", "LU4519","LLB84A61");
        $komunikat;
        $nr; 
        ?>
    </head>
    <body>
        <?php
        $komunikat="";
        $nr="";
        ?>
        <br><br><section class="container">
            <aside class="body_form">
                <a class="return" href="/"><i class="fa fa-angle-left" aria-hidden="true"></i></a> 
                <h1>Weryfikator opłat</h1>
                <hr>
            <form mathod="post">
                <label>Wprowadz numer rejestracyjny</label><br>
                <input type="text" class="weryfikator_input" name="nr_rej" placeholder="Numer rejestracyjny" required="true"/><br>
                <input type="submit" class="button" value="Sprawdź">
                <input type="reset" class="button" value="Anuluj">
            </form>
                <?php
                if(isset($_REQUEST['nr_rej'])){
        $rej = $_REQUEST['nr_rej'];
        foreach($array as $item){
           if($item == $rej)$nr=$item;
           break;
        }
        if($nr == $rej){
                $komunikat = "Wszystko ok";
            }
            else{
                $komunikat="Nie zapłacono";
            }
         }
                ?>
                <hr>
                <br><section class="komunikat"><aside class="com_title">Status: </aside><div class="com_text"><?php echo$komunikat; ?></div></section>
            </aside>
            
        </section>
    </body>
</html>
