<?php

namespace Coffeeshop;


class Barman implements IBarman
{
    protected $execution;


    public function clean($where, $finder)
    {
        $finder->where($where);
        $this->execution = $finder->find();
        $map = $where->generateMap(0);
        $where->updateMap($map);
        
        return $where;
    }
    
    
    public function spill($what, $where)
    { 
        $volume = $what->getVolume();
        $map = $where->generateMap($volume);
        $where->updateMap($map);

        return $where;
    }
    
    
    public function getExecution($where)
    {
        $map = $where->getMap();
        $positions = [];
        foreach ($this->execution as $value) {
            $positions[$value['number']] = $value['pos'];
        }
        foreach ($positions as $key => $position) {
            foreach ($position as $value) {
                $map[$value[0]][$value[1]] = $key;                
            }
        }
        $where->updateMap($map);
        
        \printf("Barman utrel %d kaluží, najväčšia bola %d a bola veľká %d.",
                \count($this->execution),
                $this->execution[0]['number'],
                $this->execution[0]['size']
        );
        
        return $where;
    }
}
