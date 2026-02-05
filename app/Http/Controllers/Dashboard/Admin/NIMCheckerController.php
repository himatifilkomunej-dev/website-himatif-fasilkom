<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\NIMChecker;
use Illuminate\Http\Request;

use App\Repositories\PageContentRepository;

class NIMCheckerController extends Controller
{
    protected $pageContentRepository;

    public function __construct()
    {
        
        $this->pageContentRepository = new PageContentRepository;
    }
    public function index()
    {
        try {
            $contents = $this->pageContentRepository->get();
            $data = NIMChecker::orderBy('angkatan', 'desc')->orderBy('nim', 'asc')->get();
            return view('dashboard.admin.nim-checker.index', compact('contents', 'data'));
        } catch (\Exception $e) {
            abort(404);
        }
    }
    
    public function store(Request $request) {
        $file = $request->file('data');
        
        if (!$file) {
            return redirect()->back()->with([
                'type' => 'error',
                'message' => 'File CSV tidak ditemukan'
            ]);
        }
        
        $csvData = array_map(function($line) {
            return str_getcsv($line, ';');
        }, explode("\n", $file->get()));
        $header = array_shift($csvData); // Remove header row
        
        $successCount = 0;
        $skipCount = 0;
        
        foreach ($csvData as $row) {
            if (empty($row[0]) || empty($row[1])) continue; // Skip empty rows
            
            // Check if NIM already exists
            $exists = NIMChecker::where('nim', $row[1])->exists();
            if ($exists) {
                $skipCount++;
                continue;
            }
            
            $nimChecker = new NIMChecker;
            $nimChecker->id = $row[1] ?? ''; // id = nim
            $nimChecker->name = $row[0] ?? '';
            $nimChecker->nim = $row[1] ?? '';
            $nimChecker->angkatan = $row[2] ?? '';
            $nimChecker->status = $row[3] ?? '';
            $nimChecker->save();
            $successCount++;
        }
         
        $message = "Berhasil menambahkan {$successCount} data";
        if ($skipCount > 0) {
            $message .= ", {$skipCount} data dilewati (NIM sudah ada)";
        }
        
        return redirect()->route('dashboard.admin.nim-checker.index')->with([
            'type' => 'success',
            'message' => $message
        ]);
    }
    
    public function create()
    {
        try {
            $contents = $this->pageContentRepository->get();
            return view('dashboard.admin.nim-checker.create', compact('contents'));
        } catch (\Exception $e) {
            abort(404);
        }
    }
    
    public function storeManual(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:n_i_m_checkers,nim|max:20',
            'name' => 'required|max:255',
            'angkatan' => 'required|max:10',
            'status' => 'required|in:Aktif,Lulus,Cuti,Tidak Aktif'
        ]);
        
        try {
            $nimChecker = new NIMChecker;
            $nimChecker->id = $request->nim; // ID sama dengan NIM
            $nimChecker->nim = $request->nim;
            $nimChecker->name = $request->name;
            $nimChecker->angkatan = $request->angkatan;
            $nimChecker->status = $request->status;
            $nimChecker->save();
            
            return redirect()->route('dashboard.admin.nim-checker.index')->with([
                'type' => 'success',
                'message' => 'Data mahasiswa berhasil ditambahkan'
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with([
                'type' => 'error',
                'message' => 'Gagal menambahkan data: ' . $e->getMessage()
            ]);
        }
    }
    
    public function edit($id)
    {
        try {
            $contents = $this->pageContentRepository->get();
            $data = NIMChecker::findOrFail($id);
            return view('dashboard.admin.nim-checker.edit', compact('contents', 'data'));
        } catch (\Exception $e) {
            abort(404);
        }
    }
    
    public function updateManual(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'angkatan' => 'required|max:10',
            'status' => 'required|in:Aktif,Lulus,Cuti,Tidak Aktif'
        ]);
        
        try {
            $nimChecker = NIMChecker::findOrFail($id);
            $nimChecker->name = $request->name;
            $nimChecker->angkatan = $request->angkatan;
            $nimChecker->status = $request->status;
            $nimChecker->save();
            
            return redirect()->route('dashboard.admin.nim-checker.index')->with([
                'type' => 'success',
                'message' => 'Data mahasiswa berhasil diupdate'
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with([
                'type' => 'error',
                'message' => 'Gagal mengupdate data: ' . $e->getMessage()
            ]);
        }
    }
    
    public function destroy($id)
    {
        try {
            $nimChecker = NIMChecker::findOrFail($id);
            $nimChecker->delete();
            
            return redirect()->route('dashboard.admin.nim-checker.index')->with([
                'type' => 'success',
                'message' => 'Data berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with([
                'type' => 'error',
                'message' => 'Gagal menghapus data'
            ]);
        }
    }
}
