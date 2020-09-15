<?php
// S'il y des données de postées
if ($_SERVER['REQUEST_METHOD']=='POST') {
 
  // (1) Code PHP pour traiter l'envoi de l'email
 
  // Récupération des variables et sécurisation des données
  $name     = htmlentities($_POST['name']); // htmlentities() convertit des caractères "spéciaux" en équivalent HTML
  $email   = htmlentities($_POST['email']);
  $message = htmlentities($_POST['message']);
 
  // Variables concernant l'email
 
  $destinataire = 'contact@idealzen.fr'; // Adresse email du webmaster (à personnaliser)
  $sujet = 'Demande de devis'; // Titre de l'email
  $contenu = '<html><head><title>DEMANDE DE DEVIS</title></head><body><div align="center">';
  $contenu .= '<img src="https://zupimages.net/viewer.php?id=19/52/40gf.png"/>';
  $contenu .= '<p>Bonjour, vous avez reçu un message à partir de votre site web.</p>';
  $contenu .= '<p><strong>Nom</strong>: '.$name.'</p>';
  $contenu .= '<p><strong>Email</strong>: '.$email.'</p>';
  $contenu .= '<p><strong>Message</strong>: '.$message.'</p>';
  $contenu .= '</div></body></html>'; // Contenu du message de l'email (en XHTML)
 
  // Pour envoyer un email HTML, l'en-tête Content-type doit être défini
  $headers = 'MIME-Version: 1.0'."\r\n";
  $headers .= 'Content-type: text/html; charset=utf-8'."\r\n";
  $headers .='Content-Transfer-Encoding: 8bit';
 
  // Envoyer l'emails
    if(mail($destinataire, $sujet, $contenu, $headers)==true)
    {
      header('Location: contact.html'); 
     // Fonction principale qui envoi l'email
    echo 'Message envoyé!'; 
    }// Afficher un message pour indiquer que le message a été envoyé
    // (2) Fin du code pour traiter l'envoi de l'email
    else // Non envoyé
    {
        echo "Votre message n'a pas pu être envoyé";
    }


	
}
?>