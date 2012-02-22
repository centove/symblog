<?php

namespace Blogger\BlogBundle\Form;

use Symfony\Component\Form\FormBuilder;
use FOS\UserBundle\Form\Type\ProfileFormType as BaseType;

class ProfileFormType extends BaseType
{
    public function buildUserForm(FormBuilder $builder, array $options)
    {
        parent::buildUserForm($builder, $options);

        $builder->add('name');
    }

    public function getName()
    {
        return 'blogger_user_profile';
    }
}

