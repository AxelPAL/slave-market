<?php

namespace App\SlaveRentBundle\Models;

interface CatalogInterface
{
    /**
     * @param int $categoryId
     * @return Slave[]
     */
    public function findSlavesInCategory(int $categoryId): array;
}
