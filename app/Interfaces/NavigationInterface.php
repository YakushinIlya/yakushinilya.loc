<?php

namespace App\Interfaces;

interface NavigationInterface
{
    public static function getAll(int $count, object $model);
    public static function getId(int $id, object $model);
    public static function create(array $data, object $model);
    public static function update(int $id, array $data, object $model);
    public static function delete(int $id, object $model);
}
