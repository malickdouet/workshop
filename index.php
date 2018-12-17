<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="form.css">
    <title>QCM</title>
</head>
<body>
    <h1> QCM </h1>
    <div class="box">
    <?php
        $txt = fopen ("text.txt", "r"); //ouvrir le fichier
        
        $i=0; 
        while (FALSE !== ($line = fgets($txt))){ //cette ligne permet de revenir à la ligne apres avoir lu la ligne tant qu'il y a des lignes à lire.
            $tableau=explode("##",$line);
    
            echo("<tr>");
            echo("<td>"."Question n°".$i."<br></td>");
            echo("<td> <p class=\"question\">".$tableau[0]."</p><br></td>");
            echo("<td> <p class=\"question\">".$tableau[1]."</p><br></td>");
            echo("<td> <p class=\"question\">".$tableau[2]."</p><br></td>");
            echo("<td> <p class=\"question\">".$tableau[3]."</p><br></td>");
            echo("<td> <p class=\"question\">".$tableau[4]."</p><br></td>");
            echo("<td> <p class=\"question\">".$tableau[5]."</p><br></td>");
            $i++;
            echo("<br><br>");
            echo("</tr>");
            
        }
    
?>
    
</div>
</body>
</html>
