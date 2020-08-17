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

    public function getAllProduct($key)
    {
        if($key){
            $query = $this->TProduct->find()
            -> where(['And'=>['del_flg' => 0,
                     ['Or'=>[
                                'name like'=>'%'.$key.'%',
                                'made_in like'=>'%'.$key.'%',
                                'info_gen like'=>'%'.$key.'%'
                            ]]
                     ]])
            ->order(['id DESC']);
        }
        else
        {
            $query = $this->TProduct->find()
            -> where(['TProduct.del_flg' => 0])
            ->order(['TProduct.id DESC']);
        }
       
        // return $query->all()->toArray();
        return $query;
    }

    public function getProductById($id)
    {
        $data = $this->TProduct
                ->find()
                ->where([
                    'TProduct.id' =>  $id
                ])
                ->first();

        return $data ? $data->toArray() : [];
    }

    public function save($data): array
    {
        if (!empty($data['id'])) {
            $prd = $this->TProduct->get($data['id']);
            $prd = $this->TProduct->patchEntity($prd, $data);
        } else {
            $prd = $this->TProduct->newEntity($data);
        }
        $result = $this->TProduct->save($prd);
        if ($prd->hasErrors()) {
            return [
                'result' => 'invalid',
                'data' => $prd->getErrors()
            ];
        }
        return [
            'result' => 'success',
            'data' =>  $result
        ];
    }
}