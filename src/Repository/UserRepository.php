<?php

namespace Estudo\Projeto\Repository;

use Estudo\Projeto\Model\User;

class UserRepository
{ private \PDO $pdo;

    public function __construct($pdo)
    {
        $this->pdo=$pdo;
    }
    public function userRegister(User $user):bool
    {
        $sql='INSERT INTO User(name,email,password,img) VALUES (?,?,?,?)';
        $statement=$this->pdo->prepare($sql);
        $statement->bindValue(1,$user->name);
        $statement->bindValue(2,$user->email);
        $statement->bindValue(3,$user->password);
        $statement->bindValue(4,$user->img);

        return $statement->execute();


    }
    public function findUser(string $email):User{
        $sql='SELECT * FROM User WHERE email=? ';
        $statement=$this->pdo->prepare($sql);
        $statement->bindValue(1,$email);


        $statement->execute();
       $user=$statement->fetch(\PDO::FETCH_ASSOC);

        if(is_bool($user)){


            return new User('','','','');
        }else{

            return $this->hydrateUser($user);
        }

    }
    private function hydrateUser(array $userData): User
    {
        $user = new User($userData['name'], $userData['email'],$userData['password'],$userData['img']??'');
        $user->setId($userData['id']);

        return $user;
    }
    public function editUser(User $user):bool
    {
        if($user->img===null){
            $sql="UPDATE User SET name=:name,email=:email,password=:password WHERE id=:id ";
            $statement=$this->pdo->prepare($sql);
            $statement->bindValue(':name',$user->name);
            $statement->bindValue(':email',$user->email);

            $statement->bindValue(':password',$user->password);
            $statement->bindValue(':id',$user->id);
            return $statement->execute();

        }else{
            $sql="UPDATE User SET name=:name,email=:email,img=:img,password=:password WHERE id=:id ";
            $statement=$this->pdo->prepare($sql);
            $statement->bindValue(':name',$user->name);
            $statement->bindValue(':email',$user->email);
            $statement->bindValue(':img',$user?->img);
            $statement->bindValue(':password',$user->password);
            $statement->bindValue(':id',$user->id);
            return $statement->execute();
        }

    }

}