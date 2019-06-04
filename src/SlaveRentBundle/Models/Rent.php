<?php

namespace App\SlaveRentBundle\Models;

use Carbon\Carbon;

class Rent implements RentInterface
{

    public function rentSlave(Slave $slave, Carbon $fromDate, Carbon $toDate): bool
    {
        // TODO: Implement rentSlave() method.
    }

    public function isSlaveAvailableToRent(Slave $slave, Carbon $fromDate, Carbon $toDate): bool
    {
        // TODO: Implement isSlaveAvailableToRent() method.
    }

    public function calculatePrice(Slave $slave, Carbon $fromDate, Carbon $toDate): bool
    {
        // TODO: Implement calculatePrice() method.
    }
}
