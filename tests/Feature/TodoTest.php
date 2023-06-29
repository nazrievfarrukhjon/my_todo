<?php

namespace Tests\Feature;

use App\Models\Todo;
use App\User;
use Tests\TestCase;


class TodoTest extends TestCase
{
    //use RefreshDatabase;

    // example for blackbox testing
    // we just send data and ensure the and result from db
    public function test_create_todo()
    {
        $test = fake()->title();
        $description = fake()->text();

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
        $test = fake()->title();
        $description = fake()->text();

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

    public function test_telegram_notification()
    {
        $test = 'ali';
        $description = 'check if telegram notification works for friends';

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

    public function test_importance()
    {
        $test = 'doctor';
        $description = 'check if importance works';

        $response = $this->post('/todos', [
            'title' => $test,
            'description' => $description,
        ]);

        $response->assertStatus(302);
        $dataExists = \DB::table('todos')
            ->where('title', $test)
            ->where('is_important', true)
            ->exists();

        $this->assertTrue($dataExists);
    }

    public function test_history()
    {
        $test = 'mother';
        $description = 'my father is the best';

        $response = $this->post('/todos', [
            'title' => $test,
            'description' => $description,
        ]);

        $response->assertStatus(302);

        //
        $dataExists = \DB::table('histories')
            ->where('body', '%LIKE%',  $description)
            ->exists();

        $this->assertTrue($dataExists);
    }
}
