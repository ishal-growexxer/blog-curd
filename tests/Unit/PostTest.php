<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class PostTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function a_post_can_be_created()
    {
        $post = Post::factory()->create([
            'user_id' => 1,
            'title' => 'Test Post',
            'slug' => 'test-post',
            'body' => 'This is the body of the test post.',
        ]);

        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'title' => 'Test Post',
            'slug' => 'test-post',
            'body' => 'This is the body of the test post.',
        ]);
    }

    /** @test */
    /** @test */


/** @test */
public function a_post_requires_a_title()
{
    $data = [
        'user_id' => 1,
        'slug' => 'test-post',
        'body' => 'This is the body of the test post.',
    ];

    $validator = Validator::make($data, (new \App\Http\Requests\StorePostRequest)->rules());

    $this->assertTrue($validator->fails());
    $this->assertContains('title', $validator->errors()->keys());
}

// Repeat similar tests for slug and body
    /** @test */
    public function a_slug_is_generated_from_the_title_if_not_provided()
    {
        $post = Post::factory()->create([
            'title' => 'My Unique Title',
            'slug' => null,
        ]);

        $this->assertEquals('my-unique-title', $post->slug);
    }
}
