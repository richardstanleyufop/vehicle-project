<?php

declare(strict_types=1);

use Estudo\Projeto\Controller\DeleteVehicleController;
use Estudo\Projeto\Controller\EditUserController;
use Estudo\Projeto\Controller\EditVehicleController;
use Estudo\Projeto\Controller\NewVehicleController;
use Estudo\Projeto\Controller\UserFormController;
use Estudo\Projeto\Controller\VehicleFormController;
use Estudo\Projeto\Controller\VehicleListController;
use Estudo\Projeto\Infrastructure\ConnectionCreator;
use Estudo\Projeto\Repository\UserRepository;
use Estudo\Projeto\Repository\VehicleRepository;

require_once __DIR__ . '/../vendor/autoload.php';

session_start();
session_regenerate_id();

if (!array_key_exists('Logado', $_SESSION) && $_SERVER['PATH_INFO'] !== '/login'&& $_SERVER['PATH_INFO'] !== '/novo-usuario') {
    header('Location: /login');
    return;
}

$pdo= ConnectionCreator::Connection();
$vehicleRepository=new VehicleRepository($pdo);
$userRepository=new UserRepository($pdo);

if( !array_key_exists("PATH_INFO",$_SERVER)||$_SERVER['PATH_INFO']==='/'){
    $controller=new VehicleListController($vehicleRepository);
    $controller->processaRequisicao();


}elseif ($_SERVER['PATH_INFO']==='/novo-veiculo'){
    if($_SERVER['REQUEST_METHOD']==='GET'){
        $controller=new VehicleFormController($vehicleRepository);
        $controller->processaRequisicao();
    }elseif ($_SERVER['REQUEST_METHOD']==='POST'){
        $controller= new NewVehicleController($vehicleRepository);
        $controller->processaRequisicao();

    }
}elseif ($_SERVER['PATH_INFO']==='/editar-veiculo'){
    if($_SERVER['REQUEST_METHOD']==='GET'){
        $controller=new VehicleFormController($vehicleRepository);
        $controller->processaRequisicao();

    }elseif ($_SERVER['REQUEST_METHOD']==='POST'){
        $controller= new EditVehicleController($vehicleRepository);
        $controller->processaRquisicao();
    }
}elseif ($_SERVER['PATH_INFO']==='/remover-veiculo'){
    $controller=new DeleteVehicleController($vehicleRepository);
    $controller->processaRequisicao();

}elseif($_SERVER['PATH_INFO']==='/login'){
    if($_SERVER['REQUEST_METHOD']==='GET'){
        $controller=new \Estudo\Projeto\Controller\LoginFormController();
        $controller->processaRequisicao();

    }elseif($_SERVER['REQUEST_METHOD']==='POST'){
        $controller=new \Estudo\Projeto\Controller\LoginController();
        $controller->processaRequisicao($userRepository);
    }

}elseif($_SERVER['PATH_INFO']==='/logout'){
    $controller=new \Estudo\Projeto\Controller\LogoutController();
    $controller->processaRequisicao();
}elseif($_SERVER['PATH_INFO']==='/perfil'){
$controller=new \Estudo\Projeto\Controller\PerfilControler($userRepository);
$controller->processaRequisicao();
}elseif($_SERVER['PATH_INFO']==='/novo-usuario'){

    if($_SERVER['REQUEST_METHOD']==='GET'){
        $controller=new UserFormController($userRepository);
        $controller->processaRequisicao();

    }elseif($_SERVER['REQUEST_METHOD']==='POST'){
        $controller=new \Estudo\Projeto\Controller\NewUserController($userRepository);
        $controller->processaRequisicao();
    }

}elseif ($_SERVER['PATH_INFO']==='/editar-usuario'){
    if($_SERVER['REQUEST_METHOD']==='GET'){
        $controller=new UserFormController($userRepository);
        $controller->processaRequisicao();

    }elseif ($_SERVER['REQUEST_METHOD']==='POST'){
        $controller= new EditUserController($userRepository);
        $controller->processaRequisicao();
    }
}