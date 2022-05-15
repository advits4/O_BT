<?php 

class Worker extends Bee {
    // everything in this class is done to set unique class properties
    public function __construct() {
        $this->lifePoint = $_SESSION[AppConfig::getAppName()][get_class($this)]['lifePoint'] ?? 75;
        $this->hitPoint = $_SESSION[AppConfig::getAppName()][get_class($this)]['hitPoint'] ?? 10;
        $this->noOfBees = $_SESSION[AppConfig::getAppName()][get_class($this)]['noOfBees'] ?? 5;
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