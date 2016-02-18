<?php

namespace App;


class RandomMapGen implements IMapGen
{
    /** 
     * @param int $length
     * @param int $width
     * @param int $count
     * @return array
     */
    public function generate(array $params)
    {
        $maxOnRow = \round($params['count'] / $params['width'], 0);
        
        $map = [];
        for ($i = 1; $i <= $params['width']; $i++){
            $row = $this->getRow($params['length'], $maxOnRow);
            $map[] = $row;
        }
        
        return $map;
    }
    
    
    private function getRow($length, $maxOnRow)
    {
        $onRow = \rand(0, $maxOnRow);
        $contents = []; 
        for ($i = 1; $i <= $length; $i++) {
            $contents[] = 0;
        } 
        for ($i = 0; $i < $onRow; $i++) {
            if ($i < $length) {
                $contents[$i] = 1;                
            }
        } 
        
        $shuffleArray = [];
        \shuffle($contents);
        foreach ($contents as $content) {
            $shuffleArray[] = $content;
        }

        return $shuffleArray;
    }
}