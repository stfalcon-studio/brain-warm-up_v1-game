<?php

namespace vatseek;

class Game
{
    protected $whichStep = 'First';

    /**
     * main function
     *
     * @param string $input
     * @return string
     */
    public function whoWillWin($input)
    {
        $length = strlen($input);

        for($i = 0; $i < $length; $i++) {
            if ($this->checkString($input)) {
                return $this->whichStep;
            }
            else {
                $this->changeStep();
                $input = $this->removeLiteral($input);
            }
        }
    }

    /**
     * delete selected literal from string
     *
     * @param string $string
     * @param string $litera
     * @return string
     */
    public function delCaracter($string, $litera)
    {
        $string = str_split($string);

        foreach ($string as $key => $literal) {
            if ($literal == $litera) {
                unset($string[$key]);
                break;
            }
        }

        return implode($string);
    }

    /**
     * Chose wish liter may be deleted
     *
     * @param $input
     * @return string
     */
    public function removeLiteral($input)
    {
        $data = array();
        $string = str_split($input);
        $pairedCount = 0;
        $unpairedCount = 0;
        $paired = array();
        $unpaired = array();

        foreach ($string as $literal) {
            if (!isset($data[$literal])) {
                $data[$literal] = 1;
            }
            else {
                $data[$literal] = $data[$literal] + 1;
            }
        }

        foreach ($data as $key => $literal) {
            if (!($literal%2)) {
                $pairedCount++;
                $paired[] = $key;
            }
            else {
                $unpairedCount++;
                $unpaired[] = $key;
            }
        }

        if ($unpairedCount < 3 && $pairedCount) {
            return $this->delCaracter($input, $paired[0]);
        }
        else {
            return $this->delCaracter($input, $unpaired[0]);
        }
    }

    /**
     * Check is string palindrom
     *
     * @param string $input
     * @return bool
     */
    public function checkString($input)
    {
        $data = array();
        $input = str_split($input);

        if (count($input) == 1) {
            return true;
        }

        foreach ($input as $literal) {
            if (!isset($data[$literal])) {
                $data[$literal] = 1;
            }
            else {
                $data[$literal] = $data[$literal] + 1;
            }
        }

        foreach ($data as $key => $literal) {
            if (!($literal%2)) {
                unset($data[$key]);
            }
        }

        if (count($data) == 0 || count($data) == 1) {
            return true;
        }

        return false;
    }

    /**
     * change user which turn
     */
    public function changeStep()
    {
        if ($this->whichStep == 'First') {
            $this->whichStep = 'Second';
        }
        else {
            $this->whichStep = 'First';
        }
    }
}