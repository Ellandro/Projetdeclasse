<?php
require_once('../html/config/dompdf/autoload.inc.php');
use Dompdf\Dompdf;

if(isset($_POST['envoi'])) {
  // Récupérer les données d'inscription depuis la soumission du formulaire
  // Remplacez ceci par votre logique pour récupérer les données
  $matricule = $_POST['matricule'];
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $codePaiement = $_POST['paie'];
  $email = $_POST['mail'];
  $telephone = $_POST['tel'];
  $dateNaissance = $_POST['naiss'];
  $sexe = $_POST['sexe'];
  $adresse = $_POST['adresse'];
  $pays = $_POST['pays'];
  $ville = $_POST['ville'];
  $pere = $_POST['pere'];
  $mere = $_POST['mere'];

  // Enregistrer les données dans la base de données
  // Remplacez ceci par votre logique d'enregistrement des données
  // ...

  // Générer le contenu HTML du PDF
  $html = '<html><body>';
  $html .= '<h1>Confirmation d\'inscription</h1>';
  $html .= '<p>Matricule: ' . $matricule . '</p>';
  $html .= '<p>Nom: ' . $nom . '</p>';
  $html .= '<p>Prénom: ' . $prenom . '</p>';
  $html .= '<p>Code de paiement: ' . $codePaiement . '</p>';
  $html .= '<p>Email: ' . $email . '</p>';
  $html .= '<p>Téléphone: ' . $telephone . '</p>';
  $html .= '<p>Date de naissance: ' . $dateNaissance . '</p>';
  $html .= '<p>Sexe: ' . $sexe . '</p>';
  $html .= '<p>Adresse: ' . $adresse . '</p>';
  $html .= '<p>Pays: ' . $pays . '</p>';
  $html .= '<p>Ville: ' . $ville . '</p>';
  $html .= '<p>Nom complet du père: ' . $pere . '</p>';
  $html .= '<p>Nom complet de la mère: ' . $mere . '</p>';
  $html .= '</body></html>';

  // Générer le PDF avec Dompdf
  $dompdf = new Dompdf();
  $dompdf->loadHtml($html);
  $dompdf->setPaper('A4', 'portrait');
  $dompdf->render();

  // Générer un code-barres à partir du matricule
  $barcodeHtml = '<img src="barcode.php?text=' . $matricule . '" alt="Code-barres" />';

  // Ajouter le code-barres au contenu du PDF
  $canvas = $dompdf->getCanvas();
  $canvas->page_text(550, 820, 'Page {PAGE_NUM}/{PAGE_COUNT}', null, 10, array(0, 0, 0));
  $canvas->page_text(20, 820, $barcodeHtml, null, 10, array(0, 0, 0));

  // Enregistrer le PDF sur le serveur ou le télécharger
  $outputFilename = 'inscription.pdf';
  $dompdf->stream($outputFilename, array('Attachment' => false));
}
?>