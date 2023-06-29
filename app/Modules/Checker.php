<?php

namespace App\Modules;

use App\Models\Todo;

class Checker
{
    private array $familyVocabulary = [
        'family',
        'brother',
        'father',
        'mother',
        'sister',
        'uncle',
        'dad',
        'mom',
        'grand',
        'cousin',
        'wife',
        'husband',
        'son'
    ];
    public function isFamily(Todo $todo): bool
    {
        foreach($this->familyVocabulary as $family) {
                if (strpos($todo->title, $family) || strpos($todo->description, $family)) {
                    return true;
                }
        }


        return false;
    }

    private array $friendVocabulary = [
        'ali',
        'vali',
        'bob',
        'john',
        'safar',
        'zafar',
    ];
    public function isFriend($todo): bool
    {
        foreach($this->friendVocabulary as $friend) {
            if (strpos($todo->title, $friend) || strpos($todo->description, $friend)) {
                return true;
            }
        }

        return false;
    }

    private array $importanceVocabulary = [
        'work',
        'boss',
        'father',
        'mother',
        'doctor',
        'children',
    ];

    public function isImportant($todo): bool
    {
        foreach($this->importanceVocabulary as $importance) {
            if (strpos($todo->title, $importance) || strpos($todo->description, $importance)) {
                return true;
            }
        }

        return false;
    }
}
