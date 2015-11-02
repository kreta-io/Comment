<?php

/*
 * This file is part of the Kreta package.
 *
 * (c) Beñat Espiña <benatespina@gmail.com>
 * (c) Gorka Laucirica <gorka.lauzirika@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Kreta\Component\Comment\Form\Type;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class CommentTypeSpec.
 */
class CommentTypeSpec extends ObjectBehavior
{
    function let(TokenStorageInterface $context, TokenInterface $token, UserInterface $user)
    {
        $context->getToken()->shouldBeCalled()->willReturn($token);
        $token->getUser()->shouldBeCalled()->willReturn($user);
        $this->beConstructedWith('data-class', Argument::type('Object'), $context);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Kreta\Component\Comment\Form\Type\CommentType');
    }

    function it_extends_kreta_abstract_type()
    {
        $this->shouldHaveType('Kreta\Component\Core\Form\Type\Abstracts\AbstractType');
    }

    function it_builds_a_form(FormBuilder $builder)
    {
        $builder->add('description', 'textarea')->shouldBeCalled()->willReturn($builder);

        $this->buildForm($builder, []);
    }

    function it_sets_default_options(OptionsResolver $resolver)
    {
        $resolver->setDefaults(Argument::type('array'))->shouldBeCalled()->willReturn($resolver);
        $resolver->setRequired(['issue'])->shouldBeCalled()->willReturn($resolver);

        $this->configureOptions($resolver);
    }

    function it_gets_name()
    {
        $this->getName()->shouldReturn('kreta_comment_comment_type');
    }
}
