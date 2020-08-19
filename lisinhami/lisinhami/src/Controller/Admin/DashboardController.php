<?php
    namespace App\Controller\Admin;

    use App\Controller\AppController;
    use Cake\Event\EventInterface;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Reference;
use Reflector;
use Symfony\Component\Console\Input\Input;

class DashboardController extends AppController
    {
        public function beforeFilter(EventInterface $event)
        {
            $this->viewBuilder()->setLayout('main_admin');
            $this->loadComponent('Common');
        }

        public function top()
        {

        }
    }