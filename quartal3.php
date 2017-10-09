<?php  

$pdfAuthor = "BSL";

function fetch_data()  
 {  
      $output = '';  
      $conn = mysqli_connect("localhost", "root", "", "kassa");  
      $sql = "SELECT * FROM bslmitarbeiter WHERE MONTH(datum) = 07 OR MONTH(datum) = 08 OR MONTH(datum) = 09 ORDER BY datum";  
      $result = mysqli_query($conn, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
  
      $output .= '<tr>  
						  <td>'.date('d.m.Y', strtotime($row['datum'])) .'</td>  
						  <td>'.$row["beschreibung"].'</td>  
                          <td>'.$row["soll"].'</td>  
                          <td>'.$row["haben"].'</td>  
                     </tr>  
                          ';  
      }  
      return $output;  
 }

$dateiname = basename(__FILE__, '.php');
$pdfName = "Zahlungen_".$dateiname.".pdf";

//////////////////////////// Inhalt des PDFs als HTML-Code \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\


// Erstellung des HTML-Codes. Dieser HTML-Code definiert das Aussehen eures PDFs.
// tcpdf unterstützt recht viele HTML-Befehle. Die Nutzung von CSS ist allerdings
// stark eingeschränkt.


$html = '
<table cellpadding="5" cellspacing="0" style="width: 100%; ">

	<tr>
		 <td style="font-size:1.3em; font-weight: bold;">
Zahlungen vom dritten Quartal
<br>
		 </td>
	</tr>

</table>
<br>

<table cellpadding="5" cellspacing="0" style="width: 100%;" border="0">
	<tr style="background-color: #cccccc; padding:5px;">
		<td style="padding:5px;"><b>Datum</b></td>
		<td style="text-align: left-center;"><b>Beschreibung</b></td>
		<td style="text-align: left-center;"><b>Soll</b></td>
		<td style="text-align: left-center;"><b>Haben</b></td>
	</tr>';
	
	 if(isset($_POST["generate_pdf"]))  
	{  		
	
      $html .= fetch_data();  
      $html .= '</table>';  

//////////////////////////// Erzeugung eures PDF Dokuments \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

// TCPDF Library laden
require_once('tcpdf/tcpdf.php');

// Erstellung des PDF Dokuments
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Dokumenteninformationen
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor($pdfAuthor);
$pdf->SetTitle('Zahlungen');
$pdf->SetSubject('Zahlungen');


// Header und Footer Informationen
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// Auswahl des Font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// Auswahl der MArgins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// Automatisches Autobreak der Seiten
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Image Scale 
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// Schriftart
$pdf->SetFont('dejavusans', '', 10);

// Neue Seite
$pdf->AddPage();

// Fügt den HTML Code in das PDF Dokument ein
$pdf->writeHTML($html, true, false, true, false, '');

//Ausgabe der PDF

//Variante 1: PDF direkt an den Benutzer senden:
$pdf->Output($pdfName, 'I');

//Variante 2: PDF im Verzeichnis abspeichern:
//$pdf->Output(dirname(__FILE__).'/'.$pdfName, 'F');
//echo 'PDF herunterladen: <a href="'.$pdfName.'">'.$pdfName.'</a>';

 }
?>