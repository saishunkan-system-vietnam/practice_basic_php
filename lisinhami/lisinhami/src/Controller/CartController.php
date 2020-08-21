<?php
namespace App\Controller;

use Cake\Event\EventInterface;

class CartController extends AppController
{
    public function beforeFilter(EventInterface $event)
    {
        $this->viewBuilder()->setLayout('main');
        $this->loadComponent('Product');

    }

     // Hiên thị trang đặt hàng
     public function view()
     {
        $session =$this->getRequest()->getSession();
        $data = $session->read('cart');

        $this->set('data',$data );
        $this->set('session',$session );
        $this->set('title', 'Giỏ hàng');
     }
}
