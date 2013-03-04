<?php

namespace Mutuh;

class Game {

    public function whoWillWin($input)
    {
        $reversedInput = strrev($input);

        if($input == $reversedInput) {
            return 'First';
        } else {
            //TODO finish
        }

        return 'First';
    }

}