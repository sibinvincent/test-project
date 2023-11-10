<?php


namespace App\Repositories\Contracts;


interface UserRepository
{
    /**
     * insert user row
     * @param array $data
     * @return \App\Models\User
     */
    public function create($data);

    /**
     * get user row by id
     * @param $id
     * @return \App\Models\User
     */
    public function find($id);

    /**
     * get user row by id
     * @param $email
     * @param array $relations
     * @return \App\Models\User
     */
    public function findByEmail($email,$relations=[]);
}
