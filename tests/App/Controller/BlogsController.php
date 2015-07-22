<?php
namespace CrudView\Test\App\Controller;

use Cake\Controller\Controller;
use Crud\Controller\ControllerTrait;

class BlogsController extends Controller
{

    use ControllerTrait;

    public $paginate = ['limit' => 3];

    public function initialize()
    {
        $this->viewClass = 'CrudView\View\CrudView';
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Crud.Crud', [
            'actions' => [
                'Crud.Index',
                'Crud.View',
                'Crud.Add',
                'Crud.Edit',
                'Crud.Delete',
                'Crud.Lookup',
                'deleteAll' => [
                    'className' => 'Crud.Bulk/Delete',
                ],
                'toggleActiveAll' => [
                    'className' => 'Crud.Bulk/Toggle',
                    'field' => 'is_active',
                ],
                'deactivateAll' => [
                    'className' => 'Crud.Bulk/SetValue',
                    'field' => 'is_active',
                    'value' => false,
                ],
            ],
            'listeners' => [
                'CrudView.View',
                'Crud.Redirect',
                'Crud.RelatedModels',
                'CrudView.Search',
            ],
        ]);
    }
}
