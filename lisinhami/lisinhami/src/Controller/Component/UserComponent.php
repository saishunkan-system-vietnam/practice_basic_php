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
            ->select(['uid', 'pass', 'del_flg'])
            ->where(['And' => ['uid' => $email, 'pass' => $password]])
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
}
