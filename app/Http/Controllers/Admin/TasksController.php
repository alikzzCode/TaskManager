<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tasks\StoreRequest;
use App\Http\Requests\Admin\Tasks\UpdateRequest;
use App\Mail\TaskAssigned;
use App\Mail\TaskReminder;
use App\Models\Attachment;
use App\Models\Category;
use App\Models\Task;
use App\Models\User;
use App\Utilities\ImageUploader;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;


class TasksController extends Controller
{
    public function all()
    {
        $tasks = Task::paginate(10);
        return view('admin.tasks.all', compact('tasks'));
    }

    public
    function create()
    {
        $users = User::all();
        $categories = Category::all();
        return view('admin.tasks.add ', compact('categories', 'users'));
    }

    public
    function store(StoreRequest $request)
    {
        $validatedData = $request->validated();
        $userId = Auth::id();
        $createdTask = Task::create([

            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'category_id' => $validatedData['category_id'],
            'user_id' => $validatedData['user_id'],
            'priority' => $validatedData['priority'],
            'expectedEndDate' => $validatedData['expectedEndDate'],
            'created_by' => $userId,
            'updated_by' => $userId,
            'status' => 'In Progress',
        ]);

        if (!$this->uploadAttach($createdTask, $validatedData)) {
            return back()->with('failed', 'تسک ایجاد نشد');

        }
        $assigneeId = $validatedData['user_id'];
        $dueEmail = user::where('id', '=', $assigneeId)->value('email');;
        mail::to($dueEmail)->send(new TaskAssigned());
        return back()->with('success', 'تسک ایجاد شد');


    }


    public function edit($task_id)
    {
        $categories = category::all();
        $users = user::all();
        $task = task::findorfail($task_id);
        return view('admin.tasks.edit', compact('task', 'categories', 'users'));
    }


    public function update(UpdateRequest $request, $task_id)
    {
        $validatedData = $request->validated();

        $task = task::findorfail($task_id);

        $updatedTask = $task->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'category_id' => $validatedData['category_id'],
            'user_id' => $validatedData['user_id'],
            'priority' => $validatedData['priority'],
            'expectedEndDate' => $validatedData['expectedEndDate'],
        ]);

        if (!$this->uploadAttach($task, $validatedData or !$updatedTask)) {
            return back()->with('failed', 'ضمیمه اپدیت نشد');

        }
        $assignUser = task::where('id', '=', $task_id)->value('user_id');
        if ($assignUser !== $validatedData['user_id']) {
            $assigneeId = $validatedData['user_id'];
            $dueEmail = user::where('id', '=', $assigneeId)->value('email');;
            mail::to($dueEmail)->send(new TaskAssigned());
            return back()->with('success', 'تسک اپدیت شد');
        }

        return back()->with('success', 'تسک اپدیت شد');


    }


    public function delete($task_id)
    {
        $task = task::findorfail($task_id);
        $task->delete();
        return back()->with('success', 'تسک حذف شد');
    }

    public function downloadAttachments($task_id)
    {
        $task = Task::findorfail($task_id);
        return response()->download(storage_path('app/local_storage/' . $task->source_url));
    }

    private function uploadAttach($createdTask, $validatedData)
    {
//        $path = null;
        try {
            if (isset($validatedData['source_url'])) {
                $path = 'Tasks/' . $createdTask->id . '/' . $validatedData['source_url']->getClientOriginalName();
                ImageUploader::upload($validatedData['source_url'], $path, 'local_storage');
                $attachedFile = Attachment::create(["name" => $path, 'task_id' => $createdTask->id]);

                if (!$attachedFile) {
                    throw new \Exception('ضمیمه اپلود نشد');
                }
                return true;


            }
            return true;

        } catch
        (\Exception $e) {
            return false;
        }


    }
}


