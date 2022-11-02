<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\SliderFormRequest;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = new  Slider();
        $sliders =  Slider::where(  $sliders->name)->paginate(4);
        return view('admin.slider.index', compact('sliders'));

        // $sliders = Slider::all();
        // return view('admin.slider.index', compact('sliders'));
    }
    public function add()
    {
        $sliders = Slider::all();
        return view('admin.slider.add', compact('sliders'));
    }
    public function insert(SliderFormRequest $request)
    {
        // $slider = new Slider();
        $validatedData = $request->validated();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/slider/', $filename);
            $validatedData['image'] = "uploads/slider/$filename";
        }
        $validatedData['status'] = $request->status == true ? '1' : '0';
        Slider::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'],
            'status' => $validatedData['status'],
        ]);
        return redirect('slider')->with('message', 'Sliders added successfully.');
    }
    // public function edit(Slider $slider)
    // {
    //     return view('admin.slider.edit', compact('slider'));
    // }
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));
    }
    // public function update(SliderFormRequest $request, Slider $slider)
    // {
        public function update(SliderFormRequest $request, $id)
        {
            $slider = Slider::findOrFail($id);
            $validatedData = $request->validated();

        $validatedData = $request->validated();
        if ($request->hasFile('image')) {
            if ($request->hasFile('image')) {
                $destination = $slider->image;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/slider/', $filename);
            $validatedData['image'] = "uploads/slider/$filename";
        }
        $validatedData['status'] = $request->status == true ? '1' : '0';
        Slider::where('id', $slider->id)->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'] ?? $slider->image,
            'status' => $validatedData['status'],
        ]);
        return redirect('slider')->with('message', 'Sliders Updated successfully.');
    }
    // public function destroy(Slider $slider)
    // {
        public function destroy($id)
        {
            $slider = Slider::findOrFail($id);
        $destination = $slider->image;
        if ($slider->count() > 0) {
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $slider->delete();
            return redirect('slider')->with('message', 'Slider deleted successfully.');
        }

        return redirect('delete/slider')->with('message', 'Something went wrong.');
    }
}
