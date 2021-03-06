<?php

namespace spec\Pim\Bundle\CatalogBundle\Doctrine\ORM\Repository;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Driver\Statement;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\ClassMetadata;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\QueryBuilder;

class ChannelRepositorySpec extends ObjectBehavior
{
    function let(
        EntityManager $em,
        Connection $connection,
        Statement $statement,
        ClassMetadata $classMetadata
    ) {
        $connection->prepare(Argument::any())->willReturn($statement);
        $em->getClassMetadata(Argument::any())->willReturn($classMetadata);
        $classMetadata->name = 'channel';
        $em->getConnection()->willReturn($connection);
        $this->beConstructedWith($em, $classMetadata);
    }

    function it_is_a_channel_repository()
    {
        $this->shouldImplement('Pim\Component\Catalog\Repository\ChannelRepositoryInterface');
    }

    function it_count_all_channels($em, QueryBuilder $queryBuilder, AbstractQuery $query)
    {
        $em->createQueryBuilder()->willReturn($queryBuilder);
        $queryBuilder->select('c')->willReturn($queryBuilder);
        $queryBuilder->from('channel', 'c')->willReturn($queryBuilder);
        $queryBuilder->select('count(c.id)')->willReturn($queryBuilder);

        $queryBuilder->getQuery()->willReturn($query);
        $query->getSingleScalarResult()->shouldBeCalled();

        $this->countAll();
    }
}
