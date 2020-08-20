<?php
  declare(strict_types=1);

namespace App\Controller\Component;

use App\Controller\Component\CommonComponent;

class OrderComponent extends CommonComponent
{
    public function initialize(array $config): void
    {
        $this->loadModel(['TOrderHeader']);
        $this->loadModel(['TOrderDetail']);
    }

    public function getAllOrder($key,$status = null)
    {
        $query = $this->TOrderHeader->find()
        ->Select([
                'TOrderHeader.id',
                'TOrderHeader.id_user',
                'TOrderHeader.odr_date',
                'TOrderHeader.shipping_unit',
                'TOrderHeader.paymnt_method',
                'TOrderHeader.odr_flg',
                'status' => 'CASE WHEN TOrderHeader.status = 1 THEN "Đang chờ xác nhận"
                            WHEN TOrderHeader.status = 2 THEN "Đang chờ xuất hàng"
                            WHEN TOrderHeader.status = 3 THEN "Đang chờ vận chuyển"
                            WHEN TOrderHeader.status = 4 THEN "Đang vận chuyển"
                            WHEN TOrderHeader.status = 5 THEN "Đang giao hàng"
                            WHEN TOrderHeader.status = 6 THEN "Hoàn thành"
                            ELSE "Đã hủy"
                            END',
                'status_cd' => 'TOrderHeader.status' ,
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
        ->group([
                'TOrderHeader.id',
                'TOrderHeader.id_user',
                'TOrderHeader.odr_date',
                'TOrderHeader.shipping_unit',
                'TOrderHeader.paymnt_method',
                'TOrderHeader.status',
                'TOrderHeader.fee',
                'TOrderHeader.odr_flg'
        ])
        ->order(['TOrderHeader.create_datetime DESC']);
        return $query;
    }

    public function getOrderHdrById($id = 0)
    {
        $query = $this->TOrderHeader->find()
        ->Select([
                'TOrderHeader.id',
                'TOrderHeader.id_user',
                'TOrderHeader.odr_date',
                'TOrderHeader.odr_flg',
                'TOrderHeader.shipping_unit',
                'TOrderHeader.paymnt_method',
                'status' => 'CASE WHEN TOrderHeader.status = 1 THEN "Đang chờ xác nhận"
                            WHEN TOrderHeader.status = 2 THEN "Đang chờ xuất hàng"
                            WHEN TOrderHeader.status = 3 THEN "Đang chờ vận chuyển"
                            WHEN TOrderHeader.status = 4 THEN "Đang vận chuyển"
                            WHEN TOrderHeader.status = 5 THEN "Đang giao hàng"
                            WHEN TOrderHeader.status = 6 THEN "Hoàn thành"
                            ELSE "Đã hủy"
                            END',
                'status_cd'=> 'TOrderHeader.status',
                'TOrderHeader.fee',
                'paymnt' => '+ Sum(IFNULL(TOrderDetail.amount,0) * IFNULL(TOrderDetail.price,0)) 
                + Sum(IFNULL(TOrderDetail.amount,0) * IFNULL(TOrderDetail.price,0) * IFNULL(TOrderDetail.tax,0) / 100)',
                'total_paymnt' => 'IFNULL(TOrderHeader.fee, 0)
                                    + Sum(IFNULL(TOrderDetail.amount,0) * IFNULL(TOrderDetail.price,0)) 
                                    + Sum(IFNULL(TOrderDetail.amount,0) * IFNULL(TOrderDetail.price,0) * IFNULL(TOrderDetail.tax,0) / 100)'
                ])
        ->join([
                'table' => 't_order_detail',
                'alias' => 'TOrderDetail',
                "type" => "left",
                "conditions" => ['TOrderHeader.id = TOrderDetail.id_odrh','TOrderDetail.del_flg'=>0]
                ])
        ->where([
                'TOrderHeader.id' => $id
                ])
        ->group([
                'TOrderHeader.id',
                'TOrderHeader.id_user',
                'TOrderHeader.odr_date',
                'TOrderHeader.shipping_unit',
                'TOrderHeader.paymnt_method',
                'TOrderHeader.status',
                'TOrderHeader.fee'
                ]);
        return $query ? $query->toArray() : [];
    }

    public function getOrderDtlByIdOdrH($idOdrH = 0)
    {
        $query = $this->TOrderDetail->find()
        ->Select([
                'name' => 'tableProduct.name',
                'TOrderDetail.amount',
                'TOrderDetail.price',
                'tax' => 'IFNULL(TOrderDetail.amount,0) * IFNULL(TOrderDetail.price,0) * IFNULL(TOrderDetail.tax,0) / 100',
                'paymnt'=>'(IFNULL(TOrderDetail.amount,0) * IFNULL(TOrderDetail.price,0)) + (IFNULL(TOrderDetail.amount,0) * IFNULL(TOrderDetail.price,0) * IFNULL(TOrderDetail.tax,0) / 100)'])
        ->join([
                'table' => 't_product',
                'alias' => 'tableProduct',
                "type" => "left",
                "conditions" => ['TOrderDetail.id_product = tableProduct.id']
                ])
        ->where([
                'TOrderDetail.id_odrh' => $idOdrH
                ]);
        return $query ? $query->toArray() : [];
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

    public function getAllOrderByID($uid)
    {
        $query = $this->TOrderHeader->find()
        ->Select(['TOrderHeader.id',
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
            "conditions" => ['TOrderHeader.id = TOrderDetail.id_odrh','TOrderDetail.del_flg'=> 0]
            ])
        ->where([
                'TOrderHeader.id_user' => $uid 
                ])
        ->group(['TOrderHeader.id',
        'TOrderHeader.odr_date',
        'TOrderHeader.shipping_unit',
        'TOrderHeader.paymnt_method',
        'TOrderHeader.status',
        'TOrderHeader.fee'
        ]);

        return $query;
    }
}