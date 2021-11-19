<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class Usercontroller extends Controller
{
    //
    function index()
    {
        $data = User::all();
        return view('user',['users'=>$data]);
    }

    function addData(Request $req){
        // dd($req);
        
        $res['status'] = 'error';
        $res['data'] = [];
        $userModel = new User;
        // $userModel->name = $req->input('newName');
        // $userModel->email = $req->input('newName');
        // $userModel->name = $req->input('newName');
        $newData = [
            'name'=> $req->input('newName'),
            'email'=> $req->input('newEmail'),
            'message'=> $req->input('newMessage')
        ];
        if($userModel->insert($newData)){
            // $lastId = $userModel->id();
            $res['status'] = 'success';
            $res['data'] = $newData;
            // $res['data'] = $userModel->where('id',$lastId)->get();
            // dd($res['data']);
        }
        return json_encode($res);


    }

    function getData(Request $req)
    {
        $id = $req->input('id');
        
        $userModel = new User;
        $res['status'] = "error";
        $data = $userModel->where('id',$id)->get();
        if($data){
            $res['status'] = 'success';
            $res['data'] = $data;
        }
        dd($data);
        return json_encode($res);
    }
    // function getData()
    // {
    //     return 
    // }
}
