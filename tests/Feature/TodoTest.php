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
        $test = \Str::random();
        $description = \Str::random();

        $response = $this->post('/todos', [
            'title' => $test,
            'description' => $description,
        ]);

        $response->assertStatus(302);
        $dataExists = \DB::table('todos')
            ->where('title', $test)
            ->where('description', $description)
            ->exists();

        $this->assertTrue($dataExists);
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
        $test = \Str::random();
        $description = \Str::random();

        $response = $this->put('/todos/' . $todo->id, [
            'title' => $test,
            'description' => $description,
        ]);

        $response->assertStatus(302);
        $dataExists = \DB::table('todos')
            ->where('title', $test)
            ->where('description', $description)
            ->exists();

        $this->assertTrue($dataExists);
    }

    public function test_delete_todo()
    {
        $todo = Todo::factory()->create();

        $response = $this->delete('/todos/' . $todo->id);

        $response->assertStatus(302);

        $dataExists = \DB::table('todos')
            ->where('title', $todo->test)
            ->where('description', $todo->description)
            ->exists();

        $this->assertFalse($dataExists);
    }
}
