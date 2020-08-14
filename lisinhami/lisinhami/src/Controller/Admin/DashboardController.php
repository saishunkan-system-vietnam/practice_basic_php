<?php
    namespace App\Controller\Admin;

    use App\Controller\AppController;
    use Cake\Event\EventInterface;

    class DashboardController extends AppController
    {
        public function beforeFilter(EventInterface $event)
        {
            $this->viewBuilder()->setLayout('main_admin');
        }

        public function top()
        {

        }

        public function viewporduct()
        {
            $this->loadComponent('Product');
            $TProduct = $this->{'Product'}->getAllProduct();
            $this->set('TProduct',$TProduct);
        }
    }