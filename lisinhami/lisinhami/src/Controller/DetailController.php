<?php
namespace App\Controller;

use Cake\Event\EventInterface;

class DetailController extends AppController
{
    public function beforeFilter(EventInterface $event)
    {
        $this->viewBuilder()->setLayout('main');
        $this->loadComponent('Product');
        $this->loadComponent('Image');

    }

     // chi tiết sản phẩm
     public function detailProduct($slug = '')
     {
         $tableProduct = $this->{'Product'}->getProductBySlug($slug);
         
         if(empty($tableProduct)){
             return $this->redirect(SITE_URL);
         }else{
             $tableImage = $this->{'Image'}->getImgByPrd($tableProduct->id);
             $img= null;
             foreach ($tableImage as $key => $item) {
                 if($item->top_flg == 1){
                    $img= $item->img_url;
                 }
             }
             $data = $this->{'Product'}->getProductByCategory($tableProduct->category_cd);
 
             if ($this->request->is('post')) {
                $session = $this->getRequest()->getSession();
                 $inputData = $this->request->getParsedBody();

                 if (!empty($session->read(SESSION_CART))) {
                    $item = $session->read(SESSION_CART);
                    $category= $item[array_key_first($item)]['category_cd'];
                    if($tableProduct->category_cd != 3)
                    {
                        if ($category != $tableProduct->category_cd) {
                            $this->Flash->error(__("Bạn không thể order sản phẩm khác loại"));
                            return $this->redirect($this->referer());
                        }
                    }
                 }
                
                 if($session->check(SESSION_CART_ID.$tableProduct->id)){
                    $item = $session->read(SESSION_CART_ID.$tableProduct->id);
                    $item['amount'] =  $item['amount'] + $inputData['numberproduct'];
                 }else{
                    $item=[
                        'id'                =>  $tableProduct->id,
                        'name'              =>  $tableProduct->name,
                        'price'             =>  $tableProduct->price-$tableProduct->discount,
                        'amount'            =>  $inputData['numberproduct'],
                        'category_cd'       =>  $tableProduct->category_cd,
                        'img'               =>  $img,
                        'earn_point'        =>  $tableProduct->category_cd == 1 ? $tableProduct->point : 0,
                    ];
                 }
                   
                 $this->Flash->success(__("Thêm vào giò hàng thành công"));
                 $session->write(SESSION_CART_ID.$tableProduct->id, $item);

                 $this->redirect($this->referer());
             }
             
             $this->set('product', $tableProduct);
             $this->set('image', $tableImage);
             $this->set('data', $data);
             $this->set('title', 'Chi tiết sản phẩm');
         }
     }
}

?>