<?php

namespace App\Service;

interface EntityFieldSetter
{
    /**
     * Set a specific field or fields on an entity.
     *
     * @param object $entity The entity to populate.
     * @param array  $data   The data used for populating the entity.
     */
    public function set($entity, array $data): void;
}
