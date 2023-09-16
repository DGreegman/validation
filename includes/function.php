<?php 

// Function to validate the form data
function validateForm($formData) {
    $errors = [];

    // Check if name is empty
    if (empty($formData['name'])) {
        $errors[] = '<span class="text-red-600">Name is required</span>';
    }

    // Check if age is empty
    if (empty($formData['age'])) {
        $errors[] = '<span class="text-red-600">Age is required</span>';
    } else {
        // Check if age is below 18
        if ($formData['age'] < 18) {
            $errors[] = '<span class="text-red-600">Only 18 and above are allowed</span>';
        }
    }

    // Check if activities are selected
    if (empty($formData['activities'])) {
        $errors[] = '<span class="text-red-600">At least one activity is required</span>';
    }

    // Check the uploaded image
    if (empty($_FILES['avatar']['name'])) {
        $errors[] = '<span class="text-red-600">Profile avatar is mandatory</span>';
    } else {
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $fileExtension = strtolower(pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION));

        // Check if it's a valid image file
        if (!in_array($fileExtension, $allowedExtensions)) {
            $errors[] = '<span class="text-red-600">Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.</span>';
        }

        // Check if the file size is within limits (2MB in this example)
        if ($_FILES['avatar']['size'] > 2 * 1024 * 1024) {
            $errors[] = '<span class="text-red-600">File size exceeds the maximum limit (2MB).</span>';
        }
    }

    return $errors;
}