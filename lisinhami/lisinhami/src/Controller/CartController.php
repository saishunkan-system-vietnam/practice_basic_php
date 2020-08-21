<?php
namespace App\Controller;

use Cake\Event\EventInterface;

class CartController extends AppController
{
    public function beforeFilter(EventInterface $event)
    {
        $this->viewBuilder()->setLayout('main');
        $this->loadComponent('Product');
        $this->loadComponent('ShipUnit');
        $this->loadComponent('PaymentMethod');
        $this->loadComponent('User');

    }

     // Hiên thị trang đặt hàng
     public function view()
     {
        $session =$this->getRequest()->getSession();
        $data = $session->read(SESSION_CART);

        if($session->check(SESSION_EMAIL))
        {
            $uid = $session->read(SESSION_EMAIL);
        }
        else{
            $uid = "";
        }

        $category_cd = 3;
        $productPoint = $this->{'Product'}->getProductByCategory($category_cd);

        $shipUnit = $this->{'ShipUnit'}->getAllShipUnit();
        $paymentMethod = $this->{'PaymentMethod'}->getAllPaymentMethod();
        $infoUser = $this->{'User'}->getInfoUser($uid);

        $this->set('productPoint', $productPoint);
        $this->set('data',$data );
        $this->set('session',$session );
        $this->set('title', 'Giỏ hàng');
        $this->set('shipUnit', $shipUnit);
        $this->set('paymentMethod', $paymentMethod);
        $this->set('infoUser', $infoUser);
     }

     // Xóa sản phẩm trong giỏ hàng
     public function delete($id = null)
     {
        if ($this->request->is('post')) {
            $session =$this->getRequest()->getSession();
            $session->delete(SESSION_CART_ID.$id);
        }
        
        $this->redirect($this->referer());
     }

     // Update số lượng giỏ hàng
     public function update($id = null)
     {
        if ($this->request->is('post')) {
            $inputData = $this->request->getParsedBody();
            $session =$this->getRequest()->getSession();
            $item = $session->read(SESSION_CART_ID.$id);
            $item['amount'] =$inputData['amount'];

            $session->write(SESSION_CART_ID.$id, $item);
            
        }
        
        $this->redirect($this->referer());
     }

     // Xoa toàn bộ giỏ hàng
     public function clear()
     {
        if ($this->request->is('post')) {
            $session =$this->getRequest()->getSession();
            $session->delete(SESSION_CART);
        }
        
        $this->redirect($this->referer());
     }
    
      // Get số lượng sản phẩm
      public function getCoount()
      {
        $count =0;
        $session =$this->getRequest()->getSession();
        $data = $session->read(SESSION_CART);

        if (!empty($data)) {
            foreach ($data as $key => $item) {
                $count = $count + $item['amount'];
            }
        }
        dd($count);
        $this->set('count',$count );       
      }
}
