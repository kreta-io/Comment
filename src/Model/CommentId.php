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

use Ramsey\Uuid\Uuid;

/**
 * Comment id class.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 */
final class CommentId
{
    /**
     * The comment id in string format.
     *
     * @var string
     */
    private $id;

    /**
     * Constructor.
     *
     * @param string $id The id in string format
     */
    public function __construct($id = null)
    {
        $this->id = null === $id ? Uuid::uuid4()->toString() : $id;
    }

    /**
     * Gets the id.
     *
     * @return string
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * Method that checks if the comment id given is equal to the current.
     *
     * @param CommentId $anId The comment id
     *
     * @return bool
     */
    public function equals(CommentId $anId)
    {
        return $this->id() === $anId->id();
    }

    /**
     * Magic method that represent the class in string format.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->id();
    }
}
