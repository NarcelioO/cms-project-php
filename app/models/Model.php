<?php

namespace app\database\models;

abstract class Model
{
    public function create()
    {
        var_dump('create');
    }
    public function read()
    {
        var_dump('read');
    }
    public function update()
    {
        var_dump('update');
    }
    public function delete()
    {
        var_dump('delete');
    }
};