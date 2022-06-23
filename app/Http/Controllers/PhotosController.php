<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Album;
use Image;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    public function create(int $albumId){
        return view('photos.create')->with('albumId', $albumId);
    }

    /*public function createThumbnail($path, $width, $height)
    {
        $img = Image::make($path)->resize($width, $height)->save($path);
    }*/

    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'tags' => 'required',
            'photo' => 'required|image'
        ]);

        $filenameWithExtension = $request->file('photo')->getClientOriginalName();

        $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

        $extension = $request->file('photo')->getClientOriginalExtension();

        $filenameToStore = $filename . '_' . time() . '.' . $extension;

        $request->file('photo')->storeAs('public/albums/' . $request->input('album-id'), $filenameToStore);

        //$smallthumbnail = $filename.'_small_'.time().'.'.$extension;
        //$request->file('photo')->storeAs('public/albums/thumbnails' . $request->input('album-id'), $smallthumbnail);

        //$tags=explode(',',$request->photo_tag);


        $photo = new Photo();
        $photo->title = $request->input('title');
        $photo->description = $request->input('description');
        $photo->tags = $request->input('tags');
        $photo->photo = $filenameToStore;
        $photo->size = $request->file('photo')->getSize();
        $photo->album_id = $request->input('album-id');
        $photo->save();

        //$photo->photo_tag;
        //$smallthumbnailpath = public_path('public/albums/thumbnails'.$smallthumbnail);
        //$this->createThumbnail($smallthumbnailpath, 150, 93);

        return redirect('/albums/' . $request->input('album-id'))->with('success', 'Photo uploaded successfully!');
    }


    public function edit($id) {


        $photo = Photo::find($id);

        return view('photos.edit', compact('photo'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        //$filenameWithExtension = $request->file('photo')->getClientOriginalName();

        //$filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

        //$extension = $request->file('photo')->getClientOriginalExtension();

        //$filenameToStore = $filename . '_' . time() . '.' . $extension;
        //$request->file('photo')->storeAs('public/albums/' . $request->input('album-id'), $filenameToStore);

        //$tags=explode(',',$request->photo_tag);


        $photo = Photo::find($id);
        $photo->title = $request->input('title');
        $photo->description = $request->input('description');
        $photo->tags = $request->input('tags');
        //$photo->size = $request->file('photo')->getSize();
        //$photo->album_id = $request->input('album-id');
        $photo->update();

        //$photo->photo_tag;
        return redirect('/albums/' . $request->input('album-id'))->with('success', 'Photo uploaded successfully!');
    }

    public function show($id) {
        
        $photo = Photo::find($id);

        return view('photos.show')->with('photo', $photo);
    }
}
