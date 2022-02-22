<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\CreateBlogRequest;
use App\Repositories\Blog\BlogRepositoryInterface;

class BlogController extends Controller
{
    private BlogRepositoryInterface $blogRepo;
    public function __construct(BlogRepositoryInterface $blogRepo)
    {
        $this->blogRepo = $blogRepo;
    }

    public function show(string $id)
    {
        $result = $this->blogRepo->show($id);
        return response()->json($result, 200);
    }

    public function store(CreateBlogRequest $request)
    {
        $result = $this->blogRepo->store($request->all());
        return response()->json($result, 200);
    }
}
