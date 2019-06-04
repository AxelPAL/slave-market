<?php

namespace App\SlaveRentBundle\Models;

use Carbon\Carbon;

interface RentInterface
{
    public function rentSlave(Slave $slave, Carbon $fromDate, Carbon $toDate): bool;

    public function isSlaveAvailableToRent(Slave $slave, Carbon $fromDate, Carbon $toDate): bool;

    public function calculatePrice(Slave $slave, Carbon $fromDate, Carbon $toDate): bool;
}