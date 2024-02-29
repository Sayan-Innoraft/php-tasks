<?php

require '../../vendor/autoload.php';

/**
 * Customized PDF class extending FPDF class.
 */
class PDF extends FPDF {

  /**
   * Parse the subject marks string and returns as string array using new line.
   *
   * @param string $data
   *   Subjects and marks data.
   *
   * @return array
   *   Returns string array splitting data string using new line.
   *
   */
  function LoadData(string $data): array {
    return explode("\n", trim($data));
  }

  /**
   * Takes header and data, then creates a customized table.
   *
   * @param array $header
   *   Header includes the table headers.
   * @param array $data
   *   Array of strings containing subject and marks data.
   */
  function FancyTable(array $header, array $data): void {

    // Colors, line width and bold font.
    $this->SetFillColor(251, 86, 7);
    $this->SetTextColor(255);
    $this->SetDrawColor(128, 0, 0);
    $this->SetLineWidth(.3);
    $this->SetFont('', 'B');
    $tableWidth = 100;
    $pageWidth = $this->GetPageWidth();
    $tableX = ($pageWidth - $tableWidth) / 2;
    $this->SetX($tableX);

    // Header.
    $w = array(40, 40);
    for ($i = 0; $i < count($header); $i++)
      $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', true);
    $this->Ln();

    // Color and font restoration.
    $this->SetFillColor(224, 235, 255);
    $this->SetTextColor(0);
    $this->SetFont('');
    $fill = false;

    foreach ($data as $row) {
      $this->SetX($tableX);
      $row = explode("|", $row);
      $this->Cell($w[0], 6, $row[0], 'LR', 0, 'C', $fill);
      $this->Cell($w[1], 6, $row[1], 'LR', 0, 'C', $fill);
      $this->Ln();
      $fill = !$fill;
    }

    // Closing line.
    $this->SetX($tableX);
    $this->Cell(array_sum($w), 0, '', 'T');
  }

}
