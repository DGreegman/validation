<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
        theme: {
            extend: {
            colors: {
                clifford: '#da373d',
            }
            }
        }
        }
    </script>
    
</head>
<body>
    
    <header class="bg-black">
        <div class="container mx-auto  h-10 ">
            <p class="text-center text-white p-2">Simple Form Validation</p>
        </div>
    </header>
    <div class="container mx-56">
        <div class="w-1/2 py-12">
<?php

            include 'includes/function.php';

            // Check if the form is submitted
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $formData = $_POST;

                // Validate the form data
                $validationErrors = validateForm($formData);

                if (empty($validationErrors)) {
                    // Form is valid, process the data
                    // You can do further processing here, such as saving the data to a database

                    // Move the uploaded file to a desired location
                    $targetDirectory = 'uploads/';
                    $targetFile = $targetDirectory . basename($_FILES['avatar']['name']);
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $targetFile);

                    echo '<span class="text-green-600">Form submitted successfully!</span>';
                } else {
                    // Form has errors, display them to the user
                    foreach ($validationErrors as $error) {
                        echo $error . '<br>';
                    }
                }
            }
?>   
            <form method="POST" enctype="multipart/form-data">
            
                <div class="w-full py-5">
                    <label for="name">Name:</label>
                    <input type="text" name="name"  class="p-2 w-full rounded-md  focus:outline-none border-2 border-slate-300"><br>
                </div>
                <div class="w-full py-5">
                    <label for="age">Age:</label>
                    <input type="number" class="p-2 w-full rounded-md  focus:outline-none border-2 border-slate-300" name="age" >
                </div>
                <div class="w-full py-5">
                    <label for="avatar">Profile Avatar:</label>
                    <input type="file" name="avatar" accept="image/*" >
                </div>

                <div class="w-full p-5">

                    <input type="checkbox" name="activities[]" value="Reading" class="rounded text-pink-500" /> Reading <br>
                    <input type="checkbox" name="activities[]" value="Writing" class="rounded text-pink-500" /> Writing <br>
                    <input type="checkbox" name="activities[]" value="Running" class="rounded text-pink-500" /> Running <br>
                    <input type="checkbox" name="activities[]" value="Cooking" class="rounded text-pink-500" /> Cooking <br>
                </div>

                <div class="w-full py-5">
                    <input type="submit" value="Submit" class="bg-green-600 hover:bg-green-700 text-white text-center p-2 w-full rounded-md font-bold">
                </div>
            </form>    
        </div>
    </div>
</body>
</html>
