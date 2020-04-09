<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ClientRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ClientCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ClientCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Client');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/client');
        $this->crud->setEntityNameStrings('client', 'clients');
        $this->crud->addColumn([
            'name' => 'imagePath',
            'label' => 'Image',
            'type' => 'image',
            'height' => '80px',
            'width' => '100px',
        ]);
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        $this->crud->setFromDb();
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ClientRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        $this->crud->addField([
            'name' => 'cin',
            'label' => 'CIN',
            'type' => 'text',
            'tab' => 'Information général'
        ]);
        $this->crud->addField([
            'name' => 'nom',
            'label' => 'Nom',
            'type' => 'text',
            'tab' => 'Information général'
        ]);
        $this->crud->addField([ 
            'name' => 'prenom',
            'label' => 'Prénom',
            'type' => 'text',
            'tab' => 'Information général'
        ]);
        $this->crud->addField([ 
            'name' => 'email',
            'label' => 'Email',
            'type' => 'text',//'type' => 'email'
            // optional
            'tab' => 'Information général'
        ]);
        $this->crud->addField([
            'name' => 'adresse',
            'label' => 'Address',
            'type' => 'address',
            // optional
            'tab' => 'Information général'
        ]);
        $this->crud->addField([ // select_from_array
            'name' => 'ville',
            'label' => 'Choisir la ville',
            'type' => 'select2_from_array',
            'options' => ['meknes' => 'meknes', 'rabat' => 'rabat', 'casablanca' => 'casablanca','marrakech' => 'marrakech', 'agadir' => 'agadir'],
            'allows_null' => false,
            'allows_multiple' => false,
            'tab' => 'Information général'
        ]);
        $this->crud->addField([ 
            'name' => 'imagePath' ,
            'label' => 'Image' ,
            'type' => 'browse',
            'default' => 'uploads/default.png',
            'tab' => 'Information général'
        ]);



        $this->crud->addField([ 
            'name' => 'login',
            'label' => 'login',
            'type' => 'text',
            'tab' => 'Information d authentification'
        ]);
        $this->crud->addField([
            'name' => 'motdepasse',
            'label' => 'Mot de passe',
            'type' => 'password',
            'tab' => 'Information d authentification'
        ]);
        $this->crud->addField([
            'name' => 'repeterMotdepasse',
            'label' => 'Répéter Mot de passe',
            'type' => 'password',
            'tab' => 'Information d authentification'
        ]);

        $this->crud->setFromDb();

        
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();

        
    }
}



