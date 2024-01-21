<?php

// app/Libraries/PDFGenerator.php

namespace App\Libraries;

use TCPDF;

class PDFGenerator extends TCPDF
{
    public function __construct()
    {
        parent::__construct();
      
    }
}
