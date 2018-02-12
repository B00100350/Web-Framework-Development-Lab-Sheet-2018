<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2/6/2018
 * Time: 4:01 PM
 */

namespace App\Repository;

use App\Entity\Student;

class StudentRepository
{
    private $student = [];

    public function __construct()
    {
        $id = 1;
        $s1 = new Student($id, 'Sean', 'Chan');
        $this->student[$id] = $s1;
        $id = 2;
        $s2 = new Student($id, 'Steven', 'Hu');
        $this->student[$id] = $s2;
        $id = 3;
        $s3 = new Student($id, 'Pauline', 'Song');
        $this->student[$id] = $s3;
    }

    public function findAll()
    {
        return $this->student;
    }

    public function find($id)
    {
        if (array_key_exists($id, $this->students)) {
            return $this->students[$id];
        } else {
            return null;
        }

    }
}

