<?php

namespace Tests\Feature;

use App\Models\Todo;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoTest extends TestCase
{
    //use RefreshDatabase;

    public function test_create_todo()
    {
        $response = $this->post('/todos', [
            'title' => 'Example Todo',
            'description' => 'This is an example todo.',
        ]);

        $response->assertRedirect('/todos');
        $this->assertDatabaseHas('todos', [
            'title' => 'Example Todo',
            'description' => 'This is an example todo.',
        ]);
    }

    public function test_read_todo()
    {
        $todo = Todo::factory()->create();

        $response = $this->get('/todos');

        $response->assertSee($todo->title);
        $response->assertSee($todo->description);
    }

    public function test_update_todo()
    {
        $todo = Todo::factory()->create();

        $response = $this->put('/todos/' . $todo->id, [
            'title' => 'Updated Todo',
            'description' => 'This is an updated todo.',
        ]);

        $response->assertRedirect('/todos');
        $this->assertDatabaseHas('todos', [
            'id' => $todo->id,
            'title' => 'Updated Todo',
            'description' => 'This is an updated todo.',
        ]);
    }

    public function test_delete_todo()
    {
        $todo = Todo::factory()->create();

        $response = $this->delete('/todos/' . $todo->id);

        $response->assertRedirect('/todos');
        $this->assertDatabaseMissing('todos', [
            'id' => $todo->id,
        ]);
    }
}
