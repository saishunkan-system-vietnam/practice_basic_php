<?php
  declare(strict_types=1);

namespace App\Controller\Component;

use App\Controller\Component\CommonComponent;

class ProductComponent extends CommonComponent
{
    public function initialize(array $config): void
    {
        $this->loadModel(['TProduct']);
    }

    public function getAllProduct($key, $category_cd)
    {
        if($key){
            $query = $this->TProduct->find()
            -> where(['And'=>['del_flg' => 0, 'category_cd' => $category_cd,
                     ['Or'=>[
                                'name like'=>'%'.$key.'%',
                                'made_in like'=>'%'.$key.'%',
                                'info_gen like'=>'%'.$key.'%'
                            ]]
                     ]])
            ->order(['id DESC']);
        }
        else
        {
            $query = $this->TProduct->find()
            -> where(['TProduct.del_flg' => 0, 'category_cd' => $category_cd])
            ->order(['TProduct.id DESC']);
        }
       
        // return $query->all()->toArray();
        return $query;
    }

    public function getProductById($id)
    {
        $data = $this->TProduct
                ->find()
                ->where([
                    'TProduct.id' =>  $id
                ])
                ->first();

        return $data ? $data->toArray() : [];
    }
    
    public function checkSlug($id, $slug)
    {
        $checkSlug = $this->TProduct
                ->find()
                ->where([
                    'TProduct.slug' => $slug
                    ,'TProduct.id !=' => $id
                ])
                ->first();
        return $checkSlug ? $checkSlug->toArray() : [];
    }

    public function save($data): array
    {
        if (!empty($data['id'])) {
            $prd = $this->TProduct->get($data['id']);
            $prd = $this->TProduct->patchEntity($prd, $data);
        } else {
            $prd = $this->TProduct->newEntity($data);
        }
        $result = $this->TProduct->save($prd);
        if ($prd->hasErrors()) {
            return [
                'result' => 'invalid',
                'data' => $prd->getErrors()
            ];
        }
        return [
            'result' => 'success',
            'data' =>  $result
        ];
    }

    // Get danh sách theo danh mục sản phẩm
    public function getProductByCategory($category_cd)
    {
        if ($category_cd) {
            $query = $this->TProduct->find()
                ->select(['TProduct.name', 'TProduct.price', 'TProduct.discount', 'TProduct.slug', 't_image.img_url'])
                ->join([
                    'table' => 't_image',
                    "type" => "left",
                    "conditions" => ['TProduct.id = t_image.id_prd', 't_image.top_flg' => 1]
                ])
                ->where(['And' => ['TProduct.del_flg' => 0, 'TProduct.category_cd' => $category_cd]])
                ->order(['TProduct.price - TProduct.discount ASC', 'TProduct.price ASC', 'TProduct.create_datetime ASC'])
                ->limit(24);
        }

        return $query;
    }

    // Tìm kiếm sản phẩm
    public function searchAllProduct($key = null)
    {
        $query = $this->TProduct->find()
            ->select(['TProduct.name', 'TProduct.price', 'TProduct.discount', 'TProduct.slug', 't_image.img_url'])
            ->join([
                'table' => 't_image',
                "type" => "left",
                "conditions" => ['TProduct.id = t_image.id_prd', 't_image.top_flg' => 1]
            ])
            ->where(['And' => ['TProduct.del_flg' => 0, 'TProduct.category_cd' => 1, 'TProduct.name like' => (isset($key) ? '%' . $key . '%' : '%%')]])
            ->order(['TProduct.price - TProduct.discount ASC', 'TProduct.price ASC', 'TProduct.create_datetime ASC']);

        return $query;
    }

    // Get product theo slug
    public function getProductBySlug($slug)
    {
        $data = $this->TProduct
                ->find()
                ->where([
                    'TProduct.slug' =>  $slug
                ])
                ->first();

        return $data ;
    }
}