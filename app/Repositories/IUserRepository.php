<?php
namespace App\Repositories;

interface IUserRepository {

    public function createOrUpdate( $id = null, $collection = [] );

    public function getUserById($id);

    public function deleteUser($id);

}
