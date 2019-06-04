<?php

namespace App\SlaveRentBundle\Tests;

use App\SlaveRentBundle\Models\RentInterface;
use App\SlaveRentBundle\Models\Slave;
use Carbon\Carbon;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class SlaveRentTest extends KernelTestCase
{
    public function testRentingSlave()
    {
        self::bootKernel();
        $container = self::$container;
        $rent = $container->get(RentInterface::class);
        $slave = $this->prepareSlave();
        $fromDate = new Carbon('2019-06-01 14:00');
        $toDate = new Carbon('2019-06-05 20:00');

        $isAvailable = $rent->isSlaveAvailableToRent($slave, $fromDate, $toDate);
        $this->assertTrue($isAvailable);

        $price = $rent->calculatePrice($slave, $fromDate, $toDate);
        $this->assertEquals(4500, $price);

        $renting = $rent->rentSlave($slave, $fromDate, $toDate);
        $this->assertTrue($renting);

    }

    private function prepareSlave(): Slave
    {
        $slave = new Slave();
        $slave->id = 1;
        $slave->nickName = 'Mark II';
        $slave->sex = 'male';
        $slave->age = 55;
        $slave->weight = 89;
        $slave->skinColor = 'black';
        $slave->origin = 'Egypt';
        $slave->description = 'Likes cats';
        $slave->hourRentPrice = '100';
        $slave->price = '2000';
        return $slave;
    }
}
