<?php

abstract class Bee {
    protected int $lifePoint;
    protected int $hitPoint;
    protected int $noOfBees;
    protected string $beeType;
    protected array $listOfBees;

    // These abstract properties are declared to set individual properties of a specific bee type
    abstract protected function setLifePoint(int $lifePoint);
    abstract public function getLifePoint();

    abstract protected function setHitPoint(int $hitPoint);
    abstract public function getHitPoint();

    abstract protected function setNoOfBees(int $noOfBees);
    abstract public function getNoOfBees();

    abstract protected function setListOfBees(array $listOfBees);
    abstract public function getListOfBees();

    // This function is responsible to select a random bee and hit it
    public function isHit() {
        $beeId = $this->selectRandomBee();
        $beesList = $this->getListOfBees();
        
        $newLifePoint = $beesList[$beeId] - $this->getHitPoint();
        $beesList[$beeId] = 0;
        if ($newLifePoint > 0) {
            $beesList[$beeId] = $newLifePoint;
        }
        // if a specific bee looses all its point
        if ($beesList[$beeId] < 1) {
            // we kill it
            $noOfBees = ($this->getNoOfBees() - 1 > 0) ? $this->getNoOfBees() - 1 : 0 ;
            $this->setNoOfBees($noOfBees);
        }
        
        $this->setListOfBees($beesList);
    }

    // This function will return only alive bees
    private function selectRandomBee() {
        $listOfBees =  array_filter($this->getListOfBees()); # get list of alive bee with array_filter
        $beeId = array_rand($listOfBees);
        return $beeId;
    }

    // returns total points of a bee type
    public function getTotalPoints() {
        return (array_sum($this->getListOfBees()));
    } 
    
    // resets everything to restart the cycle
    public function reset() {
        $this->setLifePoint(0);
        $this->setHitPoint(0);
        $this->setNoOfBees(0);
        $this->setListOfBees([]);
    }

    // generates the bee structure
    protected function generateBees($noOfBees, $lifePoint) {
        return array_fill(0, $noOfBees, $lifePoint);
    }
}