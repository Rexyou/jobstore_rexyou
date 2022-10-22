<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="w-80 mx-auto h-screen pt-10">
        <div class=" border-solid border-2 border-black px-10 py-5 rounded-md">
            <form action="/tasks" method="POST" enctype="multipart/form-data" class="flex flex-col">
                @csrf
                <input type="text" name="task_description" class="border-red-600 border-solid border-2 rounded-md px-3 py-2 my-2">
                <button type="submit" class="bg-black rounded-md px-3 py-2 text-red-600">Submit</button>
            </form>
        </div>

        <div class="border-solid border-2 border-black px-5 py-2 rounded-md mt-5 h-4/6 overflow-scroll">
            @forelse($tasks as $task)
                <div class="text-sm border-solid border-2 border-red-600 px-3 py-2 rounded-md my-3">
                    <span>Task {{ $task->id }}</span>
                    <p>{{ $task->task_description }}</p>
                    <span>Created at {{ $task->created_at }}</span>
                    <div>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="w-full">
                            @csrf
                            @method('delete')
                            <button type="submit" class="bg-red-600 rounded-md px-3 py-2 text-black w-full mt-5">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <p>No tasks</p>
            @endforelse
        </div>
    </div>   
</body>
</html>