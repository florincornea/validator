<?php

require('./Validator/Validator.php'); 

if (strip_tags($_POST["name"])) {
    $validator = new Validator();
    
    $nameMessages = [
            'required' => "Campul nume este obligatoriu",
            'min:3' => "Campul nume trebuie sa aiba minim 3 caractere",
            'max:10' => "Campul nume trebuie sa aiba maxim 10 caractere",
        ];
    $emailMessages = [
            'required' => "Campul email este obligatoriu",
            'email' => "Campul email trebuie sa fie de tip email",
        ];
    
    $validName = $validator::validate(
        $_POST["name"],
        'required|min:3|max:10',
        $nameMessages
    );
    
    var_dump($validName);
}

?>
<html>
    <head>
        <title>validator</title>
    </head>
    <body>
        <form method="POST" action="/index.php">
            <input type="text" name="name">
            <input type="email" name="email">
            <input type="submit" value="Submit">
        </form>
    </body>
</html>
