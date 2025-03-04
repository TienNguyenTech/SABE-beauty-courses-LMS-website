<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     3.0.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\View;

use Cake\View\View;

/**
 * Application View
 *
 * Your application's default view class
 *
 * @link https://book.cakephp.org/5/en/views.html#the-app-view
 */
class AppView extends View
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like adding helpers.
     *
     * e.g. `$this->addHelper('Html');`
     *
     * @return void
     */
    public function initialize(): void
    {
        $formTemplate = [
        'inputContainer'=>'<div class="mb-3 input {{type}}{{required}}">{{content}}</div>',
        'label'=>'<label{{attrs}} class="form-label">{{text}}</label>',
        'input'=>'<input type="{{type}}" name="{{name}}" class="form-control"{{attrs}}/>',
        'textarea'=>'<textarea name="{{name}}" class="form-control"{{attrs}}>{{value}}</textarea>',
        'nestingLabel'=>'{{hidden}}<label class="form-check-label"{{attrs}}>{{input}}{{text}}</label>',
        'checkbox'=>'<input type="checkbox" name="{{name}}" value="{{value}}" class="form-check-input"{{attrs}}>',
        'select' => '<select name="{{name}}" class="form-control"{{attrs}}>{{content}}</select>',
        'selectMultiple' => '<select name="{{name}}[]" multiple="multiple" class="form-control"{{attrs}}>{{content}}</select>',
    ];
        $this->Form->setTemplates($formTemplate);
        $this->loadHelper('ContentBlocks.ContentBlock');
        // Load View Helper of Authentication plugin
        $this->addHelper('Authentication.Identity');
//        $this->loadHelper('Authentication.Identity');
    }
}
