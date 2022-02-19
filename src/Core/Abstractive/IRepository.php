<?php
declare(strict_types=1);

namespace ddd\Core\Abstractive;

interface IRepository
{
    public function getById($id): IAggregate;

    public function getAllBySpecification($specification): array;

    public function getOneBySpecification($specification): array;

    public function create(IAggregate $aggregate): void;

    public function update(IAggregate $aggregate): void;

    public function delete(IAggregate $aggregate): void;
}
