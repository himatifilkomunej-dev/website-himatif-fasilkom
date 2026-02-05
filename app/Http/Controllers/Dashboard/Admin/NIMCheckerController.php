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
            return view('dashboard.admin.nim-checker.index', compact('contents'));
        } catch (\Exception $e) {
            abort(404);
        }
    }
    //
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
        
        NIMChecker::truncate();
        
        foreach ($csvData as $row) {
            if (empty($row[0])) continue; // Skip empty rows
            
            $nimChecker = new NIMChecker;
            $nimChecker->id = $row[1] ?? ''; // id = nim
            $nimChecker->name = $row[0] ?? '';
            $nimChecker->nim = $row[1] ?? '';
            $nimChecker->angkatan = $row[2] ?? '';
            $nimChecker->status = $row[3] ?? '';
            $nimChecker->save();
        }
         
        return redirect()->route('dashboard.admin.nim-checker.index')->with([
            'type' => 'success',
            'message' => 'Tambah Data NIM Berhasil'
        ]);
    }
}
