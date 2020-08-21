<?php
namespace App\Controller;

use Cake\Event\EventInterface;

class HomeController extends AppController
{
    public function beforeFilter(EventInterface $event)
    {
        $this->viewBuilder()->setLayout('main');
        $this->loadComponent('Product');

    }

     // Trang chủ
     public function home()
     {
         $category_cd = 1;
         $cosmetic = $this->{'Product'}->getProductByCategory($category_cd);
         
         $this->set('cosmetic', $cosmetic);
         $this->set('title', 'Trang chủ');
     }
}
