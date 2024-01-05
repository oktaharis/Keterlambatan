<?php

namespace App\Http\Controllers;

use App\Models\students;
use App\Models\rombels;
use App\Models\rayons;
// use App\Models\lates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class StudentsController extends Controller
{
    
    public function index()
    {
        $student = Students::all();
        return view('students.index', compact('student'));
    }
    // public function data(){
    //     $rayonId = rayons::where('user_id', Auth::user()->id)->pluck('id');
    //     $siswa = students::whereIn('rayon_id', $rayonId)->get();
    //     // return $siswa;
        
    //     return view('students.ps.index', compact('siswa', 'rayonId'));
    // }
    public function siswa(Request $request)
    {
        $userIdLogin = Auth::id();
        $rayonIdLogin = rayons::where('user_id', $userIdLogin)->value('id');

        // Mendapatkan nilai perPage dari formulir atau menggunakan nilai default (5)
        $perPage = $request->input('perPage', 5);
        $search = $request->input('search');

        $students = students::with('rayons', 'rombels')
            ->where('rayon_id', $rayonIdLogin)
            ->when($search, function ($query) use ($search) {
                $query->where('nis', 'LIKE', '%' . $search . '%')
                    ->orWhere('name', 'LIKE', '%' . $search . '%');
            })
            ->orderBy('created_at', 'ASC')
            ->paginate($perPage);

        return view('students.ps.data_user_ps', compact('students', 'perPage', 'search'));
    }

    
    public function create()
    {
        // Mengganti variabel $rombel_id dan $rayon_id dengan data yang sesuai
        $rombel = rombels::all();
        $rayon = rayons::all();
        return view('students.create', compact('rombel', 'rayon'));
    }
    

    
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required',
            'name' => 'required',
            'rombel_id' => 'required|string',
            'rayon_id' => 'required|string',
        ]);


        Students::create([
            'nis' => $request->nis,
            'name' => $request->name,
            'rombel_id' => $request->rombel_id,
            'rayon_id' => $request->rayon_id,
        ]);

        return redirect()->route('students.index')->with('success', 'Berhasil menambahkan data student!');
    }


    
    public function show(students $students)
    {
        //
    }

    
    public function edit($id)
    {
        $students = Students::find($id);
        $rombels = rombels::all();
        $rayons = rayons::all();
    
        return view('students.edit', compact('students', 'rombels', 'rayons'));
    }
    

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'nis' => 'required',
            'name' => 'required',
            'rombel_id' => 'required|string',
            'rayon_id' => 'required|string',
        ]);


        Students::where('id', $id)->update([
            'nis' => $request->nis,
            'name' => $request->name,
            'rombel_id' => $request->rombel_id,
            'rayon_id' => $request->rayon_id,
        ]);

        return redirect()->route('students.index')->with('success', 'Berhasil menambahkan data student!');
    }

    
    public function delete($id)
    {
        $student = Students::findOrFail($id);
        $student->delete();

        return redirect()->back()->with('deleted', 'Berhasil menghapus data!');
    }


}