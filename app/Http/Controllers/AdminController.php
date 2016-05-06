<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request;
use App\Http\Requests\NewImageRequest;
use App\Http\Controllers\Controller;

use DB;

class AdminController extends Controller
{
    public function dashboard() {

      $images = \App\CarouselMaster::all();

      return view('admin.dashboard')->with("images",$images);
    }

    public function create_image(NewImageRequest $request) {
      if ($request->file('carousel_image')->isValid()) {

        $destinationPath = 'uploads'; // upload path
        $file = $request->file('carousel_image');
        $extension = $file->getClientOriginalExtension(); // getting image extension
        $extension = "jpg"; // getting image extension
        $fileName = uniqid().'.'.$extension; // renameing image
        $file->move($destinationPath, $fileName);

        $newImage = new \App\CarouselMaster;
        $newImage->file_path = $destinationPath . "/" . $fileName;
        $newImage->client_name = $request->get("client_name");
        $newImage->description = $request->get("description");
        $newImage->text1 = $request->get("custom_text_1");
        $newImage->text2 = $request->get("custom_text_2");
        $newImage->date = $request->get("start_date");

        $newImage->save();
        return back()->with("status" , "Slide Added");
      }

      return back()->withInput("status",  "Error occured during runtime.");
    }

    public function delete_image($id) {
      \App\CarouselMaster::destroy($id);

      return back()->with("status" , "Slide Deleted");

    }
}
