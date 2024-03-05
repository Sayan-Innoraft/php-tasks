<?php

require 'PDF.php';

/**
 * Generates pdf using user input data.
 *
 * @param string $full_name
 *   User's full name.
 * @param string $email_address
 *   User's email address.
 * @param string $number
 *   User's contact number.
 * @param mixed $image
 *   User's input image.
 * @param string $marks
 *   User's subject marks.
 */
function generate_pdf(string $full_name, string $email_address,
                      string $number, mixed $image, string $marks): void {
    $pdf = new PDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, "Name : $full_name",
      0, 1, 'L');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, "Email Address : $email_address",
      0, 1, 'L');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, "Contact Number : $number",
      0, 1, 'L');
    $pdf->Cell(0, 20, "", 0, 1, 'L');
    $width = $pdf->GetPageWidth();
    $pdf->Image("$image", $width - 60, 10, 50);
    $header = array('Subject', 'Marks');
    $data = $pdf->LoadData($marks);
    $pdf->SetFont('Arial', '', 14);
    $pdf->FancyTable($header, $data);
    $pdfFilePath = "docs/$email_address.pdf";

    // Saves the generated pdf file on server in the docs folder.
    $pdf->Output("$pdfFilePath",'F');

    // Gives option to download the pdf file.
    $pdf->Output();
}
