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
                $statusCd = 99;
                $title = 'Danh sách toàn bộ đơn hàng';
                break;
            case null:
                $statusCd = 99;
                $title = 'Danh sách toàn bộ đơn hàng';
                break;
            case 'cho-xac-nhan':
                $statusCd = 1;
                $title = 'Danh sách đơn hàng chờ xác nhận';
                break;
            case 'xac-nhan':
                $statusCd = 2;
                $title = 'Danh sách đơn hàng đã xác nhận và đang chờ xuất hàng';
                break;
            case 'xuat-hang':
                $statusCd = 3;
                $title = 'Danh sách đơn hàng đã xuất hàng chờ vận chuyển';
                break;
            case 'van-chuyen':
                $statusCd = 4;
                $title = 'Danh sách đơn hàng đang vận chuyển';
                break;
            case 'giao-hang':
                $statusCd = 5;
                $title = 'Danh sách đơn hàng đang giao hàng';
                break;
            case 'hoan-thanh':
                $statusCd = 6;
                $title = 'Danh sách đơn hàng đã nhận hàng - hoàn thành đơn hàng';
                break;
            case 'da-huy':
                $statusCd = 0;
                $title = 'Danh sách đơn hàng đã hủy';
                break;
            default:
                $statusCd = -1;
        }

        if ($statusCd == -1) {
            $this->redirect(URL_DONHANG);
        }

        $key = $this->request->getQuery('key');
        $odr_flg = $this->request->getQuery('odr_flg');
        if (empty($odr_flg)) {
            $odr_flg = 1;
        }

        $tableOrd = $this->{'Order'}->getAllOrder($key, $odr_flg, $statusCd);
        $this->set('tableOrd', $this->paginate($tableOrd, ['limit' => LIMIT_PAGINATE]));
        $this->set('title', $title);
        $this->set('status', $statusCd);
    }

    public function processOdr($id = null, $status_ctn = '1', $uid = null, $odr_flg = null)
    {
        if ($this->request->is('post')) {
            $status = (int)$status_ctn;

            if ($status != '0' && $status != '6') {
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

            if ($status == '6' && ($odr_flg == '1' || $odr_flg == '2')) {
                $this->sendEmail($uid, $result['data']);
            }

            $this->redirect($this->referer());
        }
    }

    public function sendEmail($user_email = null, $info = null)
    {
        $this->loadComponent('Common');
        $this->loadComponent('User');

        $resultCheck = $this->{'User'}->ExistUser($user_email);

        if (isset($resultCheck)) {
            $this->Flash->error("Tài khoản user đã tồn tại. Không thể gửi email");
        } else {
            $uid = $user_email;
            $password = substr(str_shuffle("mncv!$^&bzxafsdg@h12345ujkio~lpqwer#tyui67890"), 0, 8);
            $data = [
                "uid" => $uid,
                "pass" => $password,
                "full_name" => $info->reciever,
                "phone" => $info->phone,
                "address1" => $info->address,
                "gender" => 1,
            ];
            $result_regist = $this->{'User'}->regisUser($data);

            if ($result_regist['result'] == "error") {
                $this->Flash->error("Lỗi. Đăng ký tài khoản không thành công. Không thể gửi email!");
            } else {
                $content = " Xin chào " . $user_email . ",<br><br>
        Chúng tôi mà Lisinhami.com!<br>
        Bạn đã đặt hàng thành công trên website Lisinhami.com. Chúng tôi đã tạo tài khoản đăng nhập cho bạn với:<br>  
        Tên đăng nhập: " . $user_email . "<br>  
        Mật Khẩu: " . $password . "<br>
        Xin vui lòng đăng nhập vào website để xem thông tin chi tiết đơn hàng.<br>
        Cảm ơn bạn đã tin tưởng và đặt hàng tại Lisinhami.com!<br><br> 
        Thank you,<br>
        [Lisinhami.com] ";

                $result_email = $this->Common->sendEmail($user_email, $content);

                if ($result_email == "success") {
                    $this->Flash->success("Đã gửi mail thành công. Vui lòng check mail để xem thông tin chi tiết.");
                } else {
                    $data = array("uid" => $user_email, "del_flg" => 1);
                    $this->{'User'}->save($data);
                    $this->Flash->error("Lỗi. Gửi mail không thành công!");
                }
            }
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
