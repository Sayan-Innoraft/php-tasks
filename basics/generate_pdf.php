<?php
/**
 * @param $full_name
 * @param $email_address
 * @param $number
 * @param $image
 * @param $marks_data
 * @return void
 */
function generate_pdf($full_name, $email_address, $number, $image, $marks_data): void {
    $pdf = new PDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, "Name : $full_name", 0, 1, 'L');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, "Email Address : $email_address", 0, 1, 'L');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, "Contact Number : $number", 0, 1, 'L');
    $pdf->Cell(0, 20, "", 0, 1, 'L');
    $width = $pdf->GetPageWidth();
    $pdf->Image("$image", $width - 60, 10, 50);
    $header = array('Subject', 'Marks');
    $data = $pdf->LoadData($marks_data);
    $pdf->SetFont('Arial', '', 14);
    $pdf->FancyTable($header, $data);
    $pdfFilePath = "docs/$email_address.pdf";
    /**
     * Saving the generated pdf file on server in the docs folder
     */
    $pdf->Output("$pdfFilePath",'F');
    /**
     * Gives option to download the pdf file
     */
    $pdf->Output();
}
