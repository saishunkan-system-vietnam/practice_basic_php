<?php
    namespace App\Controller\Admin;

    use App\Controller\AppController;
    use Cake\Event\EventInterface;
use Symfony\Component\Console\Input\Input;

class DashboardController extends AppController
    {
        public function beforeFilter(EventInterface $event)
        {
            $this->viewBuilder()->setLayout('main_admin');
            $this->loadComponent('Product');
        }

        public function top()
        {

        }

        public function viewPorduct()
        {
            $key = $this->request->getQuery('key');
            $TProduct = $this->{'Product'}->getAllProduct($key);
            $this->set('TProduct', $this->paginate($TProduct,['limit'=>'5']));
            $this->set('title','Danh sách sản phẩm');
        }

        public function addPorduct(){
            if ($this->request->is('post')) {
                $inputData = $this->request->getParsedBody(); 

               $result = $this->{'Product'}->save($inputData);
               if($result['result'] == "invalid"){
                    foreach($result['data'] as $key => $item){
                        foreach($item as $err)
                        {
                            $this->Flash->error(__($key .": " .$err));
                        }
                    }
                    $this->set('data', $inputData);
               }
               else
               {
                 $this->redirect('admin/sanpham');
                 $this->Flash->success(__("Thêm sản phẩm thành công"));
               }
            } 
        }

        public function editPorduct($id = null)
        {
            if ($this->request->is('post')) {
                $inputData = $this->request->getParsedBody();
                $inputData += ["id"=>$id];

                $result = $this->{'Product'}->save($inputData);
                if($result['result'] == "invalid"){
                     foreach($result['data'] as $key => $item){
                         foreach($item as $err)
                         {
                             $this->Flash->error(__($key .": " .$err));
                         }
                     }
                     $this->set('data', $inputData);
                }
                else
                {
                  $this->redirect('/admin/sanpham');
                  $this->Flash->success(__("Sửa sản phẩm thành công"));
                }
            }
            else{
                $TProduct = $this->{'Product'}->getProductById($id);
                if(empty($TProduct)){
                    $this->Flash->error('Sản phẩm không tồn tại');
                }  
                $this->set('data', $TProduct);
            }
        }
        
        public function deletePorduct($id = null)
        {
            if ($this->request->is('post')) {
                $data = ["id"=>$id,"del_flg"=>1];
                $result = $this->{'Product'}->save($data);

                if($result['result'] == "invalid"){
                    $this->redirect('admin/sanpham');
                    $this->Flash->error(__("Xóa sản phẩm thất bại"));
                }
                else
                {
                    $this->redirect('admin/sanpham');
                  $this->Flash->success(__("Xóa sản phẩm thành công"));
                }
            }
        }
    }