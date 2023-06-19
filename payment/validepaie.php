<?php require_once("../html//config/database.php"); 
  
?>
<?php
    if(isset($_POST["valider"])) {
        if(empty($_POST["matricule"]) ||
            empty($_POST["nom"]) ||
            empty($_POST["prenom"]) ||
            empty($_POST["email"]) ||
            empty($_POST["niveau"]) ||
            empty($_POST["filiere"]) ||
            // empty($_POST["montant"]) ||
            empty($_POST["versement"])
        ) {
            $erreur = "Veuillez remplir tous les champs";
        } else {
            $matri = htmlspecialchars($_POST["matricule"]);
            $nom = htmlspecialchars($_POST["nom"]);
            $prenom = htmlspecialchars($_POST["prenom"]);
            $mail = htmlspecialchars($_POST["email"]);
            $niveau = htmlspecialchars($_POST["niveau"]);
            $filiere = htmlspecialchars($_POST["filiere"]);
            // $montant = htmlspecialchars($_POST["montant"]);
            // $reste = htmlspecialchars($_POST['reste']);
            $paie =htmlspecialchars($_POST['paie']);
            $vers = $_POST["versement"];
            $date = date('d/m/Y');
            
            $numero = substr($matri, 0, 4) . substr($nom, 0, 3) . substr($filiere, 0, 3);
            $numero = strtoupper($numero);
            $title="Fiche de paiement";
            if($paie=="oui"){
                $montant = 1000000;
                $reste=0;
                $vers='Tous payer';
            }else{
                $montant=500000;
                $reste=500000;
            }

            if($vers=="Semestre 2"){
                $reste=0;
                $montant=1000000;
                $vers='Tous payer';
                $verif = $bd->prepare("SELECT * FROM paiement WHERE Matricule=? AND NumPaie=?");
                $verif->execute([$matri,$numero]);
                if($verif->rowCount()==0){
                    $erreur="Premier paiement non effectué !!!!";
                }
                else{
                    $update = "UPDATE paiement SET NumPaie=?,Matricule=?, Nom=?, Prenom=?, Email=?, datePaie=?, Montant=?,
                    Reste=?, Num_versement=? WHERE NumPaie=?";
                    $mise = $bd->prepare($update);
                    $mise->execute([$numero, $matri, $nom, $prenom, $mail,$date,$montant,$reste,$vers,$matri]);
                    $succes = "Deuxieme paiement effectué, voici votre code de paiement : $numero";

                }
            }else{

           
            
            // Assurez-vous d'avoir une connexion valide à la base de données ($bd)
            require("../html/config/fpdf/fpdf.php");
            require_once('../html/config/barcode/src/BarcodeGenerator.php');
            $pdf = new FPDF();
            $pdf->AddPage();
            // Titre
            $pdf->SetFont('Arial', 'B', 18);
            $pdf->SetDrawColor(178,221,221);
            $pdf->SetFillColor(0,0,0);
            $pdf->SetTitle($title);
            $w = $pdf->GetStringWidth($title)+6;
            $pdf->SetTextColor(179, 45,  25);
            $pdf->Cell(0, 10, $title, 1, 1, 'C');
            $pdf->Ln(10);
            
            $pdf->SetFont('Arial','B',15);
            $pdf->Cell(71,5,'Annee Academique',0,0);
            $pdf->cell(59,5,'',0,0);
            $pdf->cell(59,5,'UniSen',0,1,'l');
            $pdf->SetTextColor(0, 0,  0);
            $pdf->SetFont("Arial","",10);
            $pdf->cell(130,5,'2022-2023',0,0);
            $pdf->cell(130,5,"BP 3241 Abidjan 001",0,1);
            $pdf->cell(130,5,'',0,0);
            $pdf->cell(130,5,'Les leaders de demain',0,1);
            $pdf->Image("../image/epsilon.png",70,40,30,30);

            $pdf->Ln(45);
            $pdf->SetFont('Arial', 'B', 15);
            $pdf->SetDrawColor(115,134,79);
            $pdf->SetX((150-$w)/2);
            $pdf->Cell(70, 10, 'Informations personnelles', 1, 1, 'L');
            $pdf->Ln(3);
            $pdf->SetFont('Times', '', 12);

            // Affichage du matricule
            $pdf->SetX((170-$w)/2);
            $pdf->SetFont('Times', 'B', 13);
            $pdf->Cell(40, 10, 'Matricule:', 0, 0, 'L');
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(0, 10, $matri, 0, 1, 'C');

            //  Affichage du nom
            $pdf->SetX((170-$w)/2);
            $pdf->SetFont('Times', 'B', 13);
            $pdf->Cell(40, 10, 'Nom:', 0, 0, 'L');
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(0, 10, $nom, 0, 1, 'C');

            // Affichage du prenom
            $pdf->SetX((170-$w)/2);
            $pdf->SetFont('Times', 'B', 13);
            $pdf->Cell(40, 10, 'Prenom:', 0, 0, 'L');
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(0, 10, $prenom, 0, 1, 'C');

            // Affichage du code de paiement
            $pdf->SetX((170-$w)/2);
            $pdf->SetFont('Times', 'B', 13);
            $pdf->Cell(40, 10, 'Code de paiement:', 0, 0, 'L');
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(0, 10, $numero, 0, 5, 'C');

            // Affichage des information du paiement
            $pdf->Ln(10);
            $pdf->SetFont('Courier', '', 5);
            $pdf->SetFont('Arial', 'B', 15);
            $pdf->SetX((150-$w)/2);
            $pdf->Cell(70, 10, 'Information du paiement', 1, 1, 'L');
            $pdf->Ln(5);
            $pdf->SetFont('Times', 'B', 13);
            $pdf->SetX((170-$w)/2);
            $pdf->Cell(40, 10, 'Montant:', 0, 0, 'L');
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(0, 10, $montant, 0, 1, 'C');

            $pdf->SetX((170-$w)/2);
            $pdf->SetFont('Times', 'B', 13);
            $pdf->Cell(40, 10, 'Reste a payer :', 0, 0, 'L');
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(0, 10, $reste, 0, 1, 'C');

            $pdf->SetX((170-$w)/2);
            $pdf->SetFont('Times', 'B', 13);
            $pdf->Cell(40, 10, 'Versement :', 0, 0, 'L');
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(0, 10, $vers, 0, 1, 'C');

            $pdf->SetX((170-$w)/2);
            $pdf->SetFont('Times', 'B', 13);
            $pdf->Cell(40, 10, 'Filiere:', 0, 0, 'L');
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(0, 10, $filiere, 0, 1, 'C');

            // Filigrane
            // $pdf->SetAlpha(0.5);  // Transparence à 50%
            // $pdf->SetFont('Arial', 'B', 50);
            // $pdf->SetTextColor(192, 192, 192);  // Gris clair
            // $pdf->RotatedText(50, 150, 'Filigrane', 45);
                
                    // Générer le fichier PDF
            $pdf->Ln(15);
            // $pdf = new PDF_BARCODE();
            // $pdf->EAN13(40,10,113231423,5,0.5,9);
            // $pdf->EAN13(10,20,'123456789012',5,0.35,9);
            // $pdf->EAN13(10,30,'123456789012',10,0.35,9);

             $pdf->Output();


            
            $sql = "INSERT INTO paiement (NumPaie, Matricule, Nom, Prenom, Email, datePaie,Montant, Reste,Num_versement) VALUES (?,?,?, ?, ?, ?, ?, ?, ?)";
            $insertion = $bd->prepare($sql);
            $insertion->execute([$numero, $matri, $nom, $prenom, $mail, $date,$montant, $reste,$vers]);
            $succes = "Paiement effectué, voici votre code de paiement : $numero";
        }
    }
    }
?>