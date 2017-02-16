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

class ExperienceAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('nomEntreprise', 'text')
            ->add('dateDebut', DateType::class, array(
                'data'          => new \DateTime(),
                'format'            => 'dd MMMM yyyy',
                'required'      => false,
                'placeholder'   => array(
                    'month' => null,
                    'year'  => null,
                ),
            ))
            ->add('dateDebut')
            ->add('dateFin')
            ->add('fonction', 'text');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('nomEntreprise')
            ->add('dateDebut')
            ->add('dateFin')
            ->add('fonction');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('nomEntreprise')
            ->addIdentifier('dateDebut')
            ->addIdentifier('dateFin')
            ->addIdentifier('fonction');
    }
}
