<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\motorbikeRequest;
use App\motorbike;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class motorbikeController extends Controller
{
    //


    public function index()
    {
        $motorbikes = DB::table('motorbikes')->paginate(5);
        return view("admin.motorbike.list", compact('motorbikes'));
    }

    public function store(motorbikeRequest $request)
    {
        $path = $request->file('image')
            ->store("images");
        $data = [
            "make" => $request->input("make"),
            "model" => $request->input("model"),
            "color" => $request->input("color"),
            "weight" => $request->input("weight"),
            "price" => $request->input("price"),
            "image" => $path,
        ];
        motorbike::create($data);
        return redirect()->route("motorbike.list")->withmsg("motorbike successfully created!");
    }

    public function update(Request $request, $id)
    {
        $motorbikeOldImage = motorbike::find($id);
/*        if (fileExists(storage_path("app/") . $motorbikeOldImage)) {
            unlink(storage_path("app/") . $motorbikeOldImage);
        }*/
        $path = $request->file('image')
            ->store("images");
        $data = [
            "make" => $request->input("make"),
            "model" => $request->input("model"),
            "color" => $request->input("color"),
            "weight" => $request->input("weight"),
            "price" => $request->input("price"),
            "image" => $path,
        ];

        motorbike::where("id", $id)->update($data);
        return redirect()->route("motorbike.list")->withUpdateMsg("your data successfully updated");
    }

    public function delete($id)
    {
        $motorbike = motorbike::findorfail($id);
        $motorbike->delete();
        return redirect()->back();
    }
}
