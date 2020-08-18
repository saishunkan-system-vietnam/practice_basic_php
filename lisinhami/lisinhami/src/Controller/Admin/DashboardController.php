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

        public function viewPorduct($category = null)
        {    
            switch($category){
                case "my-pham":
                    $category_cd = 1; 
                break;
                case "dung-thu":
                    $category_cd = 2; 
                break;
                case "qua-tang":
                    $category_cd = 3; 
                break;
                case null:
                    $category_cd = 1; 
                break;
                default: 
                $category_cd = 99; 
            }

            if($category_cd == 99 )
            {
                $this->redirect(URL_SANPHAM);
            }
            $this->loadComponent('Product');

            $key = $this->request->getQuery('key');
            $TProduct = $this->{'Product'}->getAllProduct($key, $category_cd);
            $this->set('TProduct', $this->paginate($TProduct,['limit'=>5]));
            $this->set('title','Danh sách sản phẩm');
            $this->set('category_cd',$category_cd);
        }

        // Sản phẩm
        public function addPorduct(){
            $this->loadComponent('Product');
            if ($this->request->is('post')) 
            {
                $inputData = $this->request->getParsedBody();

                if(empty($inputData['slug']))
                {
                    $inputData['slug'] = $inputData['name']; 
                }

                $inputData['slug'] = $this->{'Common'}->crtSlug($inputData['slug']);
                
                $checkSlug = $this->{'Product'}->checkSlug(0,  $inputData['slug']);

                if(!empty($checkSlug))
                {
                    $this->Flash->error("Giá trị Slug: bị trùng dữ liệu");
                    $this->set('data', $inputData);
                }
                else
                {
                    $result = $this->{'Product'}->save($inputData);
                    if($result['result'] == "invalid")
                    {
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
            else
            {
                $data = ['refererUrl'=>$this->referer()];
                $this->set('data', $data);
            }
        }

        public function editPorduct($id = null)
        {
            $this->loadComponent('Product');
            if ($this->request->is('post')) {
                $inputData = $this->request->getParsedBody();
                if(empty($inputData['slug']))
                {
                    $inputData['slug'] = $inputData['name']; 
                }

                $inputData['slug'] = $this->{'Common'}->crtSlug($inputData['slug']);
                
                $checkSlug = $this->{'Product'}->checkSlug( $id,  $inputData['slug']);

                if(!empty($checkSlug))
                {
                    $this->Flash->error("Giá trị Slug: bị trùng dữ liệu");
                    $this->set('data', $inputData);
                }
                else
                {
                    $refererUrl = $inputData['refererUrl'];

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
                    $this->redirect($refererUrl);
                    $this->Flash->success(__("Sửa sản phẩm thành công"));
                    }
                }
            }
            else{
                $TProduct = $this->{'Product'}->getProductById($id);
                if(empty($TProduct)){
                    $this->Flash->error('Sản phẩm không tồn tại');
                }
                $TProduct += ['refererUrl'=>$this->referer()];
                $this->set('data', $TProduct);
            }
        }
        
        public function deletePorduct($id = null)
        {
            $this->loadComponent('Product');
            $this->loadComponent('Image');

            if ($this->request->is('post')) {
                $data = ["id"=>$id,"del_flg"=>1];
                $result = $this->{'Product'}->save($data);

                if($result['result'] == "invalid"){
                    $this->Flash->error(__("Xóa sản phẩm thất bại"));
                }
                else
                {
                    $this->{'Image'}->delAllImg($id);
                    $this->Flash->success(__("Xóa sản phẩm thành công"));
                }
                $this->redirect($this->referer());
            }
        }

        // Image
        public function editImg($id_prd = null)
        {

            $this->loadComponent('Product');
            $TProduct = $this->{'Product'}->getProductById($id_prd);

            if(empty($TProduct)){
                $this->Flash->error('Sản phẩm không tồn tại');
                $this->redirect(URL_SANPHAM);
            }

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
                else
                {
                    $this->Flash->success(__("Thêm hình ảnh thành công"));
                    $this->redirect($this->referer());
                }
            }           
            $lstImg = $this->{'Image'}->getImgByPrd($id_prd);
            $this->set('lstImg',$lstImg);
            $this->set('id_prd',$id_prd);
            $this->set('title','Danh sách hình ảnh của sản phẩm');
        }

        public function deleteImg($id = null)
        {
            $this->loadComponent('Image');

            if ($this->request->is('post')) {
                $data = ["id"=>$id,"del_flg"=>1];
                $result = $this->{'Image'}->save($data);

                if($result['result'] == "invalid"){
                    $this->Flash->error(__("Xóa hình ảnh thất bại"));
                }
                else
                {
                    $this->Flash->success(__("Xóa hình ảnh thành công"));
                }
                $this->redirect($this->referer());
            }
        }

        public function setTopImg($id = null, $id_prd = null)
        {
            $this->loadComponent('Image');

            if ($this->request->is('post')) {

                $result = $this->{'Image'}->setTop($id, $id_prd);

                $this->Flash->success(__("Set hình ảnh thành công"));
                $this->redirect($this->referer());
            }
        }
    }