<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;
use Cake\Mailer\Mailer;
// use Cake\Mailer\Email;

/**
 * View Controller
 *
 * @method \App\Model\Entity\View[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ViewController extends AppController
{
    public function beforeFilter(EventInterface $event)
    {
        $this->viewBuilder()->setLayout('main');
    }

    // /**
    //  * Index method
    //  *
    //  * @return \Cake\Http\Response|null|void Renders view
    //  */
    // public function index()
    // {
    //     $view = $this->paginate($this->View);

    //     $this->set(compact('view'));
    // }

    // /**
    //  * View method
    //  *
    //  * @param string|null $id View id.
    //  * @return \Cake\Http\Response|null|void Renders view
    //  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    //  */
    // public function view($id = null)
    // {
    //     $view = $this->View->get($id, [
    //         'contain' => [],
    //     ]);

    //     $this->set(compact('view'));
    // }

    // /**
    //  * Add method
    //  *
    //  * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
    //  */
    // public function add()
    // {
    //     $view = $this->View->newEmptyEntity();
    //     if ($this->request->is('post')) {
    //         $view = $this->View->patchEntity($view, $this->request->getData());
    //         if ($this->View->save($view)) {
    //             $this->Flash->success(__('The view has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The view could not be saved. Please, try again.'));
    //     }
    //     $this->set(compact('view'));
    // }

    // /**
    //  * Edit method
    //  *
    //  * @param string|null $id View id.
    //  * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
    //  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    //  */
    // public function edit($id = null)
    // {
    //     $view = $this->View->get($id, [
    //         'contain' => [],
    //     ]);
    //     if ($this->request->is(['patch', 'post', 'put'])) {
    //         $view = $this->View->patchEntity($view, $this->request->getData());
    //         if ($this->View->save($view)) {
    //             $this->Flash->success(__('The view has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The view could not be saved. Please, try again.'));
    //     }
    //     $this->set(compact('view'));
    // }

    // /**
    //  * Delete method
    //  *
    //  * @param string|null $id View id.
    //  * @return \Cake\Http\Response|null|void Redirects to index.
    //  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    //  */
    // public function delete($id = null)
    // {
    //     $this->request->allowMethod(['post', 'delete']);
    //     $view = $this->View->get($id);
    //     if ($this->View->delete($view)) {
    //         $this->Flash->success(__('The view has been deleted.'));
    //     } else {
    //         $this->Flash->error(__('The view could not be deleted. Please, try again.'));
    //     }

    //     return $this->redirect(['action' => 'index']);
    // }

    // Tìm kiếm sản phẩm
    public function searchProduct()
    {
        $this->loadComponent('Product');
        $key = $this->request->getQuery('key');

        $title = isset($key) ? 'Kết quả tìm kiếm ' . $key : 'Kết quả tìm kiếm';
        $this->set('title', $title);

        $TProduct = $this->{'Product'}->searchAllProduct($key);

        $this->set('TProduct', $TProduct);
        $this->set('TProduct', $this->paginate($TProduct, ['limit' => LIMIT_PAGINATE]));
    }

    // Danh sách sản phẩm
    public function viewList($category = null)
    {
        $this->loadComponent('Product');

        switch ($category) {
            case "san-pham-my-pham":
                $category_cd = 1;
                $title = 'Sản phẩm mỹ phẩm';
                break;
            case "san-pham-dung-thu":
                $category_cd = 2;
                $title = 'Sản phẩm dùng thử';
                break;
            case "san-pham-qua-tang":
                $category_cd = 3;
                $title = 'Sản phẩm quà tặng';
                break;
            case null:
                $category_cd = 1;
                $title = 'Sản phẩm mỹ phẩm';
                break;
            default:
                $category_cd = 99;
                $title = 'Sản phẩm mỹ phẩm';
        }

        if ($category_cd == 99) {
            $this->redirect(SITE_URL . 'danhmuc/san-pham-my-pham');
        } else {
            $this->set('title', $title);
            $TProduct = $this->{'Product'}->getProductByCategory($category_cd);
            $this->set('TProduct', $TProduct);
            $this->set('TProduct', $this->paginate($TProduct, ['limit' => LIMIT_PAGINATE]));
        }
    }

    // Gửi email
    public function sendEmail()
    {

        // $mailer = new Mailer('default');
        // $mailer->setProfile('default');
        // // $email->to('nguyenminh15cdt1@gmail.com', 'Minh');
        // //$email->addTo('to2@example.com', 'To2 Example');
        // // The email's To recipients are: to@example.com and to2@example.com
        // //$email->to('test@example.com', 'ToTest Example');
        // // The email's To recipient is: test@example.com
        // $mailer->setSender('minhmailfortest@gmail.com', 'Admin');

        // $email = new Email();
        // $email->transport('default');
        // $email->from('minhmailfortest@gmail.com')
        //     //->attachments(TICKET_PDF . $file)
        //     ->to('nguyenminh15cdt1@gmail.com')
        //     ->emailFormat('html')
        //     ->subject("sfdsđsfds")
        //     ->viewVars(array('msg' => "dsfdsfdsf"))
        //     ->send("sdfsfdsfds");

        // $mailer = new Mailer('default');
        //$mailer->setProfile('default');
        // $mailer->setSender('minhmailfortest@gmail.com', 'AdminMinh');
        // $mailer->setTo('nguyenminh15cdt1@gmail.com', 'User');
        // $mailer->setFrom(['minhmailfortest@gmail.com' => 'My Site'])
        //     ->setTo('nguyenminh15cdt1@gmail.com')
        //     ->setSubject('About')
        //     ->deliver('My message');

        // $mailer = new Mailer('default');
        // $mailer
        //   //  ->setEmailFormat('html')
        //     ->setTo('nguyenminh15cdt1@gmail.com')
        //     ->setFrom('minhmailfortest@gmail.com')
        //    ->viewBuilder()
        //     // ->setTemplate('welcome')
        //     // ->setLayout('fancy');
        //     ;
        //    $mailer->deliver();

        // $email = new Email('default');
        // $email->from(['nguyenminh15cdt1@gmail.com' => 'Welcome To Trinity'])
        //     ->to('minhmailfortest@gmail.com')
        //     ->subject('My Subject')
        //     ->send('Heloo ..');

        $mailer = new Mailer('default');     
        $mailer->setSender('minhmailfortest@gmail.com', 'AdminMinh');
        $mailer->setTo('nguyenminh15cdt1@gmail.com', 'User');
        $mailer->setFrom(['minhmailfortest@gmail.com']);
        $mailer->delivery(' Your message');  
        // $mailer->
        //     ->to('nguyenminh15cdt1@gmail.com')
        //     ->subject('about email')
        //     ->delivery(' Your message');            
    }
}
