<?php

namespace Zion03;

class Game {

    public function whoWillWin($input)
    {

        $arr=array();
        for($i=0;$i<strlen($input);$i++){
            if (isset($arr[$input[$i]])){
                $arr[$input[$i]]++;
            }else{
                $arr[$input[$i]]=1;
            }
        }

        $nochet=array();
        foreach($arr as $i){
            if ($i%2!=0) $nochet[]=$i;
        }

        if (count($nochet)%2!=0 || count($nochet)==0) return 'First';
        return 'Second';

    }

}
