<?php
$options = [
    'hello' => 'Me faire un coucou',
    'insult' => 'M\'insulter',
    'job' => 'Me faire une proposition',
    'clue' => 'Me donner un conseil',
    'test' => 'Me tester',
];




if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    //Cleaning user POST 
    $contact = array_map('trim', $_POST);

    if (empty($contact['firstname'])) {
        $errors[] = 'Le prénom est obligatoire';
    }

    if (empty($contact['lastname'])) {
        $errors[] = 'Le nom est obligatoire';
    }

    if (empty($contact['email'])) {
        $errors[] = 'L\'email est obligatoire';
    }

    if (empty($contact['message'])) {
        $errors[] = 'Le message est obligatoire';
    }

    $maxFirstnameLenght = 90;
    if (strlen($contact['firstname']) > $maxFirstnameLenght) {
        $errors[] = 'Le prénom doit être inférieur à ' . $maxFirstnameLenght . ' caractères';
    }

    $maxEmailLenght = 255;
    if (strlen($contact['email']) > $maxEmailLenght) {
        $errors[] = 'L\'email doit être inférieur à ' . $maxEmailLenght . ' caractères';
    }


    if (!filter_var(($contact['email']), FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Le format d\'email est incorrect';
    }


    if (!key_exists($contact['subject'], $options)) {
        $errors[] = 'Le sujet est incorrect.';
    }

    if (empty($errors)) {
        //Do somethong, for example : send email, put informations in database
        // and redirection
        header('location: thanks.php');
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Forms checking</title>
</head>

<body>
    <main>

        <h1>Me contacter</h1>
        <form action="" method="post">

            <?php if (!empty($errors)) : ?>
                <ul class="errors">
                    <?php foreach ($errors as $error) : ?>
                        <li><?= $error; ?></li>
                    <?php endforeach ?>
                </ul>
            <?php endif ?>

            <label for="firstname">Votre prénom</label>
            <input type="text" name="firstname" id="firstname" value="<?= $contact['firstname']?? '' ?>" >

            <label for="lastname">Votre nom</label>
            <input type="text" name="lastname" id="lastname" value="<?= $contact['lastname']?? '' ?>" >

            <label for="email">Votre email</label>
            <input type="email" name="email" id="email" value="<?= $contact['email']?? '' ?>">

            <label for="subject">Choisissez un sujet</label>
            
            <select name="subject" id="subject">
                <?php foreach ($options as $subject => $option) : ?>
                    <option 
                        value="<?= $subject ?>"
                        <?php if(isset($contact['subject']) &&  $contact['subject'] === $subject) :?>
                            selected 
                            <?php endif; ?>
                            >
                        <?= $option?>
                    </option>
                <?php endforeach; ?>
            </select>
    
            <label for="message">Votre message</label>
            <textarea name="message" id="" cols="30" rows="10"><?= $contact['message']?? '' ?></textarea>

            <button type="submit">Envoyer</button>
        </form>

    </main>
</body>

</html>