<?php

namespace Tests\Feature;

use App\Blog;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class testScopeCategory extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    //test Category scope
    public function testScope()
    {
        $blog=factory(Blog::class)->create(['category'=>'2']);
        $searchResults = Blog::category()->get();
        $this->assertEquals($searchResults[0]->category, '2');
    }

    public function test_if_user_can_see_title()
    {
        $blog=factory('App\Blog')->create();
        $response =$this->get('/');
        $response->assertSee($blog->title);
    }

    public function test_a_user_can_view_blogs()
    {
        $response = $this->get('/');

        $response->assertStatus(200);

    }
}
