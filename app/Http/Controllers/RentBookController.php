<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MemberModel;
use App\Models\RentBookDetailModel;
use App\Models\RentBookModel;
use Illuminate\Support\Facades\DB;

class RentBookController extends Controller
{
    public function store(Request $request)
    {
        $rentbook = new RentBookModel;
        $rentbook->no_invoice = $request->no_invoice;
        $rentbook->member_id = $request->member_id;
        if ($rentbook->save()) {
            $detail = $request->input();
            $header = DB::table('rent_books')->latest('id')->first();
            foreach ($detail['data_detail'] as $key => $value) {
                $rentbook_detail = new RentBookDetailModel;
                $rentbook_detail->rent_book_id = $header->id;
                $rentbook_detail->book_id = $value['book_id'];
                $rentbook_detail->start_date = $value['start_date'];
                $rentbook_detail->end_date = $value['end_date'];
                $rentbook_detail->save();
            }
            return response()->json(['message' => 'Rent book add successfully']);
        }
    }

    public function getall()
    {
        $rentheader  = RentBookModel::all();
        $rentdetail  = RentBookDetailModel::all();
        $posts = RentBookModel::with('rent_book_detail')->get();
        return response([
            $posts
        ]);
    }
}
