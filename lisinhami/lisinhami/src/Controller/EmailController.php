<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;

/**
 * Email Controller
 *
 * @method \App\Model\Entity\Email[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmailController extends AppController
{
    public function beforeFilter(EventInterface $event)
    {
        $this->viewBuilder()->setLayout('main');
    }

    public function sendEmail($user_email = null)
    {
        $this->loadComponent('Common');
        $this->loadComponent('User');

        $user_email = "nguyenminh15cdt1@gmail.com";
        $result_check = $this->{'User'}->ExistUser($user_email);

        if (isset($result_check)) {
            $this->Flash->error("Tài khoản user đã tồn tại. Không thể gửi email");
            return $this->redirect(SITE_URL);
        }

        $uid = $user_email;
        $password = substr(str_shuffle("mncv!$^&bzxafsdg@h12345ujkio~lpqwer#tyui67890"), 0, 8);
        $inputData = array("uid" => $uid, "pass" => $password);
        $result_regist = $this->{'User'}->regisUser($inputData);

        if ($result_regist['result'] == "error") {
            $this->redirect($this->referer());
            return $this->Flash->error("Lỗi. Đăng ký tài khoản không thành công. Không thể gửi email!");
        }

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
            $this->redirect($this->referer());
        } else {
            $data = array("uid" => $user_email, "del_flg" => 1);
            $this->{'User'}->save($data);
            $this->Flash->error("Lỗi. Gửi mail không thành công!");
        }
    }
}
