<?php

/**
 * This file belongs to Kreta.
 * The source code of application includes a LICENSE file
 * with all information about license.
 *
 * @author benatespina <benatespina@gmail.com>
 * @author gorkalaucirica <gorka.lauzirika@gmail.com>
 */

namespace spec\Kreta\Component\Comment\Repository;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\ClassMetadata;
use PhpSpec\ObjectBehavior;

/**
 * Class CommentRepositorySpec.
 *
 * @package spec\Kreta\Component\Comment\Repository
 */
class CommentRepositorySpec extends ObjectBehavior
{
    function let(EntityManager $manager, ClassMetadata $metadata)
    {
        $this->beConstructedWith($manager, $metadata);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Kreta\Component\Comment\Repository\CommentRepository');
    }

    function it_extends_kretas_entity_repository()
    {
        $this->shouldHaveType('Kreta\Component\Core\Repository\EntityRepository');
    }
}
