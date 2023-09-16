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
                require_once __DIR__ . '/vendor/autoload.php';
                require_once __DIR__ . '/includes/CustomForm.php';

                $custom = new CustomForm();

                $custom->validateForm();
            ?>   

            <!-- form -->
            <form method="POST" enctype="multipart/form-data">

                <div class="px-4 py-3 rounded relative <?= $custom->form->getClass() ?>">
                    <?=  $custom->form->getMessage() ?>
                </div>
            
                <!-- include csrf token -->
                <?php csrf() ?>

                <!-- Name -->
                <div class="w-full py-5">
                    <label for="name">Name:</label>
                    <input type="text" class="p-2 w-full rounded-md  focus:outline-none border-2 border-slate-300"
                        name="name" value="<?= $custom->form->old('name') ?>">
                </div>

                <!-- Age -->
                <div class="w-full py-5">
                    <label for="age">Age:</label>
                    <input type="number" class="p-2 w-full rounded-md  focus:outline-none border-2 border-slate-300" 
                        name="age" value="<?= $custom->form->old('age') ?>" >
                </div>

                <!-- avatar -->
                <div class="w-full py-5">
                    <label for="avatar">Profile Avatar:</label>
                    <input type="file" name="avatar" accept="image/*" >
                </div>

                <!-- activities -->
                <div class="w-full p-5">

                    <label for="reading" class="block">
                        Reading
                        <input type="checkbox" name="activities[]" value="reading" class="rounded text-pink-500" 
                            id="reading" <?= $custom->validateCheckbox('activities', 'reading') ?>/>
                    </label>

                    <label for="writing" class="block">
                        Writing
                        <input type="checkbox" name="activities[]" value="writing" class="rounded text-pink-500" 
                            id="writing" <?= $custom->validateCheckbox('activities', 'writing') ?>/>
                    </label>

                    <label for="running" class="block">
                        Running
                        <input type="checkbox" name="activities[]" value="running" class="rounded text-pink-500" 
                            id="running" <?= $custom->validateCheckbox('activities', 'running') ?>/>
                    </label>

                    <label for="cooking" class="block">
                        Cooking
                        <input type="checkbox" name="activities[]" value="cooking" class="rounded text-pink-500" 
                            id="cooking" <?= $custom->validateCheckbox('activities', 'cooking') ?>/>
                    </label>
                </div>

                <div class="w-full py-5">
                    <input type="submit" value="Submit" class="bg-green-600 hover:bg-green-700 text-white text-center p-2 w-full rounded-md font-bold">
                </div>
            </form>    
            <!-- end of form -->

        </div>
    </div>
</body>
</html>
