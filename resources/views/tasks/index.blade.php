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
        .crossed-out {
            text-decoration: line-through;
            color: grey;
            background-color: lightgrey;
        }
    </style>
    <style>
    .max-w-full.mx-auto {
        width: 70%; /* Adjust this value to set the width of the container */
        height: 500px; /* Adjust this value to set the height of the container */
    }
</style>
<style>
    th:first-child, td:first-child {
        width: 50px; /* Adjust this value to set the width of the "Check" column */
    }
</style>

<style>
    table {
        border-collapse: separate;
        border-spacing: 0 0.5em;
    }
</style>


</head>
<body class="font-sans antialiased bg-white justify-start h-screen h-screen m-0 p-0" >
       <div style="color:black;">
            <header class="bg-blue-800 text-white absolute left-0 top-0 h-16 w-full text-left py-4 mb-8">
            
            <h1 class="font-bold font-sans text-2xl tracking-tight absolute left-10">To-do List</h1>
            </header>


            <div class="relative min-h-screen flex flex-col top-20 items-start justify-start">
            <div class="max-w-full mx-auto">
                <div class="flex items-start mt-4 mb-2">
                    <a href="{{ route('task.create') }}" class="  text-black bg-yellow-300 border-2 border-black font-bold py-2 px-10 rounded mr-4 w-50 text-center">
                        Add New task

                    </a>
                    
                    <select class="border-2 border-black p-2 px-10 rounded-md w-30 mr-4 ml-auto tex-black bg-green-400">
                    <option value="All task">All task</option>
                <option value="Priority">Priority</option>
                <option value="Done">Done</option>
                </select>
            </div>

            <div class=" w-full my-4 border-2 border-white"></div>

            <div class="max-w-custom mx-auto p-6 bg-white shadow-lg rounded-lg overflow-x-auto overflow-y-auto bg-blue-300 border-black border-2">  
                <table class="table-auto w-full">
                    <tbody>
                    <thead>
                        <tr>
                            <th class="px-4 py-2 rounded-tl-lg bg-blue-700 text-white text-center">Check</th>
                            <th class="px-4 py-2 bg-blue-700   text-white  text-center">Title</th>
                            <th class="px-4 py-2 bg-blue-700   text-white  text-center">Description</th>
                            <th class="px-4 py-2 rounded-tr-lg bg-blue-700 text-white  text-center">Actions</th>
                        </tr>
                        @foreach($tasks as $task)
                        <tr id="row{{$task->id}}">
                                <td class="px-4 py-2 bg-white border-r-2 "><input type="checkbox" onchange="crossOutText(this, 'row{{$task->id}}', 'edit{{$task->id}}', 'delete{{$task->id}}')"></td>
                                <td class="px-4 py-3 bg-white font-bold text-center border-r-2 ">{{$task->Title}}</td>
                                <td class="px-4 py-3 bg-white  text-center border-r-2">{{$task->Description}}</td>
                                <td class="px-4 py-3 rounded-br-lg bg-white  text-center">
                                    <a href="{{ route('task.edit', $task->id) }}" class="text-blue-400 hover:text-blue-500 mr-2"><span id="edit{{$task->id}}">Edit</span></a>
                                    <form action="{{ route('task.destroy', $task->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"><span id="delete{{$task->id}}" class="text-red-400 hover:text-red-500">Delete</span></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function crossOutText(checkboxElem, rowId, editId, deleteId) {
            var rowElem = document.getElementById(rowId);
            var editElem = document.getElementById(editId);
            var deleteElem = document.getElementById(deleteId);
            if (checkboxElem.checked) {
                rowElem.classList.add('crossed-out');
                editElem.classList.add('crossed-out');
                deleteElem.classList.add('crossed-out');
                editElem.parentElement.style.pointerEvents = 'none';
            } else {
                rowElem.classList.remove('crossed-out');
                editElem.classList.remove('crossed-out');
                deleteElem.classList.remove('crossed-out');
                editElem.parentElement.style.pointerEvents = '';
            }
        }
    </script>

</body>
</html>