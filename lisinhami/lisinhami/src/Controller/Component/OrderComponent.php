<?php
  declare(strict_types=1);

namespace App\Controller\Component;

use App\Controller\Component\CommonComponent;

class OrderComponent extends CommonComponent
{
    public function initialize(array $config): void
    {
        $this->loadModel(['TOrderHeader']);
    }

    public function getAllOrder($key,$status = null)
    {
        $query = $this->TOrderHeader->find()
        ->Select(['TOrderHeader.id',
                'TOrderHeader.id_user',
                'TOrderHeader.odr_date',
                'TOrderHeader.shipping_unit',
                'TOrderHeader.paymnt_method',
                'TOrderHeader.status',
                'total_paymnt' => 'IFNULL(TOrderHeader.fee, 0)
                                    + Sum(IFNULL(TOrderDetail.amount,0) * IFNULL(TOrderDetail.price,0)) 
                                    + Sum(IFNULL(TOrderDetail.amount,0) * (IFNULL(TOrderDetail.price,0) * IFNULL(TOrderDetail.tax,0) / 100))'
                ])
        ->join([
            'table' => 't_order_detail',
            'alias' => 'TOrderDetail',
            "type" => "left",
            "conditions" => ['TOrderHeader.id = TOrderDetail.id_odrh','TOrderDetail.del_flg'=>0]
            ])
        ->where([
                'TOrderHeader.status = CASE WHEN '.$status.' = 99 THEN TOrderHeader.status ELSE '. $status.' END'
                ,'TOrderHeader.id_user like' => '%'.$key.'%' 
                ])
        ->group(['TOrderHeader.id',
        'TOrderHeader.id_user',
        'TOrderHeader.odr_date',
        'TOrderHeader.shipping_unit',
        'TOrderHeader.paymnt_method',
        'TOrderHeader.status',
        'TOrderHeader.fee'
        ]);
        // ->order();
        return $query;
    }

    public function saveOdrHdr($data): array
    {
        if (!empty($data['id'])) {
            $prd = $this->TOrderHeader->get($data['id']);
            $prd = $this->TOrderHeader->patchEntity($prd, $data);
        } else {
            $prd = $this->TOrderHeader->newEntity($data);
        }
        $result = $this->TOrderHeader->save($prd);
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