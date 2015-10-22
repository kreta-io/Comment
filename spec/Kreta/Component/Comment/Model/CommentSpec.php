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

namespace spec\Kreta\Component\Comment\Model;

use Kreta\Component\Issue\Model\Interfaces\IssueInterface;
use PhpSpec\ObjectBehavior;
use Kreta\Component\User\Model\Interfaces\UserInterface;

/**
 * Spec of Comment class.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 */
class CommentSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Kreta\Component\Comment\Model\Comment');
    }

    function it_extends_abstract_model()
    {
        $this->shouldHaveType('Kreta\Component\Core\Model\Abstracts\AbstractModel');
    }

    function it_implements_comment_interface()
    {
        $this->shouldImplement('Kreta\Component\Comment\Model\Interfaces\CommentInterface');
    }

    function its_created_at_is_datetime()
    {
        $this->getCreatedAt()->shouldHaveType('DateTime');
    }

    function its_created_at_is_mutable()
    {
        $createDate = new \DateTime();

        $this->setCreatedAt($createDate)->shouldReturn($this);
        $this->getCreatedAt()->shouldReturn($createDate);
    }

    function its_description_is_mutable()
    {
        $this->setDescription('This is a dummy description of comment')->shouldReturn($this);
        $this->getDescription()->shouldReturn('This is a dummy description of comment');
    }

    function its_issue_is_mutable(IssueInterface $issue)
    {
        $this->setIssue($issue)->shouldReturn($this);
        $this->getIssue()->shouldReturn($issue);
    }

    function it_updated_at_is_mutable()
    {
        $updateDate = new \DateTime();

        $this->setUpdatedAt($updateDate)->shouldReturn($this);
        $this->getUpdatedAt()->shouldReturn($updateDate);
    }

    function its_written_by_is_mutable(UserInterface $user)
    {
        $this->setWrittenBy($user)->shouldReturn($this);
        $this->getWrittenBy()->shouldReturn($user);
    }
}
