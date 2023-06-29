<?php

namespace Tests\Feature;

use App\Models\Todo;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;


class TodoTest extends TestCase
{
    //use RefreshDatabase;

    // example for blackbox testing
    // we just send data and ensure the end result from db
    public function test_create_todo()
    {
        //suppose we check if title lowered
        //first we make it camel case
        $title = Str::upper(fake()->name());
        \Log::info($title);
        $description = fake()->text();

        $response = $this->post('/todos', [
            'title' => $title,
            'description' => $description,
        ]);

        $response->assertStatus(302);
        //here we just check end result
        // not each method ot they return types ot arguments and so on
        $dataExists = \DB::table('todos')
            ->where('title',    Str::lower(preg_replace("/[^a-zA-Z]/", "", $title)))
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
        $title = fake()->title();
        $description = fake()->text();

        $response = $this->put('/todos/' . $todo->id, [
            'title' => $title,
            'description' => $description,
        ]);

        $response->assertStatus(302);
        $dataExists = \DB::table('todos')
            ->where('title', $title)
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
        $title = 'ali';
        $description = 'check if telegram notification works for friends';

        $response = $this->post('/todos', [
            'title' => $title,
            'description' => $description,
        ]);

        $response->assertStatus(302);
        $dataExists = \DB::table('todos')
            ->where('title', $title)
            ->where('description', $description)
            ->exists();

        $this->assertTrue($dataExists);
    }

    public function test_importance()
    {
        $title = 'doctor';
        $description = 'check if importance works';

        $response = $this->post('/todos', [
            'title' => $title,
            'description' => $description,
        ]);

        $response->assertStatus(302);
        $dataExists = \DB::table('todos')
            ->where('title', $title)
            ->where('is_important', true)
            ->exists();

        $this->assertTrue($dataExists);
    }

    public function test_history()
    {
        $title = 'mother';
        $description = 'my father is the best';

        $response = $this->post('/todos', [
            'title' => $title,
            'description' => $description,
        ]);

        $response->assertStatus(302);

        //
        $dataExists = \DB::table('histories')
            ->whereRaw("json_extract(body, '$.title') LIKE '%" . $title . "%'")
            ->exists();

        $this->assertTrue($dataExists);
    }
}
