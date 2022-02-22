<?php

namespace App\Repositories\Comment;

use App\Models\Comment;

class CommentRepository implements CommentRepositoryInterface
{
    protected Comment $model;

    public function __construct(Comment $model)
    {
        $this->model = $model;
    }

    public function store(array $params)
    {
        return $this->model->create($params);
    }
}
