<?php
require_once ('./Validator/Validator.php'); 

$validator = new Validator();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailMessages = [
            'required' => "Campul email este obligatoriu",
            'email' => "Campul email trebuie sa contina un email valid",
        ];
    if (array_key_exists('name', $_POST)) {
        $nameMessages = [
            'required' => "Campul nume este obligatoriu",
            'min' => "Campul nume trebuie sa aiba minim 5 caractere",
            'max' => "Campul nume trebuie sa aiba maxim 10 caractere",
        ];

        $validName = $validator::validate(
            'name',
            $_POST["name"],
            'required|min:5|max:10',
            $nameMessages
        );
    }
}

?>
<html>
    <head>
        <title>validator</title>
    </head>
    <body>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <input type="text" name="name" value="<?php echo isset($validName) ? $validName : '';?>">
            <input type="email" name="email">
            <input type="submit" value="Submit">
            <?php
                if ($errors = $validator::fails()) {
                    foreach ($errors as $error) {
                        echo "<div>$error</div>";
                    }
                }
            ?>
        </form>
    </body>
</html>
