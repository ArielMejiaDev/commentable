<?php

namespace Tests\Feature\Models;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_tests_api_comments_list()
    {
        Comment::factory()->count($expectedComments = 15)->create();

        $response = $this
            ->getJson(route('api.comments.index'))
            ->assertOk()
            ->assertJsonCount($expectedComments, 'data');
    }

    /** @test */
    public function it_tests_api_articles_can_get_replied_comments()
    {
        $article = Article::factory()->create();

        $this->postJson(route('api.comments.store', [
                'body' => 'lorem ipsum dolore siet',
                'commentable_id' => $article->id,
                'commentable_type' => get_class($article),
            ]))
            ->assertCreated();

        $this->assertEquals($article->comments()->first()->id, Comment::query()->first()->id);
    }

    /** @test */
    public function it_tests_api_comments_can_get_replied_comments()
    {
        $comment = Comment::factory()->create();

        $this->postJson(route('api.comments.store', [
            'body' => $body = 'lorem ipsum dolore siet',
            'commentable_id' => $comment->id,
            'commentable_type' => get_class($comment),
        ]))
            ->assertCreated();

        $this->assertEquals(
            $comment->comments()->first()->id,
            Comment::query()->where('body', $body)->first()->id
        );
    }

    /** @test */
    public function it_tests_api_comments_cannot_get_replied_with_third_level_comments()
    {
        $firstLevelComment = Comment::factory()->create();

        $secondLevelCommentData = Comment::factory()->raw();

        $firstLevelComment->comments()->create($secondLevelCommentData);

        $thirdLevelCommentData = Comment::factory()->raw([
            'commentable_id' => $firstLevelComment->comments->first()->id,
            'commentable_type' => get_class($firstLevelComment->comments->first()),
        ]);

        $this->postJson(route('api.comments.store', $thirdLevelCommentData))
            ->assertForbidden();
    }
}
