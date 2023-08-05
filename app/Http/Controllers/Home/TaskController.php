<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tasks\UpdateRequest;
use App\Http\Requests\FrontEnd\ChangeRequest;
use App\Http\Requests\FrontEnd\DoneRequest;
use App\Mail\TaskAssigned;
use App\Models\Attachment;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Task;
use App\Models\User;
use App\Utilities\ImageUploader;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    use HasRoles;

    public function index(Request $request)
    {
        if ($request->has('search')) {
            $tasks = Task::where('title', 'LIKE', '%' . $request->input('search') . '%')->get();
        } else {
            $tasks = Task::all();
        }
        if (isset($request->filter, $request->action)) {
            $tasks = $this->findfilter($request?->filter, $request?->action);
        }
//        $statuses = Task::all()->lists('status');

        $loggedInUser = Auth::user()->hasRole(['admin', 'manager']);
        $loggedInUserID = auth()->user()->id;
        $categories = Category::all();
        $priorities = DB::table('tasks')->pluck('priority')->unique();;

        if ($loggedInUser) {
            return view('frontend.tasks.all', compact('tasks', 'categories', 'priorities'));
        } else {
            $categories = Category::all();
            $tasks = task::where('tasks.user_id', '=', $loggedInUserID)->get();;
            return view('frontend.tasks.all', compact('tasks', 'categories', 'priorities'));
        }
    }

    public function show($task_id)
    {
        $loggedInUserID = auth()->user()->id;
        $task = task::findorfail($task_id);
        $similarTasks = task::where('category_id', $task->category_id)->take(4)->get();
        $attachments =  attachment::where('id','==', $task->file_id)->get();
        $comments = Comment::where('task_id', $task_id)->get();

        if ($loggedInUser = Auth::user()->hasRole(['admin', 'manager'])) {
            return view('frontend.tasks.show', compact('task', 'similarTasks', 'attachments','comments'));

        }
        if ($task->user_id === $loggedInUserID) {

            return view('frontend.tasks.show', compact('task', 'similarTasks', 'attachments','comments'));

        } else {
            $categories = Category::all();
            $tasks = task::where('tasks.user_id', '=', $loggedInUserID)->get();;
            return view('frontend.tasks.all', compact('tasks', 'categories', 'attachments'));
        }
    }

    public function done($task_id)
    {
        $task = task::findorfail($task_id);
        $loggedInUser = Auth::user();
        $loggedInUserID = auth()->user()->id;
        if ($loggedInUser->hasRole(['admin', 'manager'])) {
            $updatedTask = $task->update([
                'status' => 'Done',
                'user_id' => $loggedInUserID,
                'actualEndDate' => now(),
            ]);
            if (!$updatedTask) {
                return back()->with('failed', 'تسک انجام نشد');

            }
            return back()->with('success', 'تسک انجام شد');
        } elseif ($loggedInUserID == $task->user_id) {
            $updatedTask = $task->update([
                'status' => 'Done',
                'user_id' => $loggedInUserID,
                'actualEndDate' => now(),
            ]);
            if (!$updatedTask) {
                return back()->with('failed', 'تسک انجام نشد');

            }
            return back()->with('success', 'تسک انجام شد');
        }

        return back()->with('faild', 'شما دسترسی ایجاد تغییرات ندارید');
    }

    public function edit($task_id)
    {

        $categories = category::all();
        $users = user::all();
        $task = task::findorfail($task_id);
        return view('frontend.tasks.edit', compact('task', 'categories', 'users'));
    }

    public function change(ChangeRequest $request, $task_id)
    {
        $validatedData = $request->validated();

        $task = task::findorfail($task_id);

        $updatedTask = $task->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'category_id' => $validatedData['category_id'],
        ]);

        return back()->with('success', 'تسک اپدیت شد');

    }

    public function changeMaster(UpdateRequest $request, $task_id)
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
    private function findfilter(string $className, string $methodName)
    {
        $baseNamespace = "App\Http\Controllers\Filter\\";
        $className = $baseNamespace . (ucfirst($className) . 'Filter');
        if (!class_exists($className)) {
            return null;
        }
        $object = new $className;
        if (!method_exists($object, $methodName)) {
            return null;
        }
        return $object->{$methodName}();
    }

   public function create()
    {
        $loggedInUser = Auth::user();
        $categories = Category::all();
        return view('frontend.tasks.add ', compact('categories', 'loggedInUser'));
    }

    public
    function store(DoneRequest $request,$task_id )
    {
        dd($task_id);
        $validatedData = $request->validated();
        $userId = Auth::id();
        $task = task::findorfail($id);
        $task->update([
            'updated_by' => $userId,

        ]);

        if (isset($validatedData['source_url'])) {
            $path = 'Tasks/' . $task->id . '/' . $validatedData['source_url']->getClientOriginalName();
            ImageUploader::upload($validatedData['source_url'], $path, 'local_storage');
            $attachedFile = Attachment::create(["name" => $path, 'task_id' => $task->id]);

            if (!$attachedFile) {
                throw new \Exception('ضمیمه اپلود نشد');
            }
            return true;

//        if (!$this->uploadAttach($createdTask, $validatedData)) {
//            return back()->with('failed', 'تسک ایجاد نشد');
//
//        }
//        return back()->with('success', 'تسک ایجاد شد');


        }
    }

    public function downloadAttachments($task_id)
    {
        $userId = Auth::id();
        $task = Task::findorfail($task_id);
        if ($task->user_id === $userId) {
            return response()->download(storage_path('app/local_storage/' . $task->source_url));
        }
    }

    private function uploadAttach($createdTask, $validatedData)
    {
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

    public function commentAdd(Request $request, $task_id)
    {

        $createdTask = Comment::create([
            'task_id' => $task_id,
            'content' => $request['content'],
        ]);
        if (!$createdTask) {
            return back()->with('failed', 'کامنت ثبت نشد');

        }
        return back()->with('success', 'کامنت ثبت شد');


    }
}
