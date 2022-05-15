<?php

class Hive {
    private string $viewPath;
    private string $pageTitle;
    private Queen $queen;
    private Worker $worker;
    private Drone $drone;
    private bool $firstLoad; 

    public function __construct(Queen $queen, Worker $worker, Drone $drone) {
        $this->viewPath = AppConfig::getRootPath() . 'views/HiveView.php';
        $this->pageTitle = AppConfig::getPageTitle();
        $this->queen = $queen;
        $this->worker = $worker;
        $this->drone = $drone;
        $this->firstLoad = false;
        if (!isset($_SESSION['firstLoad'])) {
            $this->firstLoad = true;
            $_SESSION['firstLoad'] = false;
        }
    }

    // this function is responsible for generating the hive with bees
    public function generateHive() {
        $msg = '';
        // Trigger a hit on the bee when a user clicks the button
        if (!$this->firstLoad && $_SERVER['REQUEST_METHOD'] === 'POST') {    
            $msg = $this->hitBee();
        }
        
        // sprintf to display numbers in 3 digits all the time
        $queenPoints = sprintf("%03d", $this->queen->getTotalPoints());
        $isQueenDead = 'no';
        if ($queenPoints < 1) { // game over
            $this->reset();
            $isQueenDead = 'yes';
        }
        
        $totalQueenBees =  $this->queen->getNoOfBees();

        $totalWorkerBees =  $this->worker->getNoOfBees();
        $workerPoints =  sprintf("%03d", $this->worker->getTotalPoints());
        $areWorkersDead =  ($workerPoints > 0) ? 'no' : 'yes';

        $totalDroneBees =  $this->drone->getNoOfBees();
        $dronePoints = sprintf("%03d", $this->drone->getTotalPoints());
        $areDronesDead = ($dronePoints > 0) ? 'no' : 'yes';
        
        return compact(
            'totalQueenBees',
            'totalWorkerBees',
            'totalDroneBees',
            'isQueenDead',
            'areWorkersDead',
            'areDronesDead',
            'queenPoints',
            'workerPoints',
            'dronePoints',
            'msg'
        );
    }

    private function hitBee() {
        // We do this to only kill the alive bees
        $bees = [
            'queen'=> $this->queen->getNoOfBees(),
            'worker' => $this->worker->getNoOfBees(), 
            'drone'=> $this->drone->getNoOfBees(),
        ];
        $aliveBees = array_keys(array_filter($bees));
        if (empty($aliveBees)) {
            return 'no bees are alive';
        }
        $beeToHit = array_rand($aliveBees);

        // Initiate hitting sequence
        $this->{$aliveBees[$beeToHit]}->isHit();

        // Return a simple message to display the user
        return ($aliveBees[$beeToHit] . ' is hit.');
    }

    // reset all data to start fresh
    public function reset() {
        session_destroy();
        $this->queen->reset();
        $this->worker->reset();
        $this->drone->reset();
    }

    // to render and pass variables to the view
    public function generateView() {
        $data = $this->generateHive();
        $submitBtnValue = $data['isQueenDead'] === 'yes' ? 'Reset' : 'Hit a bee';
        Render::generateView($this->viewPath, array_merge(
                [
                    'title'=>$this->pageTitle, 
                    'submitBtn' => $submitBtnValue
                ], 
                $data
            ));
    }
}