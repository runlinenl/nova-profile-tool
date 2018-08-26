<?php

namespace Runline\ProfileTool\Tests;

use App\User;
use Runline\ProfileTool\Http\Controllers\ToolController;
use Runline\ProfileTool\ProfileTool;
use Symfony\Component\HttpFoundation\Response;

class ToolControllerTest extends TestCase
{
    /** @test */
    public function it_can_can_return_update_user_data()
    {
        $user = factory(User::class)->create([
            'name' => 'Someone',
            'email' => 'someone@example.com'
        ]);

         $this
             ->actingAs($user)
             ->postJson('nova-vendor/runlinenl/nova-profile-tool', ['name' => 'New Name', 'email' => 'other@example.com'])
             ->assertSuccessful();

         $newUserData = User::get()->first();

         $this->assertEquals('New Name', $newUserData->name);
         $this->assertEquals('other@example.com', $newUserData->email);
    }

    /** @test */
    public function it_requires_a_name()
    {
        $user = factory(User::class)->create([
            'name' => 'Someone',
            'email' => 'someone@example.com'
        ]);

        $this
            ->actingAs($user)
            ->postJson('nova-vendor/runlinenl/nova-profile-tool', ['email' => 'other@example.com'])
            ->assertJsonValidationErrors(['name']);
    }

    /** @test */
    public function it_requires_an_email()
    {
        $user = factory(User::class)->create([
            'name' => 'Someone',
            'email' => 'someone@example.com'
        ]);

        $this
            ->actingAs($user)
            ->postJson('nova-vendor/runlinenl/nova-profile-tool', ['name' => 'New Name'])
            ->assertJsonValidationErrors(['email']);
    }

    /** @test */
    public function it_requires_a_valid_email()
    {
        $user = factory(User::class)->create([
            'name' => 'Someone',
            'email' => 'someone@example.com'
        ]);

        $this
            ->actingAs($user)
            ->postJson('nova-vendor/runlinenl/nova-profile-tool', ['name' => 'New Name', 'email' => 'invalid'])
            ->assertJsonValidationErrors(['email']);
    }
}
