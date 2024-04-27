<?php

namespace App\Exceptions;

use Exception;

class RoleDendiedException extends Exception
{
    public function __construct($message = "You Do Not Have To Access This Page",$code = 0 , Exception $previous = null)
    {
        parent::__construct($message , $code ,$previous);
    }
}
