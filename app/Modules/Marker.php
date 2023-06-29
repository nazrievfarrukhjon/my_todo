<?php

namespace App\Modules;

use App\Models\Todo;

class Marker
{

    public function __construct(private Todo $todo)
    {
    }

    public function markImportance()
    {
        $this->todo->is_important = true;
        $this->todo->save();
    }
}
