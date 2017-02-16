<?php
/**
 * Created by PhpStorm.
 * User: acrobat
 * Date: 08/02/2017
 * Time: 23:37
 */
// src/FulgurationBundle/Admin/CategorieAdmin.php
namespace FulgurationBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class CategorieAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('nom', 'text')
                    ->add('actif');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('nom')
                        ->add('actif');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('nom')
                    ->addIdentifier('actif');
    }
}
