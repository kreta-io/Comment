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

namespace Kreta\Component\Comment\Factory;

use Kreta\Component\Issue\Model\Interfaces\IssueInterface;
use Kreta\Component\User\Model\Interfaces\UserInterface;

/**
 * Class CommentFactory.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 */
class CommentFactory
{
    /**
     * The class name.
     *
     * @var string
     */
    protected $className;

    /**
     * Constructor.
     *
     * @param string $className The class name
     */
    public function __construct($className)
    {
        $this->className = $className;
    }

    /**
     * Creates an instance of comment.
     *
     * @param \Kreta\Component\Issue\Model\Interfaces\IssueInterface $issue The issue
     * @param \Kreta\Component\User\Model\Interfaces\UserInterface   $user  The user
     *
     * @return \Kreta\Component\Comment\Model\Interfaces\CommentInterface
     */
    public function create(IssueInterface $issue, UserInterface $user)
    {
        $comment = new $this->className();

        return $comment
            ->setIssue($issue)
            ->setWrittenBy($user);
    }
}
