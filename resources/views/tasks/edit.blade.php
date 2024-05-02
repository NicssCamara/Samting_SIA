<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="font-sans antialiased bg-blue-300 h-screen pl-5 pt-5">
    <div class="min-h-screen flex flex-col items-center justify-center">
        <div class="bg-white p-6 rounded-lg shadow-lg border-solid border-2 border-black">
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
                <div class="mb-4">
                    <label for="completed" class="block text-gray-700 font-bold">Completed?</label>
                    <input type="radio" id="completed" name="Completed" value="1" {{ $task->Completed ? 'checked' : '' }}> Finished
                    <input type="radio" id="not-completed" name="Completed" value="0" {{ $task->Completed ? '' : 'checked' }}> Unfinished
                </div>
            
                <div>
                    <input type="submit" value="Update Task" class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200">
                </div>
            </form>
            <div style="text-align: right;" class="mt-4">
                <a href="{{ route('task.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded">
                    Cancel
                </a>
            </div>
        </div>
     
    </div>
</body>
</html>
