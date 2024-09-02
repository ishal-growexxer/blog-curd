<?php

namespace Tests\Feature;

    use App\Models\Post;
    use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    /** @test */
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
    public function a_post_requires_a_title()
    {
        $this->expectException(\Illuminate\Validation\ValidationException::class);

        Post::create([
            'user_id' => 1,
            'slug' => 'test-post',
            'body' => 'This is the body of the test post.',
            // No title provided
        ]);
    }

   
    /** @test */
    public function a_post_requires_a_body()
    {
        $this->expectException(\Illuminate\Validation\ValidationException::class);

        Post::create([
            'user_id' => 1,
            'title' => 'Test Post',
            'slug' => 'test-post',
            // No body provided
        ]);
    }

    /** @test */
}
