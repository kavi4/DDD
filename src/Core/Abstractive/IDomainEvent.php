<?php
declare(strict_types=1);

namespace ddd\Core\Abstractive;

interface IDomainEvent extends IValueObject
{
    /**
     * @return mixed
     */
    public function getOwner();

    /**
     * @return mixed
     */
    public function getCreatedAt();
}
