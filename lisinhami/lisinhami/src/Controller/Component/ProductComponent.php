<?php
  declare(strict_types=1);

namespace App\Controller\Component;

use App\Controller\Component\CommonComponent;

class ProductComponent extends CommonComponent
{
    public function initialize(array $config): void
    {
        $this->loadModel(['TProduct']);
    }

    public function getAllProduct(): array
    {
        $query = $this->TProduct->find()
                ->order(['TProduct.id DESC'])
                ->limit(3);
        return $query->all()->toArray();   
    }

    // public function update($data): array
    // {
    //     if (!empty($data['id'])) {
    //         $ac = $this->TAccounts->get($data['id']);
    //         $ac = $this->TAccounts->patchEntity($ac, $data);
    //     } else {
    //         $ac = $this->TAccounts->newEntity($data);
    //     }
    //     $result = $this->TAccounts->save($ac);
    //     if ($ac->hasErrors()) {
    //         return [
    //             'result' => 'invalid',
    //             'data' => $ac->getErrors()
    //         ];
    //     }
    //     return [
    //         'result' => 'success',
    //         'data' =>  $result
    //     ];
    // }
}