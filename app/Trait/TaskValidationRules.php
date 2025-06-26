<?php

namespace App\Trait;

trait TaskValidationRules
{
    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string|max:5000',
        'due' => 'required|date|after_or_equal:today',
    ];

    protected $messages = [
        'title.required' => 'The task title is required.',
        'title.max' => 'The title must not exceed 255 characters.',
        'description.required' => 'Please provide a description for the task.',
        'description.max' => 'The description must not exceed 5000 characters.',
        'due.required' => 'Please select a due date.',
        'due.date' => 'The due date must be a valid date.',
        'due.after_or_equal' => 'The due date cannot be in the past.',
    ];


}
