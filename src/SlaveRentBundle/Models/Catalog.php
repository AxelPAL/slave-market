<?php

namespace App\SlaveRentBundle\Models;

class Catalog implements CatalogInterface
{

    /**
     * @param int $categoryId
     * @return Slave[]
     */
    public function findSlavesInCategory(int $categoryId): array
    {
        // TODO: Implement findSlavesInCategory() method.
    }
}
