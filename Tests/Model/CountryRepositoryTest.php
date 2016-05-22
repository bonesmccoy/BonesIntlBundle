<?php

namespace Bones\CommonBundle\Tests\Model;


use Bones\CommonBundle\Model\Location\Country;
use Bones\CommonBundle\Model\Location\CountryRepository;

class CountryRepositoryTest extends \PHPUnit_Framework_TestCase
{

    public function testValidRepository()
    {
        $repository = new CountryRepository();

        $countries = $repository->findAll();

        $this->assertTrue(count($countries) > 0);

        $italy = $repository->findOneByCode('IT');

        $this->assertTrue($italy instanceof Country);
        $this->assertEquals('Italy', $italy->getName());

    }
}
