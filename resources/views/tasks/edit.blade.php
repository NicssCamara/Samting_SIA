<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="font-sans antialiased leading-normal tracking-wider bg-gradient-to-b from-blue-500 to-sky-500 h-screen flex items-center justify-center pt-80">
    <div class="min-h-screen flex flex-col items-start justify-start pt-6 px-32  w-full">
        <div class="bg-blue-300 border-2 border-black p-6 rounded-lg shadow-lg w-2/5 mx-auto h-auto ">
            <h1 class="text-3xl font-bold mb-4">Edit Task</h1>
            
            <form action="{{ route('task.update', $task->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 font-bold">Title</label>
                    <input type="text" id="title" name="Title" value="{{ $task->Title }}" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 font-bold">Description</label>
                    <textarea id="description" name="Description" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500" required>{{ $task->Description }}</textarea>
                </div>
            
                <div>
                    <input type="submit" value="Update Task" class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-800 focus:outline-none focus:ring focus:ring-blue-200">
                </div>
            </form>
            <div style="text-align: right;" class="mt-4">
                <a href="{{ route('task.index') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-3 rounded">
                    Cancel
                </a>
            </div>
        </div>
     
    </div>
</body>
</html>
