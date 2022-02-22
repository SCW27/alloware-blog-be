<?php

namespace App\Repositories\Blog;

interface BlogRepositoryInterface
{
    public function store(array $params);
    public function show(string $id);
}
