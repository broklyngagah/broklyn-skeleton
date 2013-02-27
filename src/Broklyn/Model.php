<?php

namespace Broklyn;

use Doctrine\DBAL\Connection;

abstract class Model
{
    abstract public function getTableName();

    public $db;

    public function __construct(Connection $db = null)
    {
        $this->db = $db;
    }
}