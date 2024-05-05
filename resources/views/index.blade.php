<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TO DO LISTS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <style>
        .container {
            position: absolute;
            top: 0;
            right: 0;
            margin-top: 4rem;
            margin-right: 7rem;
        }
        
    </style>
</head>
<!--hellor-->

<?php

use Illuminate\Support\Facades\DB;

?>
<body class="font-sans antialiased bg-blue-300 justify-start h-screen pl-5 pt-5" >


        
    <div class="relative min-h-screen flex flex-col items-center justify-center">
        <div style="color:black;">
            <h1 class="text-2xl ms-9 font-bold font-sans mb-3"> TO DO LISTS </h1>
            <div class="max-w-custom mx-auto p-6 bg-white rounded-lg shadow-lg border-solid border-2 border-black overflow-x-auto overflow-y-auto">
               
        
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border">ID</th>
                            <th class="px-4 py-2 border">Title</th>
                            <th class="px-4 py-2 border">Description</th>
                            <th class="px-4 py-2 border">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <td class="px-4 py-3 border-2 border-gray-500">{{$task->id}}</td>
                                <td class="px-4 py-3 border-2 border-gray-500">{{$task->Title}}</td>
                                <td class="px-4 py-3 border-2 border-gray-500">{{$task->Description}}</td>
                                <td class="px-4 py-3 border-2 border-gray-500">{{$task->Completed ? 'Finished' : 'Unfinished'}}</td>
                                <td class="px-4 py-3 border-2 border-gray-500">
                                    <a href="{{ route('task.edit', $task->id) }}" class="text-blue-400 hover:text-blue-500 mr-2">Edit</a> |
                                    <form action="{{ route('task.destroy', $task->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-400 hover:text-red-500">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <div  class="mt-1">
                        <a href="{{ route('task.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded">
                            Create New Task
                        </a>
                    </div>
                </table>
            </div>
        </div>
    </div>

</body>
</html>