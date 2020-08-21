<?php

declare(strict_types=1);

namespace App\Controller\Component;

use App\Controller\Component\CommonComponent;

class ShipUnitComponent extends CommonComponent
{
    public function initialize(array $config): void
    {
        $this->loadModel(['TShippingUnit']);
    }

    public function getAllShipUnit(): array
    {
        $query = $this->TShippingUnit->find()
            ->Where(['del_flg' => '0']);
        return $query->all()->toArray();
    }
}
