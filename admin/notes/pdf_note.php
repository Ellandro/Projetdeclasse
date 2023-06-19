<?php 
    session_start();
    require_once('../../html/config/database.php');
    require_once('../../html/config/fpdf/fpdf.php');

        $matricule=$_SESSION['etudiant']['Matricule'];
    
        $requete = "SELECT n.*
                 FROM Notes n
                 INNER JOIN matiere m ON n.id_mat = m.nom_mat
                 WHERE n.matricule = ?
                 group by m.nom_mat";
         $stmt = $bd->prepare($requete);
         $stmt->execute([$matricule]);
         $note=$stmt->fetchAll();  
        $title="Bullettin de notes";
        $pdf=new FPDF();
        $pdf->AddPage("('P', 'mm', 'A4'");
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
        $pdf->Image("../../image/epsilon.png",20,40,50,30);

        $pdf->Ln(50);
        $pdf->SetX(10);
	    $pdf->Cell(60,10,'Ville',1,0,'C',1);	// 60 >largeur colonne, 8 >hauteur colonne
	    // position de la colonne 2 (70 = 10+60)
	    $pdf->SetX(70); 
	    $pdf->Cell(60,10,'Pays',1,0,'C',1);
	    // position de la colonne 3 (130 = 70+60)
	    $pdf->SetX(130); 
	    $pdf->Cell(30,10,'Repas',1,0,'C',1);

        $pdf->Output();


?>