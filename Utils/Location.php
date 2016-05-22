<?php

namespace Bones\CommonBundle\Utils;


use Bones\CommonBundle\Model\Location\LocationInterface;

class Location
{

    /**
     * @param LocationInterface[] $locationList
     * @return array
     */
    public static function locationListToSimpleArray($locationList = array())
    {
        $array = array();
        foreach($locationList as $key => $value) {
            $array[$key] = $value->getName();
        }

        return $array;
    }
}
