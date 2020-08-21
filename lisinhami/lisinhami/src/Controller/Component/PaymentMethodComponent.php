<?php

declare(strict_types=1);

namespace App\Controller\Component;

use App\Controller\Component\CommonComponent;

class PaymentMethodComponent extends CommonComponent
{
    public function initialize(array $config): void
    {
        $this->loadModel(['TPaymentMethod']);
    }

    public function getAllPaymentMethod(): array
    {
        $query = $this->TPaymentMethod->find()
            ->Where(['del_flg' => '0']);
        return $query->all()->toArray();
    }
}
