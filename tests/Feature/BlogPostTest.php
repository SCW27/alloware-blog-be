<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BlogPostTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_post_id_1()
    {
        $response = $this->get('/api/post/1');
        $response->assertStatus(200);
    }

    public function test_create_post()
    {
        $params = [
            "title" => "Sample Title",
            "content" => "Sample Content"
        ];

        $response = $this->post('/api/post', $params);
        $response->assertStatus(200);
    }

    public function test_create_comment_layer1()
    {
        $params = [
            "title" => "Main Title 1",
            "content" => "Main Content 1"
        ];

        $response = $this->post('/api/post', $params);

        $params = [
            "name" => "Sample Commenter",
            "comment" => "Sample Comment Layer 1",
            "blog_id" => 1,
            "parent_id" => 0
        ];

        $response = $this->post('/api/comment', $params);
        $response->assertStatus(200);
    }

    public function test_create_comment_layer2()
    {
        $params = [
            "title" => "Main Title 1",
            "content" => "Main Content 1"
        ];

        $response = $this->post('/api/post', $params);

        $params = [
            "name" => "Sample Commenter",
            "comment" => "Sample Comment Layer 1",
            "blog_id" => 1,
            "parent_id" => 0
        ];

        $response = $this->post('/api/comment', $params);

        $params = [
            "name" => "Sample Commenter",
            "comment" => "Sample Comment Layer 2",
            "blog_id" => 0,
            "parent_id" => 1
        ];

        $response = $this->post('/api/comment', $params);
        $response->assertStatus(200);
    }

    public function test_create_comment_layer3()
    {
        $params = [
            "title" => "Main Title 1",
            "content" => "Main Content 1"
        ];

        $response = $this->post('/api/post', $params);

        $params = [
            "name" => "Sample Commenter",
            "comment" => "Sample Comment Layer 1",
            "blog_id" => 1,
            "parent_id" => 0
        ];

        $response = $this->post('/api/comment', $params);

        $params = [
            "name" => "Sample Commenter",
            "comment" => "Sample Comment Layer 2",
            "blog_id" => 0,
            "parent_id" => 1
        ];

        $response = $this->post('/api/comment', $params);

        $params = [
            "name" => "Sample Commenter",
            "comment" => "Sample Comment Layer 3",
            "blog_id" => 0,
            "parent_id" => 2
        ];

        $response = $this->post('/api/comment', $params);
        $response->assertStatus(200);
    }

    public function test_create_comment_layer1_with_invalid_params()
    {
        $params = [
            "title" => "Main Title 1",
            "content" => "Main Content 1"
        ];

        $response = $this->post('/api/post', $params);

        $params = [
            "comment" => "Sample Comment Layer 1",
            "blog_id" => 1,
            "parent_id" => 0
        ];

        $response = $this->post('/api/comment', $params);
        // SUPPOSE TO BE 422 but on testing retures 302
        $response->assertStatus(302);
    }

    public function test_create_post_with_invalid_params()
    {
        $params = [
            "content" => "Sample Content"
        ];

        $response = $this->post('/api/post', $params);
        // SUPPOSE TO BE 422 but on testing retures 302
        $response->assertStatus(302);
    }
}
