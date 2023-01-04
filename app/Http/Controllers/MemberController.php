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
            return response()->json('Data Member Berhasil Disimpan');
        } else {
            return response()->json('Data Member Gagal Disimpan');
        }
    }

    public function getmember()
    {
        $members  = MemberModel::all();
        return response([
            $members
        ]);
    }

    public function getmemberbyid($id)
    {
        $members = MemberModel::findOrFail($id);
        return response([
            $members
        ]);
    }

    public function update(Request $request, $id)
    {
        $members = MemberModel::findOrFail($id);
        $members->name        = $request->name;
        $members->hp          = $request->hp;
        $members->email       = $request->email;
        $members->gender      = $request->gender;
        $members->address     = $request->address;

        if ($members->update()) {
            return response()->json('Data member berhasil di Update');
        } else {
            return response()->json('Gagal Update');
        }
    }

    public function storearray(Request $request)
    {
        if ($request->isMethod('post')) {
            $memberData = $request->input();
            // dd($memberData);
            foreach ($memberData['data'] as $key => $value) {
                $member = new MemberModel;
                $member->name = $value['name'];
                $member->hp = $value['hp'];
                $member->email = $value['email'];
                $member->gender = $value['gender'];
                $member->address = $value['address'];
                $member->save();
            }
            return response()->json(['message' => 'Members add successfully']);
        }
    }

    public function destroy($id)
    {
        $member = MemberModel::where('id', $id)->first();
        $member->delete();
        return response()->json([
            'success' => 'Data Successfully Deleted'
        ], 200);
    }
}
