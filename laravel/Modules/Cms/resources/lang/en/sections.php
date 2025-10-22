<?php

declare(strict_types=1);


return [
    'fields' => [
        'name' => [
            'label' => 'Name',
            'placeholder' => 'Enter section name',
        ],
        'slug' => [
            'label' => 'Slug',
            'placeholder' => 'Enter section slug',
        ],
        'description' => [
            'label' => 'Description',
            'placeholder' => 'Enter a description',
        ],
        'image' => [
            'label' => 'Image',
            'placeholder' => 'Select an image',
        ],
        'blocks' => [
            'label' => 'Blocks',
            'placeholder' => 'Add blocks',
        ],
    ],
    'actions' => [
        'create' => 'Create Section',
        'edit' => 'Edit Section',
        'delete' => 'Delete Section',
        'save' => 'Save Section',
        'cancel' => 'Cancel',
    ],
    'messages' => [
        'created' => 'Section created successfully',
        'updated' => 'Section updated successfully',
        'deleted' => 'Section deleted successfully',
        'error' => 'An error occurred',
    ],
];
