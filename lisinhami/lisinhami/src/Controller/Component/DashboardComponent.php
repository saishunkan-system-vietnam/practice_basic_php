<?php

declare(strict_types=1);

namespace App\Controller\Component;

use App\Controller\Component\CommonComponent;

class DashboardComponent extends CommonComponent
{
    public function initialize(array $config): void
    {
        $this->loadModel(['TProduct']);
        $this->loadModel(['TUser']);
        $this->loadModel(['TOrderHeader']);
        $this->loadModel(['TOrderDetail']);
    }

    public function getOrder()
    {
        $query = $this->TOrderHeader->find()
            ->Select([
                'prdWaiting' => 'sum(case when status = 1 && odr_flg = 1 || odr_flg = 0 then 1 else 0 end)',
                'prdProcessing' => 'sum(case when (status > 1 && status < 6 &&(  odr_flg = 1 || odr_flg = 0)) then 1 else 0 end)',
                'prdComplete' => 'sum(case when status = 6 && odr_flg = 1 || odr_flg = 0 then 1 else 0 end)',
                'prdCancel' => 'sum(case when status = 0 && odr_flg = 1 || odr_flg = 0 then 1 else 0 end)',

                'sampleWaiting' => 'sum(case when status = 1 && odr_flg = 2 then 1 else 0 end)',
                'sampleProcessing' => 'sum(case when (status > 1 && status < 6 && odr_flg = 2) then 1 else 0 end)',
                'sampleComplete' => 'sum(case when status = 6 && odr_flg = 2 then 1 else 0 end)',
                'sampleCancel' => 'sum(case when status = 0 && odr_flg = 2 then 1 else 0 end)',
            ])->first();

        return $query;
    }

    public function getTotalAccount()
    {
        $this->loadModel(['TUser']);
        $query = $this->TUser->find()
            ->select(['count' => 'count(*)'])
            ->where(['And' => ['admin_flg' => 0, 'del_flg ' => 0]])
            ->first();

        return $query;
    }

    public function getTotalProduct()
    {
        $this->loadModel(['TProduct']);
        $query = $this->TProduct->find()
            ->select(['count' => 'count(*)'])
            ->where([['del_flg ' => 0]])
            ->first();

        return $query;
    }

    public function getTotalPrice()
    {
        $query = $this->TOrderHeader->find()
            ->select(['totalPrice' => 'IFNULL(TOrderHeader.fee, 0)
        + Sum(IFNULL(TOrderDetail.amount,0) * IFNULL(TOrderDetail.price,0)) 
        + Sum(IFNULL(TOrderDetail.amount,0) * IFNULL(TOrderDetail.price,0) * IFNULL(TOrderDetail.tax,0) / 100)'])
            ->join([
                'table' => 't_order_detail',
                'alias' => 'TOrderDetail',
                "type" => "left",
                "conditions" => ['TOrderHeader.id = TOrderDetail.id_odrh', 'TOrderDetail.del_flg' => 0]
            ])
            ->where(['TOrderHeader.status' => 6])
            ->first();

        return $query;
    }
}
