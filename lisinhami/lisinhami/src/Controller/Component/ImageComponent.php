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
                ]);

        return $data;
    }

    public function save($data): array
    {   
        $img = $this->TImage->newEntity($data);
        
        $result = $this->TImage->save($img);
        if ($img->hasErrors()) {
            return [
                'result' => 'invalid',
                'data' => $img->getErrors()
            ];
        }
        return [
            'result' => 'success',
            'data' =>  $result
        ];
    }
}