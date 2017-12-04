<?php

function autoload($class){
    require_once($class . ".php");
}

class Arithmetic {
    public function add($a, $b) {
        $numArgs = func_num_args();

        if ($numArgs != 2) {
            throw new UnexpectedValueException('required args: 2; actual args: ' . $numArgs);
        }

        if (!is_int($a)) throw new InvalidArgumentException($a . ' is not an int!');

        if (!is_int($b)) throw new InvalidArgumentException($b . ' is not an int!');

        return $a + $b;
    }
}