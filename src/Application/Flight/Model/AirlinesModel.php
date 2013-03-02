<?php

namespace Application\Flight\Model;

class AirlinesModel
{

    public static function getAirlines(\Silex\Application $app)
    {
        $sql = "select * from user";
        $query = $app['db']->prepare($sql);
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }
}