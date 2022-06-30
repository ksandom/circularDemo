<?php
# Does the work for creating the list, and analysing the loops.

class ListSet {
    private $listSize=100;
    private $list = array();
    private $alreadyDone = array();
    
    function __construct($listSize) {
        $this->listSize = $listSize;
        
        $this->buildList();
    }
    
    private function buildList() {
        $allocations = $this->getOrderedList();
        shuffle($allocations);
        
        $boxID=0;
        foreach ($allocations as $allocation) {
            $this->list[$boxID] = $allocation;
            $boxID++;
        }
    }
    
    private function getOrderedList() {
        return range(0, $this->listSize-1);
    }
    
    public function findLoops() {
        $this->alreadyDone = array_fill(0, $this->listSize, false);
        $loops = array();
        
        for ($boxID = 0; $boxID < $this->listSize; $boxID++) {
            if (!$this->alreadyDone[$boxID] === true) {
                $loops[] = $this->getLoopForID(array(), $boxID);
            }
        }
        
        return $loops;
    }
    
    private function getLoopForID($loopSoFar, $ID) {
        $this->alreadyDone[$ID] = true;
        $newID = $this->list[$ID];
        $loopSoFar[$ID] = $newID;
        
        if (!$this->alreadyDone[$newID] === true) {
            return $this->getLoopForID($loopSoFar, $newID);
        } else {
            return $loopSoFar;
        }
    }
    
    public function getLoopsSizes($loops) {
        $loopsSizes = array();
        
        foreach ($loops as $loop) {
            $loopsSizes[]=count($loop);
        }
        
        return $loopsSizes;
    }
    
    public function getLoopsStats($loopsSizes) {
        $stats = array("min" => $this->listSize, "max" => 0, "avg" => 0, "total" => 0, "passed"=> false);
        
        foreach ($loopsSizes as $loopSize) {
            if ($loopSize > $stats['max']) $stats['max'] = $loopSize;
            if ($loopSize < $stats['min']) $stats['min'] = $loopSize;
            
            $stats['total'] += $loopSize;
        }
        
        $stats['avg'] = round($stats['max']/count($loopsSizes), 2);
        
        $stats['passed'] = ($stats['max'] <= round($this->listSize / 2));
        
        return $stats;
    }
    
    public function prettyPrintStats($stats) {
        $min = str_pad($stats['min'], 10, " ");
        $max = str_pad($stats['max'], 10, " ");
        $avg = str_pad($stats['avg'], 10, " ");
        $total = str_pad($stats['total'], 10, " ");
        $passes = str_pad(($stats['passed'])?"pass":"fail", 10, " ");
        echo "min=$min max=$max average=$avg total=$total $passes\r\n";
    }
    
    public function displayList() {
        print_r($this->list);
    }
}
?>
