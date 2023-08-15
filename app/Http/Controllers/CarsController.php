<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cars;
use DataTables;
use File;
use Illuminate\Support\Facades\Auth;

class CarsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->name == 'superadmin') {
            return view('superadmin.home');
        } else {
            return view('cars.index');
        }
    }
    public function create()
    {
        return view('superadmin.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('cars.create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->name == 'superadmin') {
        $this->validate($request, [
            'model_name' => 'required|max:200',
            'oneway_km_cost' => 'required|max:200',
            'round_km_cost' => 'required|max:200',
            'image' => 'required',
        ]);

        $data = array(
            'model_name' => $request['model_name'],
            'oneway_km_cost' => $request['oneway_km_cost'],
            'round_km_cost' => $request['round_km_cost'],
        );
        $file_path = '';
        $file_name = '';
        $destinationPath = 'uploads/files';
        $file = $request->file('image');
        if (!empty($file)) {
            $actual_file_name = $file->getClientOriginalName();
            $file_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $file_name);
            $file_path = $destinationPath . $file_name;
            $data['actual_file_name'] = $actual_file_name;
            $data['file_name'] = $file_name;
            $data['file_path'] = $destinationPath;
        }
        $document = new Cars($data);
        $document->save();
        return view('superadmin.home')->with('success', 'New car information added successfully.');
    }
    else{
        $this->validate($request, [
            'model_name' => 'required|max:200',
            'oneway_km_cost' => 'required|max:200',
            'round_km_cost' => 'required|max:200',
            'image' => 'required',
        ]);

        $data = array(
            'model_name' => $request['model_name'],
            'oneway_km_cost' => $request['oneway_km_cost'],
            'round_km_cost' => $request['round_km_cost'],
        );

        $file_path = '';
        $file_name = '';
        $destinationPath = 'uploads/files';

        $file = $request->file('image');
        if (!empty($file)) {
            $actual_file_name = $file->getClientOriginalName();
            $file_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $file_name);
            $file_path = $destinationPath . $file_name;
            $data['actual_file_name'] = $actual_file_name;
            $data['file_name'] = $file_name;
            $data['file_path'] = $destinationPath;
        }
        $document = new Cars($data);
        $document->save();
        return view('cars.index')->with('success', 'New car information added successfully.');
    }
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {
        $data = Cars::find($id);
        return view('cars.edit', compact('data'));
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
        $this->validate($request, [
            'model_name' => 'required|max:200',
            'oneway_km_cost' => 'required|max:200',
            'round_km_cost' => 'required|max:200',
        ]);

        $data = array(
            'model_name' => $request['model_name'],
            'oneway_km_cost' => $request['oneway_km_cost'],
            'round_km_cost' => $request['round_km_cost'],
        );

        $file_path = '';
        $file_name = '';
        $destinationPath = 'uploads/files';

        $cars = Cars::find($id);

        $file = $request->file('image');
        if (!empty($file)) {
            $actual_file_name = $file->getClientOriginalName();
            $file_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $file_name);
            $file_path = $destinationPath . $file_name;
            $data['actual_file_name'] = $actual_file_name;
            $data['file_name'] = $file_name;
            $data['file_path'] = $destinationPath;

            if (!empty($cars->file_name)) {
                File::delete('uploads/files' . $cars->file_name);
            }
        }

        $cars->update($data);
        return redirect()->route('cars.index')->with('success', 'Car information updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteRestoreCar($id)
    {
        $cars = Cars::withTrashed()->find($id);
        if (is_null($cars->deleted_at)) {
            $cars->delete();
            return redirect()->route('cars.index')->with('success', 'Car removed successfully');
        } else {
            $cars->restore();
            return redirect()->route('cars.index')->with('success', 'Car restored successfully');
        }
    }

    public function search(Request $request)
    {
        $data = Cars::withTrashed()->latest();
        return DataTables::of($data)
            ->addColumn('action', function ($row) {
                $actionBtn = '';
                if (is_null($row->deleted_at)) {
                    $actionBtn = '<a href="cars/' . $row->id . '/edit" class="edit btn btn-sm btn-outline-warning btn-square"><i
                class="fas fa-edit me-2"></i>Edit</a> <a href="cars/delete-restore/' . $row->id . '" class="delete btn btn-outline-danger btn-sm btn-square"><i
                class="far fa-trash-alt me-2"></i>Delete</a>';
                } else {
                    $actionBtn = '<a href="cars/delete-restore/' . $row->id . '" class="delete btn btn-outline-secondary btn-sm btn-square"><i
                class="fas fa-redo me-2"></i>Restore</a>';
                }
                return $actionBtn;
            })
            ->filter(function ($instance) use ($request) {
                if (!empty($request->get('status')) && $request->get('status') != "All") {
                    $instance->where('status', $request->get('status'));
                }
                if (!empty($request->get('search'))) {
                    $instance->where(function ($w) use ($request) {
                        $search = $request->get('search');
                        $w->orWhere('model_name', 'LIKE', "%$search%")
                            ->orWhere('oneway_km_cost', 'LIKE', "%$search%")
                            ->orWhere('round_km_cost', 'LIKE', "%$search%");
                    });
                }
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
