<?php
/**
 * Created by PhpStorm.
 * User: acrobat
 * Date: 08/02/2017
 * Time: 23:37
 */
// src/FulgurationBundle/Admin/RealisationAdmin.php
namespace FulgurationBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;

class RealisationAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('nom', 'text')
            ->add('description', CKEditorType::class, array(
                'config' => array(
                    'config_name' => 'my_config',
                    'uiColor' => '#ffffff',
                )
            ))
            ->add('lien');
    }


    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('nom')
            ->add('description')
            ->add('lien');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('nom')
            ->add('description')
            ->addIdentifier('lien');
    }
}
