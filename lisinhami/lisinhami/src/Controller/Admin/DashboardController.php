<?php
    namespace App\Controller\Admin;

    use App\Controller\AppController;
    use Cake\Event\EventInterface;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Reference;
use Symfony\Component\Console\Input\Input;

class DashboardController extends AppController
    {
        public function beforeFilter(EventInterface $event)
        {
            $this->viewBuilder()->setLayout('main_admin');
        }

        public function top()
        {

        }

        public function viewPorduct()
        {
            $this->loadComponent('Product');

            $key = $this->request->getQuery('key');
            $TProduct = $this->{'Product'}->getAllProduct($key);
            $this->set('TProduct', $this->paginate($TProduct,['limit'=>5]));
            $this->set('title','Danh sách sản phẩm');
        }

        // Sản phẩm
        public function addPorduct(){
            $this->loadComponent('Product');

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
                $this->redirect(URL_SANPHAM);
                $this->Flash->success(__("Thêm sản phẩm thành công"));
               }
            } 
        }

        public function editPorduct($id = null)
        {
            $this->loadComponent('Product');

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
                  $this->redirect(URL_SANPHAM);
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
            $this->loadComponent('Product');

            if ($this->request->is('post')) {
                $data = ["id"=>$id,"del_flg"=>1];
                $result = $this->{'Product'}->save($data);

                if($result['result'] == "invalid"){
                    $this->Flash->error(__("Xóa sản phẩm thất bại"));
                }
                else
                {
                  $this->Flash->success(__("Xóa sản phẩm thành công"));
                }
                $this->redirect(URL_SANPHAM);
            }
        }

        // Image
        public function editImg($id_prd = null)
        {
            $this->loadComponent('Image');
            if ($this->request->is('post')) {
                $image = $this->request->getData('image_file');
                $name = $image->getClientFilename();
                $targetDir = WWW_ROOT.'img'.DS.$id_prd;
                if(!is_dir($targetDir))
                mkdir($targetDir,0775);
                $targetPath = $targetDir.DS.$name;
                if($name)
                $image->moveTo($targetPath);
                
                $data = ['img_url'=>$id_prd.'/'.$name, 'id_prd'=>$id_prd];
                $result = $this->{'Image'}->save($data);
                if($result['result'] == "invalid"){
                     foreach($result['data'] as $key => $item){
                         foreach($item as $err)
                         {
                             $this->Flash->error(__($key .": " .$err));
                         }
                     }
                }
            }

            // Sửa ở đây
            // $this->redirect();

            $lstImg = $this->{'Image'}->getImgByPrd($id_prd);

            if(empty($lstImg))
                $this->Flash->error('Sản phẩm không tồn tại');

            $this->set('lstImg',$lstImg);
            $this->set('title','Danh sách hình ảnh của sản phẩm');
        }
    }