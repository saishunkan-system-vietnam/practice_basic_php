<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\EventInterface;

class OrderController extends AppController
{
    public function beforeFilter(EventInterface $event)
    {
        $this->viewBuilder()->setLayout('main_admin');
        $this->loadComponent('Order');
    }

    public function viewOrder($status = null)
    {
        $title = "";
        switch ($status) {
            case 'toan-bo':
                $status_cd = 99;
                $title = 'Danh sách toàn bộ đơn hàng';
                break;
            case null:
                $status_cd = 99;
                $title = 'Danh sách toàn bộ đơn hàng';
                break;
            case 'cho-xac-nhan':
                $status_cd = 1;
                $title = 'Danh sách đơn hàng chờ xác nhận';
                break;
            case 'xac-nhan':
                $status_cd = 2;
                $title = 'Danh sách đơn hàng đã xác nhận và đang chờ xuất hàng';
                break;
            case 'xuat-hang':
                $status_cd = 3;
                $title = 'Danh sách đơn hàng đã xuất hàng chờ vận chuyển';
                break;
            case 'van-chuyen':
                $status_cd = 4;
                $title = 'Danh sách đơn hàng đang vận chuyển';
                break;
            case 'giao-hang':
                $status_cd = 5;
                $title = 'Danh sách đơn hàng đang giao hàng';
                break;
            case 'hoan-thanh':
                $status_cd = 6;
                $title = 'Danh sách đơn hàng đã nhận hàng - hoàn thành đơn hàng';
                break;
            case 'da-huy':
                $status_cd = 0;
                $title = 'Danh sách đơn hàng đã hủy';
                break;
            default:
                $status_cd = -1;
        }

        if ($status_cd == -1) {
            $this->redirect(URL_DONHANG);
        }

        $key = $this->request->getQuery('key');
        $TOrder = $this->{'Order'}->getAllOrder($key, $status_cd);
        $this->set('TOrder', $this->paginate($TOrder, ['limit' => LIMIT_PAGINATE]));
        $this->set('title', $title);
        $this->set('status', $status_cd);
    }

    public function processOdr($id = null, $status_ctn = '1')
    {
        if ($this->request->is('post')) {
            $status = (int)$status_ctn;

            if ($status != 0 && $status != 6) {
                $status++;
            }
            $data = ['id' => $id, 'status' => $status];
            $result = $this->{'Order'}->saveOdrHdr($data);

            if ($result['result'] == "invalid") {
                foreach ($result['data'] as $key => $item) {
                    foreach ($item as $err) {
                        $this->Flash->error(__("Thực hiện thất bại"));
                    }
                }
            } else {
                $this->Flash->success(__("Thực hiện thành công"));
            }

            $this->redirect($this->referer());
        }
    }

    public function viewContOrder($id = 0)
    {
        $dataOdrH = $this->{'Order'}->getOrderHdrById($id);
        $dataOdrD = $this->{'Order'}->getOrderDtlByIdOdrH($id);

        $this->set('dataOdrH', $dataOdrH[0]);
        $this->set('dataOdrD', $dataOdrD);
        $this->set('stt', 0);        
        $this->set('title', 'Chit tiết đơn hàng');
        $this->set('refererUrl', $this->referer());
    }
}
