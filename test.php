<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Adresse e-mail où vous souhaitez recevoir les messages
    $destinataire = "dodohoundealo@gmail.com";

    // Sujet de l'e-mail
    $sujet = "Nouveau message de $nom";

    // Corps de l'e-mail
    $corps_message = "Nom: $nom\n";
    $corps_message .= "Email: $email\n";
    $corps_message .= "Message:\n$message";

    // En-têtes de l'e-mail
    $entetes = "From: $nom <$email>";

    // Envoyer l'e-mail
    if (mail($destinataire, $sujet, $corps_message, $entetes)) {
        echo "Votre message a été envoyé avec succès.";
    } else {
        echo "Erreur lors de l'envoi du message. Veuillez réessayer plus tard.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire de contact</title>
</head>
<body>
    <h2>Contactez-nous</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nom">Nom:</label><br>
        <input type="text" id="nom" name="nom" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="message">Message:</label><br>
        <textarea id="message" name="message" required></textarea><br>
        <input type="submit" value="Envoyer">
    </form>
</body>
</html>
