<?php
# Does the work of repeating several tests and analysing them.
include_once 'ListSet.lib.php';


class RepeatAndStats {
    private $listSize = 100;
    private $repeats = 0;
    
    private $allStats = array();
    
    function __construct($listSize) {
        $this->listSize = $listSize;
    }
    
    public function repeat($numberOftimes) {
        for ($i = 0; $i < $numberOftimes; $i++) {
            $this->repeats ++;
            
            $set = new ListSet($this->listSize);
            
            // Find the raw loops.
            $loops = $set->findLoops();

            // Find how large each set of loops is.
            $loopSizes = $set->getLoopsSizes($loops);

            // Show stats on loop sizes.
            $stats = $set->getLoopsStats($loopSizes);
            $this->allStats[] = $stats;
            #$set->prettyPrintStats($stats);
        }
        
        return $this->allStats;
    }
    
    public function analyseStats($stats) {
        $passes=0;
        
        foreach ($stats as $repeatRun) {
            if ($repeatRun['passed']) $passes++;
        }
        
        $percentPass = round($passes / $this->repeats * 100, 2);
        
        echo "$passes/{$this->repeats} = $percentPass%\r\n";
    }
}
?>
