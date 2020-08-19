<?php
    namespace App\Controller\Admin;

    use App\Controller\AppController;
    use Cake\Event\EventInterface;

class ImageController extends AppController
{
    public function beforeFilter(EventInterface $event)
    {
        $this->viewBuilder()->setLayout('main_admin');
        $this->loadComponent('Image');
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