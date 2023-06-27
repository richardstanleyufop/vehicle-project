<?php

namespace Estudo\Projeto\Controller;

use Estudo\Projeto\Repository\VehicleRepository;

class NewVehicleController
{
    public function __construct(private VehicleRepository $vehicleRepository){

    }
    public function processaRequisicao(){
        $name=filter_input(INPUT_POST,'nome');
        $plate=filter_input(INPUT_POST,'placa');
        $year=filter_input(INPUT_POST,'ano');
        $url=filter_input(INPUT_POST,'url');
        $c=new \Estudo\Projeto\Model\Vehicle($name,$plate,$year,$url);
        if($this->vehicleRepository->newVehicle($c)){
            header('Location: /?sucesso=1');
        }else{
            header('Location: /?sucesso=0');
        }
    }

}