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
        $cosmetic = $this->{'Product'}->getProductByCatagory($category_cd);

        $category_cd = 2;
        $sample = $this->{'Product'}->getProductByCatagory($category_cd);

        $category_cd = 3;
        $point = $this->{'Product'}->getProductByCatagory($category_cd);

        $this->set('cosmetic', $cosmetic);
        $this->set('sample', $sample);
        $this->set('point', $point);
    }

    // chi tiết sản phẩm
    public function detailProduct()
    {
        
    }

    // Danh sách sản phẩm
    public function viewList($ctgry_cd = null)
    {
        $this->loadComponent('Product');

        if ($ctgry_cd == 1 || $ctgry_cd == 2 || $ctgry_cd == 3) {
            $ttl =  ($ctgry_cd == 1) ? 'Sản phẩm mỹ phẩm' : [($ctgry_cd == 2) ? 'Sản phẩm dùng thử' : 'Sản phẩm quà tặng'];
            $ctgry_url =  ($ctgry_cd == 1) ? 'san-pham-my-pham' : (($ctgry_cd == 2) ? 'san-pham-dung-thu' : 'san-pham-qua-tang');
            $this->set('title', $ttl);
            $this->set('ctgry_url', $ctgry_url);
            $TProduct = $this->{'Product'}->getAllProductByCategory($ctgry_cd);
            $this->set('TProduct', $TProduct);
            $this->set('TProduct', $this->paginate($TProduct, ['limit' => 4]));
        } else {
            $this->redirect(SITE_URL);
        }
    }

    // Login + Register
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect(['controller' =>'home']);
            } else {
                $this->Flash->error(__('Username or password is incorrect'));
            }
            $this->render(SITE_URL);
        }
    }

    public function register()
    {

    }
}
