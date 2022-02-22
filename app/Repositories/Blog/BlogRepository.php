<?php

namespace App\Repositories\Blog;

use App\Models\Blog;

class BlogRepository implements BlogRepositoryInterface
{
    protected Blog $model;

    public function __construct(Blog $model)
    {
        $this->model = $model;
    }

    public function store(array $params)
    {
        return $this->model->create($params);
    }

    public function show(string $id)
    {
        return $this->model->with(['comments'])->findOrFail($id);
    }
}
