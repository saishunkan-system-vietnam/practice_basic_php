<?php

declare(strict_types=1);

namespace App\Controller\Component;

use App\Controller\Component\CommonComponent;

class UserComponent extends CommonComponent
{
    public function initialize(array $config): void
    {
        $this->loadModel(['TUser']);
    }

    public function getUser($email, $password)
    {
        $query = $this->TUser->find()
            ->select(['uid', 'pass', 'del_flg', 'admin_flg'])
            ->where(['And' => ['uid' => $email, 'pass' => $password]])
            ->first();

        return $query;
    }

    public function getInfoUser($uid)
    {
        $query = $this->TUser->find()
            ->select(['address1', 'address2', 'uid', 'full_name', 'phone'])
            ->where(['uid' => $uid])
            ->first();

        return $query;
    }

    public function ExistUser($email)
    {
        $query = $this->TUser->find()
            ->where(['uid' => $email])
            ->first();

        return $query;
    }

    public function regisUser($data)
    {

        $user = $this->TUser->newEntity($data);
        $result = $this->TUser->save($user);
        if ($user->hasErrors()) {
            return [
                'result' => 'error',
                'data' => $user->getErrors()
            ];
        }
        return [
            'result' => 'success',
            'data' =>  $result
        ];

        return $result;
    }

    public function save($data): array
    {
        if (!empty($data['uid'])) {
            $tableUser = $this->TUser->get($data['uid']);
            $tableUser = $this->TUser->patchEntity($tableUser, $data);
        } else {
            $tableUser = $this->TUser->newEntity($data);
        }
        $result = $this->TUser->save($tableUser);
        if ($tableUser->hasErrors()) {
            return [
                'result' => 'invalid',
                'data' => $tableUser->getErrors()
            ];
        }
        return [
            'result' => 'success',
            'data' =>  $result
        ];
    }
}
