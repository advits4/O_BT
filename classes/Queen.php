<?php 

class Queen extends Bee {

    public function __construct() {
        $this->lifePoint = $_SESSION[AppConfig::getAppName()][get_class($this)]['lifePoint'] ?? 100;
        $this->hitPoint = $_SESSION[AppConfig::getAppName()][get_class($this)]['hitPoint'] ?? 8;
        $this->noOfBees = $_SESSION[AppConfig::getAppName()][get_class($this)]['noOfBees'] ?? 1;
        $this->listOfBees = $_SESSION[AppConfig::getAppName()][get_class($this)]['listOfBees'] ?? $this->generateBees($this->noOfBees, $this->lifePoint);
        $this->beeType = get_class($this);
    }

    protected function setLifePoint(int $lifePoint) {
        $this->lifePoint = $lifePoint;
        $_SESSION[AppConfig::getAppName()][get_class($this)]['lifePoint'] = $this->lifePoint;
    }

    public function getLifePoint() {
        return $this->lifePoint;
    }

    protected function setHitPoint(int $hitPoint) {
        $this->hitPoint = $hitPoint;
        $_SESSION[AppConfig::getAppName()][get_class($this)]['hitPoint'] = $this->hitPoint;
    }

    public function getHitPoint() {
        return $this->hitPoint;
    }

    protected function setNoOfBees(int $noOfBees) {
        $this->noOfBees = $noOfBees;
        $_SESSION[AppConfig::getAppName()][get_class($this)]['noOfBees'] = $this->noOfBees;
    }

    public function getNoOfBees() {
        return $this->noOfBees;
    }

    public function setListOfBees($listOfBees) {
        $this->listOfBees = $listOfBees;
        $_SESSION[AppConfig::getAppName()][get_class($this)]['listOfBees'] = $this->listOfBees;
    }

    public function getListOfBees() {
        return $this->listOfBees;
    }
}