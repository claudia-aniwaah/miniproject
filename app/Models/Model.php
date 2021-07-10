<?php

interface Model
{
    public function getAll(): array;

    public function getSingle(int $id);

    public function getFrom(DateTime $dateTime);

    public function search($key);

}