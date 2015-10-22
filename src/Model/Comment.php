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

namespace Kreta\Component\Comment\Model;

use Kreta\Component\Comment\Model\Interfaces\CommentInterface;
use Kreta\Component\Core\Model\Abstracts\AbstractModel;
use Kreta\Component\Issue\Model\Interfaces\IssueInterface;
use Kreta\Component\User\Model\Interfaces\UserInterface;

/**
 * Comment class.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 */
final class Comment
{
    /**
     * The id.
     *
     * @var CommentId
     */
    private $id;

    /**
     * The author.
     *
     * @var UserInterface
     */
    private $author;

    /**
     * The content.
     *
     * @var string
     */
    private $content;

    /**
     * Created on.
     *
     * @var \DateTime
     */
    private $createdOn;

    /**
     * The issue.
     *
     * @var IssueInterface
     */
    private $issue;

    /**
     * Updated on.
     *
     * @var \DateTime
     */
    private $updatedOn;

    /**
     * Private constructor.
     *
     * @param CommentId      $anId     The comment id
     * @param string         $aContent The content
     * @param UserInterface  $anAuthor The author
     * @param IssueInterface $anIssue  The issue
     */
    private function __construct(CommentId $anId, $aContent, UserInterface $anAuthor, IssueInterface $anIssue)
    {
        $this->id = $anId;
        $this->content = $aContent;
        $this->issue = $anIssue;
        $this->author = $anAuthor;
        $this->createdOn = new \DateTime();
        $this->updatedOn = new \DateTime();
    }

    /**
     * Named static constructor.
     *
     * @param CommentId      $anId     The comment id
     * @param string         $aContent The content
     * @param UserInterface  $anAuthor The author
     * @param IssueInterface $anIssue  The issue
     *
     * @return Comment
     */
    public static function publish(CommentId $anId, $aContent, UserInterface $anAuthor, IssueInterface $anIssue)
    {
        return new self($anId, $aContent, $anAuthor, $anIssue);
    }

    /**
     * {@inheritdoc}
     */
    public function author()
    {
        return $this->author;
    }

    /**
     * {@inheritdoc}
     */
    public function content()
    {
        return $this->content;
    }

    /**
     * {@inheritdoc}
     */
    public function createdOn()
    {
        return $this->createdOn;
    }

    /**
     * {@inheritdoc}
     */
    public function issue()
    {
        return $this->issue;
    }

    /**
     * {@inheritdoc}
     */
    public function setContent($aContent)
    {
        $this->content = $aContent;
        $this->updatedOn = new \DateTime();

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function updatedOn()
    {
        return $this->updatedOn;
    }

    /**
     * Magic method that represents the class into string.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->id;
    }
}
