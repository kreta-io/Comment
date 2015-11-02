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

namespace spec\Kreta\Component\Comment\Factory;

use Kreta\Component\Issue\Model\Interfaces\IssueInterface;
use Kreta\Component\User\Model\Interfaces\UserInterface;
use PhpSpec\ObjectBehavior;

/**
 * Class CommentFactorySpec.
 */
class CommentFactorySpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('Kreta\Component\Comment\Model\Comment');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Kreta\Component\Comment\Factory\CommentFactory');
    }

    function it_creates_a_project(IssueInterface $issue, UserInterface $user)
    {
        $this->create($issue, $user)->shouldReturnAnInstanceOf('Kreta\Component\Comment\Model\Comment');
    }
}
