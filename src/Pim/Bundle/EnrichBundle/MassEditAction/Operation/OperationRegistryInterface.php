<?php

namespace Pim\Bundle\EnrichBundle\MassEditAction\Operation;

/**
 * Registry of mass edit actions indexed by gridName alias
 *
 * @author    Adrien Pétremann <adrien.petremann@akeneo.com>
 * @copyright 2015 Akeneo SAS (http://www.akeneo.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
interface OperationRegistryInterface
{
    /**
     * Register a mass edit $operation and index it by its $operationAlias and $gridName.
     *
     * @param MassEditOperationInterface $operation
     * @param string                     $operationAlias
     * @param string                     $gridName
     * @param string                     $operationGroup
     * @param string|null                $acl
     * @return
     */
    public function register(
        MassEditOperationInterface $operation,
        $operationAlias,
        $gridName,
        $operationGroup,
        $acl = null
    );

    /**
     * Get the mass edit operation registered with the given $operationAlias.
     *
     * @param string $operationAlias
     *
     * @return MassEditOperationInterface
     */
    public function get($operationAlias);

    /**
     * Get all mass edit operations registered for the given $gridName and $operationGroup
     *
     * @param string $gridName
     * @param string $operationGroup
     *
     * @return MassEditOperationInterface[]
     */
    public function getAllByGridNameAndGroup($gridName, $operationGroup);
}
