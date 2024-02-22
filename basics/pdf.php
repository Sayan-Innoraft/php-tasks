<?php
// Include FPDF library
require '../vendor/setasign/fpdf/fpdf.php';

class PDF extends FPDF
{
    function LoadData($data): array
    {
        return explode("\n",trim($data));
    }
    function FancyTable($header, $data): void
    {
        // Colors, line width and bold font
        $this->SetFillColor(251, 86, 7);
        $this->SetTextColor(255);
        $this->SetDrawColor(128,0,0);
        $this->SetLineWidth(.3);
        $this->SetFont('','B');
        $tableWidth = 100;
        $pageWidth = $this->GetPageWidth();
        $tableX = ($pageWidth - $tableWidth) / 2;
        $this->SetX($tableX);
        // Header
        $w = array(40, 40);
        for($i=0;$i<count($header);$i++)
            $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0);
        $this->SetFont('');
        $fill = false;

        foreach($data as $row)
        {
            $this->SetX($tableX);
            $row = explode("|",$row);
            $this->Cell($w[0],6,$row[0],'LR',0,'C',$fill);
            $this->Cell($w[1],6,$row[1],'LR',0,'C',$fill);
            $this->Ln();
            $fill = !$fill;
        }
        // Closing line
        $this->SetX($tableX);
        $this->Cell(array_sum($w),0,'','T');
    }
}

