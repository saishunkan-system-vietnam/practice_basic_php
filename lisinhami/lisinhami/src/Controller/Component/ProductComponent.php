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

    // Get dánh sách theo danh mục sản phẩm
    public function getProductByCategory($category_cd)
    {
        if ($category_cd) {
            $query = $this->TProduct->find()
                ->select(['TProduct.name','TProduct.price','TProduct.discount','TProduct.slug', 't_image.img_url'])
                ->join([
                    'table' => 't_image',
                    "type" => "left",
                    "conditions" => ['TProduct.id = t_image.id_prd','t_image.top_flg'=>1]
                    ])
                ->where(['And' => ['TProduct.del_flg' => 0, 'TProduct.category_cd' => $category_cd]])
                ->order(['TProduct.id DESC'])
                ->limit(12);
        }

        return $query;
    }

    // Get và lọc danh sách sản phẩm theo giá
    public function getProductFilterPrice($category_cd, $price, $flg_order_asc)
    {
        // if ($price) {
        //     $query = $this->TProduct->find()
        //         ->where(['And' => ['del_flg' => 0, 'category_cd' => $category_cd, 'price < 500'  => $price, 'category_cd' => $category_cd]])
        //         ->order(['id DESC']);
        // }

        // return $query;

        $orderby_price = ($flg_order_asc == 1) ? "TProduct.price ASC" : "TProduct.price ASC";

        if (count($price) == 2) {
            // $price_from = $price['from'];
            // $price_from = $price['to'];
            // $expression_price = 'TProduct.price BETWEEN ? and ?';
            $expression_price = 'TProduct.price BETWEEN '.$price['from'].' and '.$price['to'];
            
            $query = $this->TProduct->find()
            ->select(['TProduct.name', 'TProduct.price', 'TProduct.discount', 'TProduct.slug', 't_image.img_url'])
            ->join([
                'table' => 't_image',
                "type" => "left",
                "conditions" => ['TProduct.id = t_image.id_prd', 't_image.top_flg' => 1]
            ])
            ->where(['And' => ['TProduct.del_flg' => 0, 'TProduct.category_cd' => $category_cd, $expression_price]])
            ->order([$orderby_price])
            ->limit(12);
        // }

        return $query;

        } else if (count($price) == 1) {
            if (array_key_exists('less', $price)) {
                $expression_price = 'TProduct.price <';
                $price_val = $price['less'];
            } else {
                $expression_price = 'TProduct.price >';
                $price_val = $price['greater'];
            }
        }

        // if ($category_cd) {
        $query = $this->TProduct->find()
            ->select(['TProduct.name', 'TProduct.price', 'TProduct.discount', 'TProduct.slug', 't_image.img_url'])
            ->join([
                'table' => 't_image',
                "type" => "left",
                "conditions" => ['TProduct.id = t_image.id_prd', 't_image.top_flg' => 1]
            ])
            ->where(['And' => ['TProduct.del_flg' => 0, 'TProduct.category_cd' => $category_cd, $expression_price => $price_val]])
            ->order([$orderby_price])
            ->limit(12);
        // }

        return $query;
    }

    // Get product theo slug
    public function getProductBySlug($slug = null)
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