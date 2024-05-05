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
        .action-icon {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .unclickable {
    pointer-events: none;
    color: #c7bbbb; /* Optional: Change the color to indicate that the button is disabled hyeeee*/ 
}

    </style>
</head>
<body class="font-sans antialiased bg-blue-300 justify-start h-screen h-screen m-0 p-0" >
       <div style="color:black;">
            <header class="bg-blue-600 text-white absolute left-0 top-0 h-16 w-full text-left py-4 mb-8">
            <h1 class="font-semibold text-2xl tracking-tight absolute left-10">To-do List</h1>
            </header>

            <div class="relative min-h-screen flex flex-col top-20 items-start justify-start">
            <div class="max-w-custom mx-auto">
                <div class="flex items-start mt-4 mb-8">
                    <textarea name="Description" rows="1" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500 mr-2" placeholder="Enter Task" required></textarea>
                    <a href="{{ route('task.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded mr-2">
                        Add
                    </a>
    <select class="border-2 border-gray-300 p-2 w-30 onchange="location = this.value;>
        <option value="{{ route('task.index') }}">All tasks</option>
        <option value="{{ route('tasks.showPriority') }}">Priorities only</option>
        <option value="{{ route('tasks.showCompleted') }}">Finished Tasks</option>
    </select>
</div>

<div class = "container">
            <div class="max-w-custom mx-auto p-6 bg-white rounded-lg shadow-lg border-solid border-2 border-black overflow-x-auto overflow-y-auto">      
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border">Check</th>
                            <th class="px-4 py-2 border">Title</th>
                            <th class="px-4 py-2 border">Description</th>
                            <th class="px-4 py-2 border">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                            <tr id="row{{$task->id}}"class="{{ $task->Completed ? 'crossed-out' : '' }}">
                                <td class="px-4 py-2 border"><input type="checkbox" onchange="crossOutText(this, 'row{{$task->id}}', 'edit{{$task->id}}', 'delete{{$task->id}}')"{{ $task->Completed ? 'checked' : '' }}></td>
                                <td class="px-4 py-3 border-2 border-gray-500">{{$task->Title}}</td>
                                <td class="px-4 py-3 border-2 border-gray-500">{{$task->Description}}</td>
                                <td class="px-4 py-3 border-2 border-gray-500">
                                    <div class="action-icon">
                                        <a href="{{ route('task.edit', $task->id) }}" class="text-blue-400 hover:text-blue-500 mr-2 {{ $task->Completed ? 'unclickable' : '' }}">
                                            <span id="edit{{$task->id}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline-block align-text-bottom">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"/>
                                                </svg>
                                            </span>
                                        </a>
                                        <span class="text-gray-400 mx-2">|</span>
                                        <form action="{{ route('tasks.togglePriority', $task->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PUT')
                                          <!-- Modify the button in the HTML template to include the disabled attribute -->
<button type="submit" class="text-yellow-400 hover:text-yellow-500" {{ $task->Completed ? 'disabled' : '' }}>
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline-block align-text-bottom">
        <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z"/>
    </svg>
</button>

                                        </form>
                                        
                                        <span class="text-gray-400 mx-2">|</span>
                                        <form action="{{ route('task.destroy', $task->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">
                                                <span id="delete{{$task->id}}" class="text-red-400 hover:text-red-500">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline-block align-text-bottom">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/>
                                                    </svg>
                                                </span>
                                            </button>
                                        </form>
                                    </div>
                                    
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
            </div>
    <script>
       function crossOutText(checkboxElem, rowId, editId, deleteId) {
    var rowElem = document.getElementById(rowId);
    var editElem = document.getElementById(editId);
    var deleteElem = document.getElementById(deleteId);
     var priorityButton = rowElem.querySelector('button[type="submit"]'); 
    var taskId = rowId.replace('row', '');

    // Send AJAX request
    fetch('/task/' + taskId + '/complete', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            completed: checkboxElem.checked
        })
    }).then(response => response.json())
      .then(data => {
          console.log(data);
          if (data.success) {
              console.log("Task completion status updated successfully");
          } else {
              console.log("Failed to update task completion status");
          }
      });

    if (checkboxElem.checked) {
        rowElem.classList.add('crossed-out');
        editElem.classList.add('unclickable');
        priorityButton.classList.add('unclickable'); 

        editElem.parentElement.style.pointerEvents = 'none';
    } else {
        rowElem.classList.remove('crossed-out');
        editElem.classList.remove('unclickable');
        priorityButton.classList.remove('unclickable');
       
        editElem.parentElement.style.pointerEvents = '';
    }
}
window.onload = function() {
        // Get the selected option from the local storage
        var selectedOption = localStorage.getItem('selectedOption');

        // If there is a selected option in the local storage, set it as the selected option in the dropdown
        if (selectedOption) {
            document.querySelector('select').value = selectedOption;
        }
    };

    // When an option is selected from the dropdown
    document.querySelector('select').onchange = function() {
        // Save the selected option in the local storage
        localStorage.setItem('selectedOption', this.value);

        // Redirect to the selected route
        location = this.value;
    };
    window.onload = function() {
    // Get the selected option from the local storage
    var selectedOption = localStorage.getItem('selectedOption');

    // If there is a selected option in the local storage, set it as the selected option in the dropdown
    if (selectedOption) {
        document.querySelector('select').value = selectedOption;
    }
    }
    
    

    </script>

</body>
</html>
