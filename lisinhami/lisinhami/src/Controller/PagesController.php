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
}
