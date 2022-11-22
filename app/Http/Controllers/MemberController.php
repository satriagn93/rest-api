<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MemberModel;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function store(Request $request)
    {
        //melakukan insert data 
        $members              = new MemberModel;
        $members->name        = $request->name;
        $members->hp       = $request->hp;
        $members->email       = $request->email;
        $members->gender       = $request->gender;
        $members->address       = $request->address;

        //jika berhasil maka simpan data dengan methode $post->save()
        if ($members->save()) {
            return response()->json('Post Berhasil Disimpan');
        } else {
            return response()->json('Post Gagal Disimpan');
        }
    }

    public function getmember()
    {
        $members  = MemberModel::all();
        return response([
            $members
        ]);
    }
}
