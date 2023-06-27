<?php

namespace Estudo\Projeto\Controller;

use Estudo\Projeto\Model\Vehicle;
use Estudo\Projeto\Repository\VehicleRepository;

class VehicleFormController extends HtmlController
{
    public function __construct(private VehicleRepository $vehicleRepository){

    }
    public function processaRequisicao(){

        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        /** @var ?Vehicle $vehicle */
        $vehicle = null;
        if ($id !== false && $id !== null) {
            $vehicle= $this->vehicleRepository->find($id);
        }

        echo $this->renderTemplate('vehicle-form.php',['vehicle'=>$vehicle]);

    }


}