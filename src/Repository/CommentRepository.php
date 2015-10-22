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

namespace Kreta\Component\Comment\Repository;

use Kreta\Component\Core\Repository\EntityRepository;
use Kreta\Component\Issue\Model\Interfaces\IssueInterface;
use Kreta\Component\User\Model\Interfaces\UserInterface;

/**
 * Comment repository class.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 */
class CommentRepository extends EntityRepository
{
    /**
     * Finds all the comments of issue given ordering by createdAt.
     * The result can be more strict adding user and createAt criteria.
     * Can do limit and offset.
     *
     * @param IssueInterface $issue     The issue
     * @param \DateTime      $createdOn The created at
     * @param string         $author    The email of user
     * @param int            $limit     The limit
     * @param int            $offset    The offset
     *
     * @return \Kreta\Component\Comment\Model\Interfaces\CommentInterface[]
     */
    public function findByIssue(
        IssueInterface $issue,
        \DateTime $createdOn = null,
        $author = null,
        $limit = null,
        $offset = null
    ) {
        $queryBuilder = $this->getQueryBuilder();
        if ($createdOn instanceof \DateTime) {
            $this->addCriteria($queryBuilder, ['between' => ['createdOn' => $createdOn]]);
        }
        if ($author !== null) {
            $this->addCriteria($queryBuilder, ['a.email' => $author]);
        }
        $this->addCriteria($queryBuilder, ['issue' => $issue]);
        $this->orderBy($queryBuilder, ['createdOn' => 'ASC']);

        if ($limit) {
            $queryBuilder->setMaxResults($limit);
        }
        if ($offset) {
            $queryBuilder->setFirstResult($offset);
        }

        return $queryBuilder->getQuery()->getResult();
    }

    /**
     * Finds the comments of given id if the user given is its writer.
     *
     * @param string        $commentId The comment id
     * @param UserInterface $user      The user
     *
     * @return \Kreta\Component\Comment\Model\Interfaces\CommentInterface
     */
    public function findByUser($commentId, UserInterface $user)
    {
        return $this->findOneBy(['id' => $commentId, 'author' => $user], false);
    }

    /**
     * {@inheritdoc}
     */
    protected function getQueryBuilder()
    {
        return parent::getQueryBuilder()
            ->addSelect(['i', 'a'])
            ->join('c.issue', 'i')
            ->join('c.author', 'a');
    }

    /**
     * {@inheritdoc}
     */
    protected function getAlias()
    {
        return 'c';
    }
}
