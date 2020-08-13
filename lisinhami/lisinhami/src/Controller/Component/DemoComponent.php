<?php
  declare(strict_types=1);

namespace App\Controller\Component;

use App\Controller\Component\CommonComponent;

/**
 * Demo component
 */
class DemoComponent extends CommonComponent
{
    public function initialize(array $config): void
    {
        $this->loadModel(['TAccount']);
    }

    public function getAllAccount(): array
    {
        $query = $this->TAccounts->find();
        return $query->all()->toArray();
    }

    public function getAccountById($account_id): array
    {
        
        // Get data member
        $data = $this->TAccounts
                ->find()
                ->select('id')
                ->where([
                    'TAccounts.id' => (int) $account_id
                ])
                ->first();

        return $data ? $data->toArray() : [];
    }
    public function save($data): array
    {
        if (!empty($data['id'])) {
            $ac = $this->TAccounts->get($data['id']);
            $ac = $this->TAccounts->patchEntity($ac, $data);
        } else {
            $ac = $this->TAccounts->newEntity($data);
        }
        $result = $this->TAccounts->save($ac);
        if ($ac->hasErrors()) {
            return [
                'result' => 'invalid',
                'data' => $ac->getErrors()
            ];
        }
        return [
            'result' => 'success',
            'data' =>  $result
        ];
    }
}
