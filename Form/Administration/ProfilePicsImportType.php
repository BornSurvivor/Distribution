<?php

/*
 * This file is part of the Claroline Connect package.
 *
 * (c) Claroline Consortium <consortium@claroline.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Claroline\CoreBundle\Form\Administration;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Claroline\CoreBundle\Validator\Constraints\ProfilePicsFile;

class ProfilePicsImportType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'file',
            'file',
            array(
                'required' => true,
                'mapped' => false,
                'label' => 'file',
                'constraints' => array(
                    new NotBlank(),
                    new File(),
                    new ProfilePicsFile()
                )
           )
        );
    }

    public function getName()
    {
        return 'import_profile_pics';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver
        ->setDefaults(
            array(
                'translation_domain' => 'platform'
                )
        );
    }
}
