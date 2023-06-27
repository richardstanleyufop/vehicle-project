<?php

namespace Estudo\Projeto\Controller;

use Estudo\Projeto\Repository\VehicleRepository;

class EditVehicleController
{
    public function __construct(private VehicleRepository $vehicleRepository){

    }
    public function processaRquisicao(){
        $name=filter_input(INPUT_POST,'nome');
        $plate=filter_input(INPUT_POST,'placa');
        $year=filter_input(INPUT_POST,'ano');
        $url=filter_input(INPUT_POST,'url');
        $id=filter_input(INPUT_GET,'id');
        $c=new \Estudo\Projeto\Model\Vehicle($name,$plate,$year,$url);
        $c->setId($id);
        if($this->vehicleRepository->editVehicle($c)){
            header('Location: /?sucesso=1');
        }else{
            header('Location: /?sucesso=0');
        }
    }

}