<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/DB.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/User.php';

class UserManager {

    // Get all User
    public function getUser() {
        $user = [];
        $request = DB::getInstance()->prepare("SELECT * FROM user");
        $result = $request->execute();
        if ($result) {
            $data = $request->fetchAll();
            foreach($data as $user_data) {
                $user[] = new User($user_data['id'], $user_data['name'], $user_data['password'], $user_data['role_fk']);
            }
        }
    return $user;
    }

    // Get User by Id
    public function getById(int $id){
        $user = [];
        $request = DB::getInstance()->prepare("SELECT * FROM user WHERE id = :id");
        $request->bindValue(':id', $id);
        $result = $request->execute();
        if($result) {
            $user_data = $request->fetch();
            if($user_data) {
                $user = new User($user_data['id'], $user_data['name'], $user_data['password'], $user_data['role_fk']);
            }
        }
        return $user;
    }

    // If user's Id is null or equal to 0, that's an insert into DB
    public function saveUser(User $user) {
        if ($user->getId() === 0 ||$user->getId() == null) {
            $request = DB::getInstance()->prepare("
        INSERT INTO user(name, password, role_fk) VALUES (:name, :password, :role_fk)
        ");

            $request->bindValue(':name', $user->getUsername());
            $request->bindValue(':password', $user->getPassword());
            $request->bindValue(':role_fk', $user->getRole());

            $request->execute();

            if ($request) {
                echo "User saved in DB";
            }
        }

        // Else it's an User's update
        else {
            $request = DB::getInstance()->prepare("
            UPDATE user SET name = :name, password = :password, role_fk = :role_fk WHERE id = :id
            ");

            $request->bindValue(':name', $user->getUsername());
            $request->bindValue(':password', $user->getPassword());
            $request->bindValue(':role_fk', $user->GetRole());
            $request->bindValue(':id', $user->getId());

            $request->execute();

            if ($request) {
                echo "User updated";
            }
        }

    }


    //Deleted User from DB
    public function delUser(User $user) {
        $request = DB::getInstance()->prepare("
        DELETE FROM user WHERE id = :id;
        ");
        $request->bindValue('id', $user->getId());

        $result = $request->execute();
        if ($result) {
            echo "User supprim??";
        }
    }

}