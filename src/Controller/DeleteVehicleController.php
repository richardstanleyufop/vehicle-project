<?php

namespace Estudo\Projeto\Controller;

use Estudo\Projeto\Repository\VehicleRepository;

class DeleteVehicleController
{
    public function __construct(private VehicleRepository $vehicleRepository)
    {
    }
    public function processaRequisicao(){
        $id=filter_input(INPUT_GET,'id');
        if($this->vehicleRepository->removeVehicle($id)){
            header('Location: /?sucesso=1');
        }else{
            header('Location: /?sucesso=0');
        }
    }

}