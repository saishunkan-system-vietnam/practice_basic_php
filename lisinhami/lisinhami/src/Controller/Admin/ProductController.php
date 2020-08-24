<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\EventInterface;

class ProductController extends AppController
{
    public function beforeFilter(EventInterface $event)
    {
        $this->viewBuilder()->setLayout('main_admin');
        $this->loadComponent('Product');
    }

    // Danh sách sản phẩm
    public function viewPorduct($category = null)
    {
        switch ($category) {
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

        if ($category_cd == 99) {
            $this->redirect(URL_SANPHAM);
        }

        $key = $this->request->getQuery('key');
        $tableProduct = $this->{'Product'}->getAllProduct($key, $category_cd);
        $this->set('tableProduct', $this->paginate($tableProduct, ['limit' => LIMIT_PAGINATE]));
        $this->set('title', 'Danh sách sản phẩm');
        $this->set('category_cd', $category_cd);
    }

    // Add sản phẩm
    public function addPorduct()
    {
        $this->loadComponent('Common');

        if ($this->request->is('post')) {
            $inputData = $this->request->getParsedBody();

            if (empty($inputData['slug'])) {
                $inputData['slug'] = $inputData['name'];
            }

            $inputData['slug'] = $this->{'Common'}->crtSlug($inputData['slug']);

            $checkSlug = $this->{'Product'}->checkSlug(0,  $inputData['slug']);

            if (!empty($checkSlug)) {
                $this->Flash->error("Giá trị Slug: bị trùng dữ liệu");
                $this->set('data', $inputData);
            } else {
                $result = $this->{'Product'}->save($inputData);
                if ($result['result'] == "invalid") {
                    foreach ($result['data'] as $key => $item) {
                        foreach ($item as $err) {
                            $this->Flash->error(__($key . ": " . $err));
                        }
                    }
                    $this->set('data', $inputData);
                } else {
                    $this->redirect(URL_SANPHAM);
                    $this->Flash->success(__("Thêm sản phẩm thành công"));
                }
            }
        } else {
            $data = ['refererUrl' => $this->referer()];
            $this->set('data', $data);
        }

        $this->set('title', 'Thêm sản phẩm');
    }

    // Edit sản phẩm
    public function editPorduct($id = null)
    {
        $this->loadComponent('Common');

        if ($this->request->is('post')) {
            $inputData = $this->request->getParsedBody();
            if (empty($inputData['slug'])) {
                $inputData['slug'] = $inputData['name'];
            }

            $inputData['slug'] = $this->{'Common'}->crtSlug($inputData['slug']);
            $checkSlug = $this->{'Product'}->checkSlug($id,  $inputData['slug']);

            if (!empty($checkSlug)) {
                $this->Flash->error("Giá trị Slug: bị trùng dữ liệu");
                $this->set('data', $inputData);
            } else {
                $refererUrl = $inputData['refererUrl'];

                $inputData += ["id" => $id];

                $result = $this->{'Product'}->save($inputData);
                if ($result['result'] == "invalid") {
                    foreach ($result['data'] as $key => $item) {
                        foreach ($item as $err) {
                            $this->Flash->error(__($key . ": " . $err));
                        }
                    }
                    $this->set('data', $inputData);
                } else {
                    $this->redirect($refererUrl);
                    $this->Flash->success(__("Sửa sản phẩm thành công"));
                }
            }
        } else {
            $tableProduct = $this->{'Product'}->getProductById($id);
            if (empty($tableProduct)) {
                $this->Flash->error('Sản phẩm không tồn tại');
                $this->redirect(URL_SANPHAM);
            }
            $tableProduct += ['refererUrl' => $this->referer()];
            $this->set('data', $tableProduct);
        }

        $this->set('title', 'Sửa sản phẩm');
    }

    // 
    public function deletePorduct($id = null)
    {
        $this->loadComponent('Image');

        if ($this->request->is('post')) {
            $data = ["id" => $id, "del_flg" => 1];
            $result = $this->{'Product'}->save($data);

            if ($result['result'] == "invalid") {
                $this->Flash->error(__("Xóa sản phẩm thất bại"));
            } else {
                $this->{'Image'}->delAllImg($id);
                $this->Flash->success(__("Xóa sản phẩm thành công"));
            }
            $this->redirect($this->referer());
        }
    }
}
