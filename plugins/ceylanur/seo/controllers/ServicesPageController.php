<?php namespace Ceylanur\Seo\Controllers;

use Backend;
use BackendMenu;
use Backend\Classes\Controller;

class ServicesPageController extends Controller
{
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Ceylanur.Seo', 'main-menu-item', 'side-menu-item5');
    }

}
