<!-- Vérification du mail, connexion à la base de donnée et envoie du mail -->
<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    require './PHPMailer/src/Exception.php';
    require './PHPMailer/src/PHPMailer.php';
    require './PHPMailer/src/SMTP.php';

    $nom = null;
    $message = null;
    $email = null;
    $error = null;
    $sucess = null;
    if(!empty($_POST['email']) && !empty($_POST) && isset($_POST)) {
        $nom = $_POST['nom'];
        $message = $_POST['message'];
        $email = $_POST['email'];
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $connect = new PDO("mysql: host=localhost; dbname=info_users", 'root', '');
            $requete = $connect->query("
                                INSERT INTO users(nom, mail, message)
                                VALUES ('$nom', '$email','$message');
                            ");
            $sucess = "Message envoyé !";
        }else{
            $error = "E-mail incorrect !";
        }
        if(envoi_mail($nom, $email, $message)){
            echo "Message envoyé !";
        }else{
            echo "Erreur d'envoie !";
        }
    } 

    function envoi_mail($from_name, $from_mail, $from_message){
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;

        $mail->Username = 'dodohoundealo@gmail.com';
        $mail->Password = 'ryvryvnagpyykuut';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        $mail->setFrom($from_name, $from_mail);
        $mail->addAddress('dodohoundealo@gmail.com','Jean Pierre');
        $mail->isHTML(true);
        //$mail->Subject = $subject;
        $mail->Body = $from_message;
        $mail->setLanguage('fr');
        
        if(!$mail->send()){
            return false;
        }else{
            return true;
        }

    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Contacts !</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="icon" href="images/identite.png"/>
</head>
<style>
    #st-t{
        color: brown;
    }
    #envoi:hover{
        color:aliceblue;
        background-color: green;
    }
</style>
<body class="bg-danger">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <p class="h4 text-center mt-5 text-white" >MAIL PROFESSIONNEL ET CONTACTS</p>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-6 col-lg-3 text-center mt-5">
                <img style="width: 30%;" class="p-4 m-2 bg-light rounded-5" src="images/book.svg" alt="Rien">
                <h4 class="text-center text-white mb-5">J'AIME LIRE</h4>
                <p class="text-center text-white mx-4 my-5 mb-5">
                    J'aime la littérature: les romans policières, les bandes déssinés (manga).
                    Il faut noter aussi que j'aime les poèmes.
                </p>
            </div>
            <div class="col-12 col-md-6 col-lg-3 text-center mt-5">
                <img style="width: 30%; " class="p-4 m-2 bg-light rounded-5" src="images/enveloppe.svg" alt="Rien">
                <h4 class="text-white mb-5">EMAIL PROFESSIONNEL</h4>
                <p class="text-center text-white mx-4 my-5 mb-5">
                    Mon mail professionnel est disponible pour tout échange éventuel:
                    "jean.pierre229@proton.me". 
            </div>
            <div class="col-12 col-md-6 col-lg-3 text-center mt-5">
                <img style="width: 30%; " class="p-4 m-2 bg-light rounded-5" src="images/users.svg" alt="Rien">
                <h4 class="text-center text-white">EVENTUEL POSTE</h4>
                <p class="text-center text-white mx-4 my-5 mb-5">
                    Les postes à porté de main sont: Administrateur de Base
                    de donnée, Technicien Informatique, Analyste Programmeur... <br/>
                    Tel: +22953992605
                </p>
            </div>
        </div>
    </div>
    <div class="container mb-3">
        <?php if($error){ ?>
            <p class="alert alert-danger" style="color: red;">
                <?= $error ?>
            </p>
        <?php }elseif($sucess){ ?>
            <p class="alert alert-danger" style="color: green;">
                <?= $sucess ?>
            </p>
        <?php } ?>
        <form action="contacts.php" method="post" class="col shadow p-4 bg-light rounded-4">
            <fieldset>
                <legend class="text-center">Contactez-moi !</legend>
                <div class="row-12 row-md-6 row-lg-3 py-3">
                    <label class="form-label" for="nom"><strong>Nom :</strong></label>
                    <input class="form-control bg-danger" type="text" id="nom" name="nom" placeholder="Entrer votre nom !" required/>
                </div>
                <div class="row-12 row-md-6 row-lg-3 py-3">
                    <label class="form-label" for="mail"><strong>E-Mail :</strong></label>
                    <input class="form-control bg-danger" type="text" id="mail" name="email" placeholder="Entrer votre adresse mail !" required/>
                </div>
                <div class="row-12 row-md-6 row-lg-3 py-3">
                    <label class="form-label" for="message"><strong>Message :</strong></label>
                    <textarea class="form-control bg-danger" name="message" id="message" cols="10" rows="5" required></textarea>
                </div>
                <div class="row-12 row-md-6 row-lg-3 text-end">
                    <input type="submit" value="Envoyer" id="envoi" class="text-center text-white bg-danger d-inline p-2 mt-2 rounded-4">
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>