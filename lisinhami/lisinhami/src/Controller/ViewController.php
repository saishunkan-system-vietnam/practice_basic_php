<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;

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

    // Tìm kiếm sản phẩm
    public function searchProduct()
    {
        $this->loadComponent('Product');
        $key = $this->request->getQuery('key');

        $title = isset($key) ? 'Kết quả tìm kiếm ' . $key : 'Kết quả tìm kiếm';
        $this->set('title', $title);

        $tableProduct = $this->{'Product'}->searchAllProduct($key);

        $this->set('tableProduct', $tableProduct);
        $this->set('tableProduct', $this->paginate($tableProduct, ['limit' => LIMIT_PAGINATE]));
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
                if($this->request->getsession()->check(SESSION_EMAIL)){
                    $this->redirect(SITE_URL);
                }
                $category_cd = 2;
                $title = 'Sản phẩm dùng thử';
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
            $tableProduct = $this->{'Product'}->getProductByCategory($category_cd);
            $this->set('tableProduct', $tableProduct);
            $this->set('tableProduct', $this->paginate($tableProduct, ['limit' => LIMIT_PAGINATE]));
        }
    }

    public function getOrderHistory($uid = null)
    {
        $this->set('title', 'Lịch sử mua hàng');
        $this->loadComponent('Order');
        $tableOrder = $this->{'Order'}->getAllOrderByUid($uid);
        $this->set('tableOrder', $tableOrder);
        $this->set('tableOrder', $this->paginate($tableOrder, ['limit' => LIMIT_PAGINATE]));
    }

    public function viewContOrder($id = 0)
    {
        $this->loadComponent('Order');
        $dataOdrH = $this->{'Order'}->getOrderHdrById($id);
        $dataOdrD = $this->{'Order'}->getOrderDtlByIdOdrH($id);

        $this->set('dataOdrH', $dataOdrH[0]);
        $this->set('dataOdrD', $dataOdrD);
        $this->set('stt', 0);
        $this->set('title', 'Chi tiết đơn hàng');
        $this->set('refererUrl', $this->referer());
    }
}
