<?php

namespace Estudo\Projeto\Repository;
use Estudo\Projeto\Infrastructure\ConnectionCreator;
use Estudo\Projeto\Model\Vehicle;
use PDO;

require_once __DIR__ . '/../../vendor/autoload.php';

class VehicleRepository
{ private \PDO $pdo;

    public  function __construct($pdo)
    {
        $this->pdo=$pdo;
    }
    public function allVehicles(): array
    {
       $vehicleList=$this->pdo->query('SELECT * FROM Vehicle')->fetchAll(PDO::FETCH_ASSOC);
       return array_map(
           function (array $vehicleData){
               $vehicle=new Vehicle($vehicleData['name'],$vehicleData['plate'],$vehicleData['year'],$vehicleData['link']);
               $vehicle->setId($vehicleData['id']);
               return $vehicle;
           },$vehicleList
           );
    }
    public function newVehicle(Vehicle $vehicle):bool
    {
        $sql='INSERT INTO Vehicle(name,plate,year,link) VALUES (?,?,?,?)';
        $statement=$this->pdo->prepare($sql);
        $statement->bindValue(1,$vehicle->name());
        $statement->bindValue(2,$vehicle->plate());
        $statement->bindValue(3,$vehicle->year());
        $statement->bindValue(4,$vehicle->getUrl());

        return $statement->execute();

    }
    public function removeVehicle(int $id):bool
    {
        $sql='DELETE FROM Vehicle WHERE id=?';
        $statement=$this->pdo->prepare($sql);
        $statement->bindValue(1,$id);
        return $statement->execute();

    }
    public function editVehicle(Vehicle $vehicle):bool
    {
        $sql="UPDATE Vehicle SET name=:name,plate=:plate,year=:year,link=:link WHERE id=:id ";
        $statement=$this->pdo->prepare($sql);
        $statement->bindValue(':name',$vehicle->name());
        $statement->bindValue(':plate',$vehicle->plate());
        $statement->bindValue(':year',$vehicle->year());
        $statement->bindValue(':link',$vehicle->getUrl());
        $statement->bindValue(':id',$vehicle->id());
        return $statement->execute();
    }
    public function find(int $id)
    {
        $statement = $this->pdo->prepare('SELECT * FROM Vehicle WHERE id = ?;');
        $statement->bindValue(1, $id, \PDO::PARAM_INT);
        $statement->execute();

        return $this->hydrateVehicle($statement->fetch(\PDO::FETCH_ASSOC));
    }

    private function hydrateVehicle(array $vehicleData): Vehicle
    {
        $vehicle = new Vehicle($vehicleData['name'], $vehicleData['plate'],$vehicleData['year'],$vehicleData['link']);
        $vehicle->setId($vehicleData['id']);

        return $vehicle;
    }




}