<?php

namespace App\Http\Controllers\API;

use App\Mail\OrderPayment;
use App\Mail\ReceivedOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Task;
use App\Files;
use App\Subject;
use App\Document;
use Illuminate\Support\Facades\Mail;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        return Task::latest()->get();
    }

    public function student()
    {
        $user = auth()->user()->id;
        return Task::where('user_id', $user)->latest()->get();
    }

    public function userPending($id)
    {
        return Task::where('user_id',$id)->where('status', 0)->latest()->get();
    }
    public function userProgress($id)
    {
        return Task::where('user_id',$id)->where('status', 1)->latest()->get();
    }
    public function userCompleted($id)
    {
        return Task::where('user_id',$id)->where('status', 3)->latest()->get();
    }
    public function userRevision($id)
    {
        return Task::where('user_id',$id)->where('status', 5)->latest()->get();
    }
    public function myRevision()
    {
        $id = auth()->user()->id;
        return Task::where('user_id',$id)->where('status', 5)->latest()->get();
    }
    public function myCompleted()
    {
        $id = auth()->user()->id;
        return Task::where('user_id',$id)->where('status', 3)->latest()->get();
    }
    public function myPending()
    {
        $id = auth()->user()->id;
        return Task::where('user_id',$id)->where('status', 0)->latest()->get();
    }
    public function myProgress()
    {
        $id = auth()->user()->id;
        return Task::where('user_id',$id)->where('status', 1)->latest()->get();
    }
    public function subjects(){
      return Subject::latest()->get();
    }
    public function types(){
        return Document::latest()->get();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'type' => 'required',
            'budget' => 'required',
            'title' => 'required',
        ]);
        $orderNo = auth('api')->user()->id . time();

        $task = new Task();
        $task->user_id = auth()->user()->id;
        $task->name = auth()->user()->name;
        $task->email = auth()->user()->email;
        $task->subject_name = $request->subject;
        $task->other_subject = $request->other_subject;
        $task->documentType_name = $request->type;
        $task->deadline_datetime = $request->date;
        $task->suggested_price = $request->suggested;
        $task->budget = $request->budget;
        $task->level = $request->level;
        $task->title = $request->title;
        $task->task = $request->task;
        $task->orderNumber = $orderNo;
        $task->pages = $request->pages;
        $task->spacing = $request->spacing;
        $task->format = $request->w_format;
        $task->save();
        $task_id = $task->id;

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $uploadedFile) {
                $filename = $uploadedFile->storeAs('uploads', time() . $uploadedFile->getClientOriginalName());
                // echo $filename;
                $file = new Files();
                $file->task_id = $task_id;
                $file->orderNumber = $orderNo;
                $file->path = $filename;
                $file->user_id = auth()->user()->id;
                $file->save();
            }
        }
        $email = auth()->user()->email;
        $data = array(
            'name' => auth()->user()->name,
            'title' => $request->title,
            'subject' => $request->subject,
            'orderNo' => $orderNo,
        );
        Mail::to($email)->send(new ReceivedOrder($data));
        return response(['status' => 'success'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Task::where('orderNumber', $id)->first();
    }

    public function ifFiles($orderId)
    {
        return Files::where('orderNumber', $orderId)->where('revision', 0)->count();
    }

    public function getFiles($orderId)
    {
        return Files::where('orderNumber', $orderId)->where('revision', 0)->get();
    }

    public function user($orderId)
    {
        return Task::where('orderNumber', $orderId)->value('user_id');
    }

    public function ThisUser($orderId)
    {
        $id = Task::where('orderNumber', $orderId)->value('user_id');
        $user = User::where('orderNumber', $id)->first();
        return $user;
    }

    public function admin()
    {
        return User::where('role', 'admin')->value('id');
    }

    public function addPrice(Request $request, $orderId)
    {
        $request->validate([
            'price' => 'required',
        ]);

        $task = Task::findOrFail($orderId);
        $task->price = $request->price;
        $task->update();
    }

    public function addFiles(Request $request, $orderId)
    {
        $request->validate([
            'files' => 'required',
        ]);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $uploadedFile) {
                $filename = $uploadedFile->storeAs('uploads', time() . $uploadedFile->getClientOriginalName());
                // echo $filename;
                $file = new Files();
                $file->task_id = Task::where('orderNumber', $orderId)->value('id');
                $file->orderNumber = $orderId;
                $file->path = $filename;
                $file->user_id = auth()->user()->id;
                $file->save();
            }
        }
        return response(['status' => 'success'], 200);
    }

    public function downloadFile($id)
    {
        // echo $path;
        $path = Files::where('id', $id)->value('path');

        return response()->download(storage_path('app/' . $path));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $task = Task::findOrFail($id);
        $task->status = $request->status;
        $task->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function agreedPrice(Request $request)
    {
        $request->validate([
            'price' => 'required',
        ]);

        $taskId = Task::where('orderNumber', $request->orderId)->value('id');
        $task = Task::findOrFail($taskId);
        $task->agreedAmount = $request->price;
        $task->update();

        $email = Task::where('orderNumber', $request->orderId)->value('email');
        $data = array(
            'name' => Task::where('orderNumber', $request->orderId)->value('name'),
            'title' => Task::where('orderNumber', $request->orderId)->value('title'),
            'subject' => Task::where('orderNumber', $request->orderId)->value('subject_name'),
            'orderNo' => $request->orderId,
            'amount' => $request->price
        );
        Mail::to($email)->send(new OrderPayment($data));
    }
}
