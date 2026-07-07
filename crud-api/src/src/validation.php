<?php

function validateRequiredFields(array $input, array $fields): ?string {
    $missing = [];

    foreach ($fields as $field) {
        if (!isset($input[$field])) {
            $missing[] = $field;
        }
    }

    if (!empty($missing)) {
        return implode(', ', $missing) . ' are required';
    }

    return null;
}

function validateUserFields(array $input): ?string {
    if (isset($input['name'])) {
        $name = trim($input['name']);

        if ($name === '') {
            return 'Name cannot be empty';
        }

        if (strlen($name) > 100) {
            return 'Name must be at most 100 characters';
        }
    }

    if (isset($input['age'])) {
        if (!is_numeric($input['age'])) {
            return 'Age must be a number';
        }

        $age = (int) $input['age'];

        if ($age < 1 || $age > 150) {
            return 'Age must be between 1 and 150';
        }
    }

    return null;
}