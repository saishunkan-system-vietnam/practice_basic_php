<?php
  declare(strict_types=1);

namespace App\Controller\Component;

use App\Controller\Component\CommonComponent;

class ImageComponent extends CommonComponent
{
    public function initialize(array $config): void
    {
        $this->loadModel(['TImage']);
    }

    public function getImgByPrd($id_prd)
    {
        $data = $this->TImage
                ->find()
                ->where([
                    'TImage.id_prd' =>  $id_prd
                    ,'TImage.del_flg' =>  0
                ]);

        return $data;
    }

    public function save($data): array
    {
        if (!empty($data['id'])) {
            $prd = $this->TImage->get($data['id']);
            $prd = $this->TImage->patchEntity($prd, $data);
        } else {
            $prd = $this->TImage->newEntity($data);
        }
        $result = $this->TImage->save($prd);
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

    public function setTop($id, $id_prd)
    {
        $data = $this->TImage
                ->find()
                ->select([
                    'id',
                    'top_flg'=>'CASE WHEN id ='.$id.' THEN 1 ELSE 0 END'
                ])
                ->where([
                    'TImage.id_prd' =>  $id_prd
                    ,'TImage.del_flg' =>  0
                ]);
                
        foreach($data as $item)
        {
            $prd = $this->TImage->get($item['id']);
            $prd = $this->TImage->patchEntity($prd, $item->toArray());
            $this->TImage->save($prd);            
        }
    }

    public function delAllImg($id_prd)
    {
        $data = $this->TImage
                ->find()
                ->select([
                    'id',
                    'del_flg'=>'1'
                ])
                ->where([
                    'TImage.id_prd' =>  $id_prd
                    ,'TImage.del_flg' =>  0
                ]);
                
        foreach($data as $item)
        {
            $prd = $this->TImage->get($item['id']);
            $prd = $this->TImage->patchEntity($prd, $item->toArray());
            $this->TImage->save($prd);            
        }
    }
}