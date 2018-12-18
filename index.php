<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="form.css">
    <title>QCM</title>
</head>
<body>

    <?php
        $score = 0;
        if(!empty($_POST)) { // si validation du formulaire
            $answers_sent = $_POST;
            $answers = $_SESSION['reponses'];
            // echo '<pre>', print_r($_POST, true), '</pre>'; // les réponses envoyés
            // echo '<pre>', print_r($_SESSION['reponses'], true), '</pre>'; // les vrais réponses
            

            foreach($answers as $key => $value) {
                if ($value == $answers_sent[$key]) {
                    $score++;
                }
            }
        }
    ?>
    <h1> QCM </h1>
    <div class="box">
    <?php if(!empty($_SESSION['reponses'])): ?>
        <p>Score : <?= $score?> / <?= count($_SESSION['reponses']) ?></p>
    <?php endif; ?>
    <?php
        $txt = fopen("qcm.txt", "r"); ?> //ouvrir le fichier
    <form method="POST">
    <?php
        $i = 1;
        $responses = [];
        while (FALSE !== ($line = fgets($txt))){ //cette ligne permet de revenir à la ligne apres avoir lu la ligne tant qu'il y a des lignes à lire.
            $line = explode("##", $line);

            // echo '<pre>', print_r($line, true), '</pre>';
             $question = array_shift($line); // récupérer le premier element du tableau (la question)

             // récupérer la bonne réponse
             echo "Question n°".$i.": ";
             echo $question . '<br>';
            
             foreach ($line as $key => $question) {
                if (strpos($question, "(") !== false) {
                    // on peut utiliser un preg_replace 
                    $question = str_replace(")", "", $question);
                    $question = str_replace("(", "", $question);

                    // stockage des réponses respectives
                    $responses['answer'.$i] = $question; // reponse
                }
                echo "<label>";
                echo '<input type="radio" name="answer'.$i.'" value="' . $question . '">';
                echo $question;
                echo "</label><br>";
             }
             echo "<hr>";
             $i++;
        }

        if (empty($_SESSION['reponses'])) {
            $_SESSION['reponses'] = $responses;
        }
        // echo '<pre>', print_r($responses, true), '</pre>';
    
    ?>
    <input type="submit" value="Envoyer les réponses">
    </form>
</div>
</body>
</html>
