<?php

use Estudo\Projeto\Repository\UserRepository;
use Estudo\Projeto\Repository\VehicleRepository;

require 'vendor/autoload.php';
$pdo= \Estudo\Projeto\Infrastructure\ConnectionCreator::Connection();


//$repositoryVehicle= new VehicleRepository($pdo);
//
//
//foreach ($repositoryVehicle->allVehicles() as $v){
//    echo $v->name.PHP_EOL;
//}
//$sql='INSERT INTO User(email,name,password) VALUES (?,?,?)';
//$statement=$pdo->prepare($sql);
//$name=readline("insira o nome: ");
//$email=readline('insira o email: ');
//$password=readline('insira a senha: ');
//$hash=password_hash($password, PASSWORD_ARGON2ID);
//$statement->bindValue(1,$email);
//$statement->bindValue(2,$name);
//$statement->bindValue(3,$hash);
//$statement->execute();
$Ruser=new \Estudo\Projeto\Repository\UserRepository($pdo);
$user=$Ruser->findUser('alicinha@gmail.com');
echo $user->password;
$pass="123";
if(password_verify($pass,$user->password)){
    echo "BBBBB";
}
//$p1="123";
//$p2="123";
//$hash=password_hash($p1,PASSWORD_ARGON2ID);
//if(password_verify($p2,$hash)){
//    echo "BBBBB";
//}
$a=['user1'=>$user];
array_push($a,['user2'=>$user]);


extract($a);
echo $a->email.PHP_EOL;
