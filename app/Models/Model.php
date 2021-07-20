<?php

interface Model
{
    public function insertInto(): void;

    public function update(string $id): void;

    public function getAll(): array;

    public function getSingle(int $id): void;

    public function getFrom(DateTime $dateTime);

    public function search($key);

}