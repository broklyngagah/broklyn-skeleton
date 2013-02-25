<?php

namespace Application\Post\Model;

class CityModel
{
   public static function getUserData(\Silex\Application $app)
   {
       $sql = "select * from user";
       $query = $app['db']->prepare($sql);
       $query->execute();

       return $query->fetchAll(\PDO::FETCH_ASSOC);
   }


}