<?php

interface BaseRepositoryInterface
{
    public function getAll();

    public function getById($id);

    public function create($entity);

    public function delete($id);

    public function update($entity);
}