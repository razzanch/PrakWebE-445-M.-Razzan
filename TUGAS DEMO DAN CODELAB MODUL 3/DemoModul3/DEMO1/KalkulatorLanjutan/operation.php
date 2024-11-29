<?php
namespace b;

include_once "abstractBased.php";
include_once "traitResult.php";

use BasedSquared;
use PrintResult;

class Operation extends BasedSquared{
    private $a;
    private $b;

    use PrintResult;

    public function __construct($value1,$value2)
    {
        $this->a = $value1;
        $this->b = $value2;
    }
    
    public function modulus()
    {
        $result = $this->a % $this->b;
        return $this->result($result);
    }

    public function pow()
    {
        $result = pow($this->a, $this->b);
        return $this->result($result);
    }


}