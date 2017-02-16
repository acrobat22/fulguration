<?php
/**
 * Created by PhpStorm.
 * User: acrobat
 * Date: 08/02/2017
 * Time: 23:37
 */
// src/FulgurationBundle/Admin/AstuceAdmin.php
namespace FulgurationBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;

class AstuceAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('nom', 'text')
            ->add('contenu', CKEditorType::class, array(
                'config' => array(
                    'config_name' => 'my_config',
                    'uiColor' => '#ffffff',
                )
            ))
            ->add('dateCreate')
            ->add('categorie')
            ->add('actif');
    }




    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('nom')
            ->add('contenu')
            ->add('dateCreate')
            ->add('categorie')
            ->add('actif');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('nom')
            ->add('contenu')
            ->add('dateCreate')
            ->add('categorie')
            ->addIdentifier('actif');
    }
}
