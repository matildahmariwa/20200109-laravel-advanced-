<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RedirectGuestForBlogCreation extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUserCanCreateABlog()
    {
        $response = $this->get('/');

        $user = factory(\App\User::class)->create();

        $this->actingAs($user);

        $response->assertStatus(200);

        $blogArray = [
          "title"  => "New Blog",
          "body"  => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci earum fuga molestiae nemo neque veniam vero voluptatem! Ad, autem blanditiis, eveniet facere iste labore nisi omnis perspiciatis qui quis voluptatem.",
          "category"  => "3",
        ];


        $response = $this->post("/blogs", $blogArray)->assertRedirect("/");

        $this->assertDatabaseHas("blogs", $blogArray);

        $response->assertStatus(302);
    }
    //test if a guest user is taken to login page when tries to create blog
    public function testRedirectGuest()
    {
        $this->get('/create')->assertSee('login');
    }

    //test fetched blog

    public function test_if_Auth_user_sees_form()
    {
        $user = factory(\App\User::class)->create();

        $this->actingAs($user)
            ->get('/create')
            ->assertSee('Create Here');
    }

}
