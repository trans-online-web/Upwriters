<?php

namespace App\Http\Controllers\API;

use App\Files;
use App\Revision;
use App\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\Revision as OrderRevision;

class RevisionController extends Controller
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
    public function store(Request $request)
    {
        $taskId = Task::where('orderNumber', $request->orderId)->value('id');
        $task = Task::findOrFail($taskId);
        $task->status = 5;
        $task->update();

        $revision = new Revision();
        $revision->orderNumber = $request->orderId;
        $revision->task_id = Task::where('orderNumber', $request->orderId)->value('id');
        $revision->title = $request->title;
        $revision->instruction = $request->instruction;
        $revision->save();
        $revision_id = $revision->id;

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $uploadedFile) {
                $filename = $uploadedFile->storeAs('uploads', time() . $uploadedFile->getClientOriginalName());
                // echo $filename;
                $file = new Files();
                $file->task_id = Task::where('orderNumber', $request->orderId)->value('id');
                $file->orderNumber = $request->orderId;
                $file->path = $filename;
                $file->revision = $revision_id;
                $file->user_id = auth()->user()->id;
                $file->save();
            }
        }
        $email = User::where('role', 'admin')->get()->toArray();
        $data = array(
            'orderNo' => $request->orderId,
        );
        Mail::to($email)->send(new OrderRevision($data));

        return response(['status' => 'success'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function studentSort($sort){
        if (auth()->user()->role == "student"){
            $user = auth()->user()->id;
            return Task::where('user_id',$user)->where('status', $sort)->latest()->paginate(10);
        }
    }
}
