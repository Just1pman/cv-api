<?php


namespace App\Services;


use TCPDF;
use Twig\Environment;

class CvService
{
    const CREATOR = 'Alexader Olkhovik';

    /**
     * @var Environment
     */
    private $environment;
    /**
     * @var TCPDF
     */
    private $pdf;

    public function __construct(
        Environment $environment
    )
    {
        $this->init();
        $this->environment = $environment;
    }

    public function init() {
        $this->pdf = new TCPDF();
        $this->setDefaultParams();
    }

    public function createCv() {
        $html = $this->environment->render('cv/cv.html.twig');
        $this->pdf->AddPage();

        $this->pdf->writeHTML($html, false, false, false, false);
        $this->pdf->Output('alxdr.olkhovik.pdf');
    }

    private function setDefaultParams() {

        $this->pdf->SetPrintHeader(false);
        $this->pdf->SetPrintFooter(false);

        $tagvs = [
            'h1' => array(0 => array('h' => 1, 'n' => 3), 1 => array('h' => 1, 'n' => 2)),
            'h3' => array(0 => array('h' => 0, 'n' => 0), 1 => array('h' => 1, 'n' => 1)),
            'p' => array(0 => array('h' => 1, 'n' => 0), 1 => array('h' => 1, 'n' => 2)),
            'ul' => array(0 => array('h' => 1, 'n' => 1), 1 => array('h' => 0, 'n' => 0)),
            'li' => array(0 => array('h' => 1, 'n' => 1), 1 => array('h' => 1, 'n' => 2)),
            'div' => array(0 => array('h' => 0, 'n' => 0), 1 => array('h' => 0, 'n' => 1)),
            'span' => array(0 => array('h' => 0, 'n' => 0), 1 => array('h' => 0, 'n' => 0)),
        ];
        $this->pdf->setHtmlVSpace($tagvs);

        $this->pdf->SetHeaderMargin(0);
        $this->pdf->SetFooterMargin(0);

        $this->pdf->SetCreator(self::CREATOR);
        $this->pdf->SetAuthor(self::CREATOR);
        $this->pdf->SetTitle('olkhovik.cv.pdf');
        $this->pdf->SetSubject('Olkhovik CV');
        $this->pdf->SetKeywords('Olkhovik CV');
    }
}