<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <link rel="shortcut icon" href="img/logo.png" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Our parking -rezerwuj miejsca parkingowe, zgłoś parking</title>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
        <link rel="stylesheet" href="CSS/style.css" type="text/css">
        <link rel="stylesheet" href="CSS/header.css" type="text/css">
        <link rel="stylesheet" href="CSS/footer.css" type="text/css">
    </head>
    
    <body>
        
        
       
            {{view('components.header');}}

            @if (Session::has('token'))
            {{view('components.main');}}
            @else
            {{view('components.home');}}
            @endif
            
           {{view('components.footer');}}
            
    </body>
</html>
