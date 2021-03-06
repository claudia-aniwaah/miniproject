<?php

interface Model
{
//    public function insertInto(array $values): void;

//    public function insertInto(): void;

    public function insert(array $values): bool;

    public function update(array $values, string $id): bool;

    public function getAll(): array;

    public function rowCount(): int;

    public function getSingle(int $id): mixed;

    public function getFrom(DateTime $dateTime);

    public function search($key);

}