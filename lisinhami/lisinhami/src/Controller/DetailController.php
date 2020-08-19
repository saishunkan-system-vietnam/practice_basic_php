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
         $TProduct = $this->{'Product'}->getProductBySlug($slug);
         
         if(empty($TProduct)){
             return $this->redirect(['Controller'=>'page','action' => 'home']);
         }else{
             $TImage = $this->{'Image'}->getImgByPrd($TProduct->id);
             $data = $this->{'Product'}->getProductByCategory($TProduct->category_cd);
 
             if ($this->request->is('post')) {
                $session = $this->getRequest()->getSession();
                 $inputData = $this->request->getParsedBody();
                
                 if($session->check('cart.'.$TProduct->id)){
                    $item = $session->read('cart.'.$TProduct->id);

                    $item['amount'] =  $item['amount'] + $inputData['numberproduct'];
                 }else{
                    $item=[
                        'id'        =>  $TProduct->id,
                        'name'      =>  $TProduct->name,
                        'price'     =>  $TProduct->price-$TProduct->discount,
                        'amount'    =>  $inputData['numberproduct']
                    ];
                 }
                   
                 $session->write('cart.'.$TProduct->id, $item);

                 $this->redirect(URL_CHITIET_SANPHAM.$slug);
             }
             
             $this->set('product', $TProduct);
             $this->set('image', $TImage);
             $this->set('data', $data);
         }
     }
}

?>