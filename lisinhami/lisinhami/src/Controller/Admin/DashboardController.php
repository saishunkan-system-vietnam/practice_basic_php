<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\EventInterface;

class DashboardController extends AppController
{
    public function beforeFilter(EventInterface $event)
    {
        $this->viewBuilder()->setLayout('main_admin');
        $this->loadComponent('Common');
        $this->loadComponent('Dashboard');
    }

    public function top()
    {
        $dataOrder = $this->{'Dashboard'}->getOrder();
        $dataTotalAccount = $this->{'Dashboard'}->getTotalAccount();
        $dataTotalProduct = $this->{'Dashboard'}->getTotalProduct();
        $dataTotalPrice = $this->{'Dashboard'}->getTotalPrice();

        $this->set('dataOrder', $dataOrder);
        $this->set('dataTotalAccount', $dataTotalAccount);
        $this->set('dataTotalProduct', $dataTotalProduct);
        $this->set('dataTotalPrice', $dataTotalPrice);
        $this->set('title', 'Dashboard');
    }
}
