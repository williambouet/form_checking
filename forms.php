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
            <label for="firstname">Votre prénom</label>
            <input type="text" name="firstname" id="firstname">

            <label for="lastname">Votre nom</label>
            <input type="text" name="lastname" id="lastname">

            <label for="subject">Choisissez un sujet</label>
            <select name="subject" id="subject">
                <option value="hello">Me faire un coucou</option>
                <option value="insult">M'insulter</option>
                <option value="job">Me faire une proposition</option>
                <option value="clue">Me donner un conseil</option>
            </select>

            <label for="message">Votre message</label>
            <textarea name="message" id="" cols="30" rows="10"></textarea>

            <button type="submit">Envoyer</button>
        </form>

    </main>
</body>
</html>