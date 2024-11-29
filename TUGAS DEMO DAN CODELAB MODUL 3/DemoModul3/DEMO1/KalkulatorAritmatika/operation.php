<?php
namespace a;

include_once "abstractBased.php";
include_once "traitResult.php";

use BasedOperationMethod;
use PrintResult;

class Operation extends BasedOperationMethod {
    private $a;
    private $b;

    use PrintResult;

    public function __construct($value1,$value2)
    {
        $this->a = $value1;
        $this->b = $value2;
    }


    public function addition()
    {
        $result = $this->a + $this->b;
        return $this->result($result); 
    }

    public function subtraction()
    {
        $result = $this->a - $this->b;
        return $this->result($result);
    }

    public function division() {
        if ($this->b != 0) {
        $result = $this->a / $this->b;
        return $this->result($result);

        } else {
            throw new \Exception("Pembagian dengan nol tidak diperbolehkan.");
        }
    }

    public function multiplication()
    {
        $result = $this->a * $this->b;
        return $this->result($result);
    }
}