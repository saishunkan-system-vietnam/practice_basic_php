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

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Datasource\FactoryLocator;

class CommonComponent extends Component
{
    protected $controller;

    public function initialize(array $config): void
    {
        $this->controller = $this->getController();
    }

    public function loadModel($models): void
    {
        if (is_array($models)) {
            foreach ($models as $model) {
                $this->{$model} = FactoryLocator::get('Table')->get($model);
            }
        } else {
            $this->{$models} =  FactoryLocator::get('Table')->get($models);
        }
    }

}
