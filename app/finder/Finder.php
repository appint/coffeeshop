<?php

namespace App;


class Finder
{
    protected $where;
    private $map;
    private $helpMap;
    private $occurrences = [];
    private $occurrence = -1;
        
        
    /** 
     * @return array
     */
    public function find()
    {
        $where = $this->getWhere();
        $this->map = $where->getMap();
        $this->helpMap = $where->generateMap();
        
        for($w = 0; $w < $where->getWidth(); $w++) {
            for($l = 0; $l < $where->getLength(); $l++) {                            
                if ($this->isDirty($w, $l) == 1 && $this->helpMap[$w][$l] == 0) {
                    $this->helpMap[$w][$l] = 1;
                    $this->occurrence++;                    
                    $this->occurrences[$this->occurrence] = [
                        'number' => $this->occurrence +1,
                        'size' => 1,
                        'pos' => [[$w, $l]]
                    ]; 
                    $this->found($w, $l);
                }
            }
        }        
        \usort($this->occurrences, ["App\Finder", "cmp"]);
        
        return $this->occurrences;
    }
        
        
    protected function found($w, $l)
    {
        $where = $this->getWhere();
        
        $wNoEnd = ($w != $where->getWidth() - 1);
        $lNoEnd = ($l != $where->getLength() - 1);
		
        if ($wNoEnd && $lNoEnd) {$this->next($w + 1, $l + 1);}//down right 
        if ($w != 0 && $l != 0) {$this->next($w - 1, $l - 1);}//up left
        if ($wNoEnd && $l != 0) {$this->next($w + 1, $l - 1);}//down left
        if ($w != 0 && $lNoEnd) {$this->next($w - 1, $l + 1);}//up right
        if ($lNoEnd) {$this->next($w, $l + 1);} // right
        if ($l != 0) {$this->next($w, $l - 1);} //left
        if ($wNoEnd) {$this->next($w + 1, $l);} // down
        if ($w != 0) {$this->next($w - 1, $l);} // up
    }    
    
	
    protected function next($w, $l)
    {
        if ($this->isDirty($w, $l) == 1 && $this->helpMap[$w][$l] == 0) {
            $this->helpMap[$w][$l] = 1;
            $this->occurrences[$this->occurrence]['size'] += 1;
            \array_push($this->occurrences[$this->occurrence]['pos'], [$w, $l]);
            $this->found($w, $l);	
        }
    }
    
    
    public function cmp($a, $b)
    {
        if ($a['size'] == $b['size']) {return 0;}
        return ($a['size'] > $b['size']) ? -1 : +1;
    }
	

    /**
     * @return int
     */
    protected function isDirty($w, $l)
    {
        return $this->map[$w][$l];
    }
        
    
    public function where($where)
    {
        $this->where = $where;
    }
    
    
    protected function getWhere()
    {
        if ($this->where === NULL) {
            echo 'Please set $where : '.__METHOD__;
        }
        return $this->where;
    }    
}