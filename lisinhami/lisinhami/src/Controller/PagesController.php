<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\View\Exception\MissingTemplateException;

use Cake\Http\Cookie\Cookie;
use Cake\Http\Cookie\CookieCollection;

use Cake\Event\EventInterface;

/**
 * Static content controller
 *
 * This controller will render views from templates/Pages/
 *
 * @link https://book.cakephp.org/4/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{
    /**
     * Displays a view
     *
     * @param string ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\View\Exception\MissingTemplateException When the view file could not
     *   be found and in debug mode.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found and not in debug mode.
     * @throws \Cake\View\Exception\MissingTemplateException In debug mode.
     */

    public function beforeFilter(EventInterface $event)
    {
        $this->viewBuilder()->setLayout('main');
    }

    // Trang chủ
    public function home()
    {
        $this->loadComponent('Product');
        
        $category_cd = 1;
        $cosmetic = $this->{'Product'}->getProductByCategory($category_cd);

        $category_cd = 2;
        $sample = $this->{'Product'}->getProductByCategory($category_cd);

        $category_cd = 3;
        $point = $this->{'Product'}->getProductByCategory($category_cd);

        $this->set('cosmetic', $cosmetic);
        $this->set('sample', $sample);
        $this->set('point', $point);
    }

    // chi tiết sản phẩm
    public function detailProduct($slug = '')
    {
        $this->loadComponent('Product');
        $this->loadComponent('Image');
        $TProduct = $this->{'Product'}->getProductBySlug($slug);
        if(empty($TProduct)){
            return $this->redirect(['Controller'=>'page','action' => 'home']);
        }else{
            $TImage = $this->{'Image'}->getImgByPrd($TProduct->id);
            $data = $this->{'Product'}->getProductByCategory($TProduct->category_cd);
            $this->set('product', $TProduct);
            $this->set('image', $TImage);
            $this->set('data', $data);
        }  
    }

    // Danh sách sản phẩm
    public function viewList($category = null)
    {
        $this->loadComponent('Product');

        // if ($ctgry_cd == 1 || $ctgry_cd == 2 || $ctgry_cd == 3) {
        //     $ttl =  ($ctgry_cd == 1) ? 'Sản phẩm mỹ phẩm' : [($ctgry_cd == 2) ? 'Sản phẩm dùng thử' : 'Sản phẩm quà tặng'];
        //     $ctgry_url =  ($ctgry_cd == 1) ? 'san-pham-my-pham' : (($ctgry_cd == 2) ? 'san-pham-dung-thu' : 'san-pham-qua-tang');
        //     $this->set('title', $ttl);
        //     $this->set('ctgry_url', $ctgry_url);
        //     $TProduct = $this->{'Product'}->getProductByCategory($ctgry_cd);
        //     $this->set('TProduct', $TProduct);
        //     $this->set('TProduct', $this->paginate($TProduct, ['limit' => 4]));
        // } else {
        //     $this->redirect(SITE_URL);
        // }

        // $ctgry_cd = ($ctgry == 'san-pham-my-pham') ? 1 : (($ctgry == 'san-pham-dung-thu') ? 2 : (($ctgry == 'san-pham-qua-tang')) ? 3: (($ctgry == null) ? 1 : 99));

        $tag_sortby = $this->request->getQuery('sortby');
        $flg_sortby_asc= ($tag_sortby == "asc") ? 1 : 0;
        if ($tag_sortby) {
            $this->set('sortby', $tag_sortby);
        }

        $tag_price = $this->request->getQuery('p');
        // $filter_price = ($tag_price == 'duoi-1-trieu') ? 1000000 : (($tag_price == 'tu-1-2-trieu') ? 1000000 : g);

        switch ($tag_price) {
            case "duoi-1-trieu":
                $filter_price = array('less'=>'1000000');
                break;
            case "tu-1-2-trieu":
                $filter_price = array('from'=>1000000, 'to' => '2000000');
                break;
            case "tren-2-trieu":
                $filter_price = array('greater'=>'2000000');
                break;
            // case null:
            //     $filter_price = null;
            //     break;
            default:
                $filter_price = null;
        }

        switch ($category) {
            case "san-pham-my-pham":
                $category_cd = 1;
                break;
            case "san-pham-dung-thu":
                $category_cd = 2;
                break;
            case "san-pham-qua-tang":
                $category_cd = 3;
                break;
            case null:
                $category_cd = 1;
                break;
            default:
                $category_cd = 99;
        }

        // dd( $_SERVER['REQUEST_URI']);
        $this->set('current_url', ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[SERVER_NAME]"). $_SERVER['REQUEST_URI']);
        // dd(SITE_URL.$_SERVER['REQUEST_URI']);

        if ($category_cd == 99 && $tag_sortby != null) {
            $this->redirect(SITE_URL . 'danhmuc/san-pham-my-pham');
        } else {
            // if ($category_cd == 1 || $category_cd == 2 || $category_cd == 3) {
            $ttl =  ($category_cd == 1) ? 'Sản phẩm mỹ phẩm' : [($category_cd == 2) ? 'Sản phẩm dùng thử' : 'Sản phẩm quà tặng'];
            $this->set('title', $ttl);
            $this->set('ctgry_url', $category);

            $TProduct = $this->{'Product'}->getProductByCategory($category_cd);
      
           //$TProduct = $this->{'Product'}->getProductFilterPrice($category_cd, $filter_price, 1);
            $this->set('TProduct', $TProduct);
            $this->set('TProduct', $this->paginate($TProduct, ['limit' => 4]));
            // } else {
            //     $this->redirect(SITE_URL);
            // }
        }
    }

    // Login + Register
    public function login()
    {
        $this->loadComponent('Product');

        if ($this->request->is('post')) {
            $inputData = $this->request->getParsedBody();

            $result = $this->{'Product'}->getUser($inputData['email'], $inputData['pass']);

            if ($result->delflg == 1) {
                $this->request->getSession()->write('error', $inputData['email'] . ' không tồn tại');
                $this->redirect($this->referer());
            } else {
                $this->request->getSession()->write('success', 'tài khoản ' . $inputData['email'] . ' đã đăng nhập thành công');
                $this->request->getSession()->write('email', $inputData['email']);
                if ($inputData['remember'] == 'on') {
                    $rememberMe = $this->request->getCookie('remember', $inputData['email'],'/');

                    // $this->Cookie->write('remember', $inputData['email'], false);
                    
                     $cookie = new Cookie('remember', $inputData['email']);
                    //  $this->cookies = new CookieCollection([$cookie]);
                    //  $cookie_val = $this->cookies->get('remember');
                    // $this->set('cookie123', $cookie_val->getValue());
                    // var_dump($cookie_val->getValue());

                    // dd($cookie123);
                    // $isPresent = $this->cookies->has('remember');
                    // $this->set('isPresent', $isPresent);
                    // dd($cookie_val->getValue());
                }
                $this->redirect($this->referer());
            }
        }
    }

    function logout()
    {
        $this->Session->delete($this->_sessionUsername);
        $this->redirect(SITE_URL);
    }

    public function register()
    {
    }
}
