<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProduitRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ProduitCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProduitCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Produit');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/produit');
        $this->crud->setEntityNameStrings('produit', 'produits');
        $this->crud->addColumn([
            'name' => 'image',
            'label' => 'Image',
            'type' => 'image',
            'height' => '80px',
            'width' => '100px',
        ]);

        $this->crud->addColumn([
            'label' => 'Categorie',
            'type' => 'select',
            'name' => 'catID',
            'attribute' => 'nomCat',
            'entity' => 'category',
            'model' => \App\Models\Catproduit::class,
        ])->afterField('isPromo');

 
        $this->crud->addColumn([
            'name' => 'isPromo',
            'label' => 'Promotion',
            'type' => 'radio',
            'options' => [
            0 => "Non",
             1 => "Oui"
          ]
 ]);
      
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
 



        $this->crud->setFromDb();
    }

    protected function setupCreateOperation()
    
    {
        
        $this->crud->setValidation(ProduitRequest::class);
        $this->crud->addField([
            'name' => 'image',
            'label' => 'Image',
            'type' => 'browse',
            
            ]); 
            $this->crud->addField([
                'label' => 'Categorie',
                'type' => 'select2',
                'name' => 'catID',
                'attribute' => 'nomCat',
                'entity' => 'category',
                'model' => \App\Models\Catproduit::class,
            ]);
          
            $this->crud->addField([
                'label' => 'Promotion',
                'name' => 'isPromo',
                'type' => 'radio',
                'options' => [ // the key will be stored in the db, the value will be shown as label;
                1 => 'Oui',
                0 => 'Non' 
                ],
                'allows_null' => false
                ])->afterField('catId');
        // TODO: remove setFromDb() and manually define Fields
        $this->crud->setFromDb();
        
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }


}
