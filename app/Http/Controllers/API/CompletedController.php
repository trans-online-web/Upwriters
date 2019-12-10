<?php

namespace App\Http\Controllers\API;

use App\Files;
use App\Mail\CompletedOrder;
use App\Mail\ReceivedOrder;
use App\Task;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Completed;
use Illuminate\Support\Facades\Mail;

class CompletedController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $orderId)
    {
        $request->validate([
            'files' => 'required',
        ]);

        $task_id = Task::where('orderNumber', $orderId)->value('id');
        $task = Task::findOrFail($task_id);
        $task->status = 2;
        $task->update();

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $uploadedFile) {
                $filename = $uploadedFile->storeAs('uploads', time() . $uploadedFile->getClientOriginalName());
                // echo $filename;
                $file = new Completed();
                $file->task_id = Task::where('orderNumber', $orderId)->value('id');
                $file->orderNumber = $orderId;
                $file->path = $filename;
                $file->user_id = auth()->user()->id;
                $file->save();
            }
        }
        $email = Task::where('orderNumber',$orderId)->value('email');
        $data = array(
            'name' => Task::where('orderNumber',$orderId)->value('name'),
            'title' => Task::where('orderNumber',$orderId)->value('title'),
            'subject'=>Task::where('orderNumber',$orderId)->value('subject_name'),
            'orderNo' => $orderId,
        );
        Mail::to($email)->send(new CompletedOrder($data));
        return response(['status' => 'success'], 200);
    }

    public function downloadCompleted($id)
    {
        // echo $path;
        $path = Completed::where('id', $id)->value('path');

        return response()->download(storage_path('app/' . $path));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($orderId)
    {
        return Completed::where('orderNumber', $orderId)->latest()->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
