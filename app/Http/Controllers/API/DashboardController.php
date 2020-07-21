<?php

namespace App\Http\Controllers\API;

use App\Application;
use App\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function index()
    {
        $total_pending_orders = Task::where('status','pending')->count();
        $total_approved_orders = Task::where('status','paid')->count();
        $total_completed_orders = Task::where('status','completed')->count();
        $total_orders_revision = Task::where('status','revision')->count();
        $data = array(
            'total_pending'=>$total_pending_orders,
            'total_approved'=>$total_approved_orders,
            'total_completed'=> $total_completed_orders,
            'total_revision'=>  $total_orders_revision,
        );
        return['data'=>$data];

    }
    public function mydashboard(){
        $user = auth()->user()->id;
        $total_orders = Task::where('user_id',$user)->count();
        $total_pending_orders = Task::where('user_id',$user)->where('status', 0)->count();
        $total_orders_revision = Task::where('user_id',$user)->where('status', 5)->count();
        $total_completed_orders = Task::where('user_id',$user)->where('status', 3)->count();
        $total_approved_orders = Task::where('user_id',$user)->where('status', 1)->count();
        $data = array(
            'total_orders'=> $total_orders,
            'total_pending'=>$total_pending_orders,
            'total_approved'=>$total_approved_orders,
            'total_completed'=> $total_completed_orders,
            'total_revision'=>  $total_orders_revision,
        );
        return['data'=>$data];
    }
    public function usersDash($id)
    {
        $total_orders = Task::where('user_id',$id)->count();
        $total_pending_orders = Task::where('user_id',$id)->where('status', 0)->count();
        $total_orders_revision = Task::where('user_id',$id)->where('status', 5)->count();
        $total_completed_orders = Task::where('user_id',$id)->where('status', 3)->count();
        $total_approved_orders = Task::where('user_id',$id)->where('status', 1)->count();
        $data = array(
            'total_orders'=> $total_orders,
            'total_pending'=>$total_pending_orders,
            'total_approved'=>$total_approved_orders,
            'total_completed'=> $total_completed_orders,
            'total_revision'=>  $total_orders_revision,
        );
        return['data'=>$data];
    }
}
