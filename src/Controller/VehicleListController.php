<?php

namespace Estudo\Projeto\Controller;

use Estudo\Projeto\Infrastructure\ConnectionCreator;
use Estudo\Projeto\Repository\VehicleRepository;
use PDO;

class VehicleListController extends HtmlController
{

    public function __construct(private VehicleRepository $vehicleRepository){

    }

    public function processaRequisicao(){
        $vehicleList=$this->vehicleRepository->allVehicles();
        echo $this->renderTemplate('vehicle-list.php',['vehicleList'=>$vehicleList]);

    }

}