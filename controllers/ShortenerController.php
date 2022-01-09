<?php namespace Renick\Shortener\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class ShortenerController extends Controller
{
    public $implement = [
        'Backend\Behaviors\ListController',
        'Backend\Behaviors\FormController'
    ];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Renick.Shortener', 'menu-shortener');
    }
}
