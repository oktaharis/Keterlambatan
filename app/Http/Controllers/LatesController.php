<?php

namespace App\Http\Controllers;

use App\Models\lates;
use App\Models\rombels;
use App\Models\rayons;
use App\Models\students;
use Illuminate\Http\Request;
use PDF;
use Excel;
use App\Exports\LatesMigrationExport;
use App\Exports\LatesExportPs;
use Illuminate\Support\Facades\Auth;

class LatesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lates = lates::all();
        $students = lates::with('student')->simplePaginate(10);
        return view('lates.admin.index', compact('lates', 'students'));
    }

    public function rekap()
{
    $lates = Lates::all();
    $students = Lates::with('student')->simplePaginate(10);
    $grup = $lates->groupBy('student.nis');
    return view('lates.admin.rekap', compact('lates', 'students', 'grup'));
}

    public function search(Request $request)
    {
        $searchQuery = $request->input('query');
        $lates = lates::all();
        $students = lates::with('student')->simplePaginate(10);
        // $request->session()->put('search_query', $query);
        $latesearch = lates::whereHas('student', function ($studentQuery) use ($searchQuery) {
            $studentQuery->where('name', 'like', '%' . $searchQuery . '%')
                ->orWhere('nis', 'like', '%' . $searchQuery . '%');
        })
            ->orWhere('date_time_late', 'like', '%' . $searchQuery . '%')
            ->orWhere('information', 'like', '%' . $searchQuery . '%')
            ->get();

        return view('lates.admin.index', compact('latesearch', 'lates', 'students', 'searchQuery'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = students::all();
        $lates = lates::all();
        return view('lates.create', compact('students', 'lates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date_time_late' => 'required',
            'information' => 'required',
            'bukti' => 'required|image|mimes:png,jpg,jpeg,svg|max:2048',
            'student_id' => 'required',
        ]);
        $imageName = time() . '.' . $request->bukti->extension();

        $request->bukti->move(public_path('images'), $imageName);

        lates::create([
            'date_time_late' => $request->date_time_late,
            'information' => $request->information,
            'bukti' => $imageName,
            'student_id' => $request->student_id,
        ]);

        return redirect()->back()->with('success', 'Berhasil menambahkan data keterlambatan!');
    }

    /**
     * Display the specified resource.
     */
    // public function detail($nis)
    // {
    //     $student = students::find($nis);
    //     $lates = lates::where('student_id', $nis)->get();

    //     $grup = $lates->groupBy('student.nis');
    //     $totalKeterlambatan = $lates->count();
        
    //     return view('lates.admin.detail', compact('lates', 'student', 'grup', 'totalKeterlambatan'));
    // }
    // ini pembimbing
    public function show($student_id)
    {
        $student = students::find($student_id);
        $lates = lates::where('student_id', $student_id)->get();
        $role = auth()->user()->role;

        if ($role === 'admin') {
           return view('lates.admin.detail', compact('lates', 'student'));
        } else {
            return view('lates.ps.show_data_ps', compact('lates', 'student'));
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $students = students::all();
        $lates = lates::find($id);
        return view('lates.edit', compact('students', 'lates'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'date_time_late' => 'required',
            'information' => 'required',
            'bukti' => 'required|image|mimes:png,jpg,jpeg,svg|max:2048',
            'student_id' => 'required',
        ]);

        $imageName = time() . '.' . $request->bukti->extension();

        $request->bukti->move(public_path('images'), $imageName);

        lates::where('id', $id)->update([
            'date_time_late' => $request->date_time_late,
            'information' => $request->information,
            'bukti' => $imageName,
            'student_id' => $request->student_id
        ]);

        return redirect()->route('lates.admin.index')->with('success', 'Berhasil mengubah data!');
    }
    // public function createPDF($student_id) { 
    //     $student = students::with('rombel', 'rayon')->find($student_id);

    //     $lates = lates::where('student_id', $student_id)->get();

    //     $total = $lates->where('nis', $student->nis)->count();

    //     $pdf = PDF::loadView('lates.print.download.pdf', compact('student', 'total'));
    //     $pdfFileName = 'terlambat_' . $student_id . '.pdf';

    //     return $pdf->download($pdfFileName);
    // }
    
    public function exportExcel()
    {
        $role = auth()->user()->role;

        if ($role === 'admin') {
            return Excel::download(new LatesMigrationExport, 'keterlambatan.xlsx');
        } else {
            $userIdLogin = Auth::id();
            $rayonIdLogin = rayons::where('user_id', $userIdLogin)->value('id');

            return Excel::download(new LatesExportPs($userIdLogin, $rayonIdLogin), 'keterlambatan.xlsx');
        }
    }
    // public function createPDF($nis)
    // {
    //     // Di dalam controller
    //     $students = students::all();
    //     $rombels = rombels::all();
    //     $rayons = rayons::all();

    //     $lates = Lates::whereHas('student', function ($query) use ($nis) {
    //         $query->where('nis', $nis);
    //     })->get();

    //     $grup = $lates->groupBy('student.nis');
    //     $total = $lates->count();

    //     $pdf = PDF::loadView('lates.print.download', compact('grup', 'students', 'total', 'rombels', 'rayons'));

    //     $pdfFileName = 'terlambat_' . $nis . '.pdf';

    //     return $pdf->download($pdfFileName);
    // }
    public function createPDF($studentId)
    {
        // $student = students::find($studentId);
        $student = students::with('rombels', 'rayons')->find($studentId);

        $lates = Lates::whereHas('student', function ($query) use ($studentId) {
            $query->where('student_id', $studentId);
        })->get();

        $grup = $lates->groupBy('student.nis');
        // $pdf = PDF::loadView('admin.data.dataTerlambat.download_data_terlambat', compact('student'));
        // return $pdf->stream('laporan_keterlambatan.pdf');

        $pdf = PDF::loadView('lates.print.download', compact('student', 'grup'));
        $pdfFileName = 'terlambat_' . $studentId . '.pdf';

        // Mendownload file PDF langsung
        return $pdf->download($pdfFileName);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        lates::where('id', $id)->delete();
        return redirect()->back()->with('Deleted', 'Berhasil menghapus data');
    }
    public function indexSiswa(Request $request)
    {
        $userIdLogin = Auth::id();
        $rayonIdLogin = rayons::where('user_id', $userIdLogin)->value('id');

        $perPage = $request->input('perPage', 5);
        $search = $request->input('search');

        // query dasar untuk data siswa
        $query = students::with(['rayons', 'rombels'])
            ->where('rayon_id', $rayonIdLogin);

        $query->when($search, function ($query) use ($search) {
            $query->where('nis', 'LIKE', '%' . $search . '%')
                ->orWhere('name', 'LIKE', '%' . $search . '%');
        });

        $students = $query->get();

        $students->each(function ($student) {
            $student->lates = lates::where('student_id', $student->id)->get();
        });

        $latesQuery = lates::whereIn('student_id', $students->pluck('id'))->orderBy('created_at', 'ASC');

        $lates = ($perPage === 'all') ? $latesQuery->get() : $latesQuery->simplePaginate($perPage);

        return view('lates.ps.data_telat', compact('students', 'lates', 'search', 'perPage'));
    }
}
