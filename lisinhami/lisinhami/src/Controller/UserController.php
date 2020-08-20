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
 * This controller will render views from templates/User/
 *
 * @link https://book.cakephp.org/4/en/controllers/user-controller.html
 */
class UserController extends AppController
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
        $this->loadComponent('User');
    }

    // Login + Register
    public function login()
    {
        $cookie_time = (3600 * 24 * 30); // 30 days

        if ($this->request->is('post')) {

            $inputData = $this->request->getParsedBody();

            $result = $this->{'User'}->getUser($inputData['email'], $inputData['pass']);
            
            if(empty($result))
            {
                $this->request->getSession()->write('error', $inputData['email'] . ' không tồn tại');
                $this->redirect($this->referer());
            }
            else
            {
                if ($result->delflg == 1) {
                    $this->request->getSession()->write('error', $inputData['email'] . ' đã bị vô hiệu hóa');
                    $this->redirect($this->referer());
                } else {
                    $this->request->getSession()->write('success', 'tài khoản ' . $inputData['email'] . ' đã đăng nhập thành công');
                    $this->request->getSession()->write('email', $inputData['email']);

                    if (isset($inputData['remember'])) {
                        $dataCookie['email'] = $inputData['email'];
                        $dataCookie['pass'] = $inputData['pass'];
                        setcookie('COOKIE_LOGIN', json_encode($dataCookie), time() + $cookie_time);
                    } else {
                        setcookie('COOKIE_LOGIN', '', time() - $cookie_time);
                    }
                    $this->redirect($this->referer());
                }
            }
        }
    }

    public function logout()
    {
        $this->request->getSession()->delete('email');
        $this->redirect(SITE_URL);
    }

    public function register()
    {
        if ($this->request->is('post')) {

            $inputData = $this->request->getParsedBody();

            $result = $this->{'User'}->ExistUser($inputData['uid']);
            if (isset($result)) {
                $this->Flash->error(__("Email đã tồn tại. Vui lòng nhập email khác"));
                $this->redirect($this->referer());
            } else {
                $result_regis = $this->{'User'}->regisUser($inputData);

                if ($result_regis['result'] == "error") {
                    foreach ($result_regis['data'] as $key => $item) {
                        foreach ($item as $err) {
                            $this->Flash->error(__($key . ": " . $err));
                        }
                    }
                    $this->set('data', $inputData);
                } else {
                    $this->Flash->success(__("Đăng ký thành công"));
                    $this->redirect($this->referer());
                }
            }
        }
    }
}
