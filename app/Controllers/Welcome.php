<?php

namespace App\Controllers;

use CodeIgniter\Files\File;
use App\Controllers\BaseController;

use function PHPUnit\Framework\isNull;

class Welcome extends BaseController
{
  public function index()
  {
    echo "SUCCESS";
  }
}