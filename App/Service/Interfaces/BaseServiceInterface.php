<?php

interface BaseServiceInterface
{
    public function create($entity);

    public function delete($id);

    public function getAll();

    public function getById($id);

    public function edit($entity);
}