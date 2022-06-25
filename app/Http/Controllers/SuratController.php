<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSuratRequest;
use App\Http\Transformers\SuratTransformer;
use App\Models\Remarks;
use App\Models\Surat;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = \Auth::user()->role;
        $data = Surat::where('status', '>=', $role)->where('is_archive',0)->get();
        return view('web.surat.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('web.surat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSuratRequest $request)
    {
        DB::beginTransaction();
        try {
            $surat = SuratTransformer::toInstance($request->validated());

            $surat->file_url = URL::asset('storage/' . $request->file_url->store('documents', 'public'));
            if ($request->type === 'Submit') {
                $surat->status = 1;
            } elseif ($request->type === 'Archive') {
                $surat->status = 0;
                $surat->is_archive = 1;
            }
            $surat->save();

            $remarks = new Remarks;
            $remarks->remarks = $request->remarks;
            $remarks->status = 1;

            $remarks->user_id = \Auth::user()->id;

            $surat->remarks()->save($remarks);

            DB::commit();
            return redirect()->route('surat.index')->with('success', 'Success Data berhasil di simpan');

        } catch (Exception $ex) {
            Log::info($ex->getMessage());
            DB::rollBack();
            return response()->json($ex->getMessage(), 409);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function show(Surat $surat)
    {
        $surat_id = $surat->id;

        $latestRemarks = $surat->remarks->first();
        return view('web.surat.detail', ['data' => $surat, 'latestRemarks' => $latestRemarks, 'showOnly' => false]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modezzzzzzzls\surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function archive(Surat $surat)
    {
        $role = \Auth::user()->role;
        $data = Surat::where('status', '>=', $role)->where('is_archive', 1)->get();
        return view('web.archive.index', compact('data'));
    }

        /**
     * Display the specified resource.
     *
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function archiveDetail(Surat $surat)
    {
        $surat_id = $surat->id;

        $latestRemarks = $surat->remarks->first();
        return view('web.archive.detail', ['data' => $surat, 'latestRemarks' => $latestRemarks, 'showOnly' => false]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, surat $surat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request, Surat $surat)
    {
        // dd($request);
        DB::beginTransaction();
        try {
            // $surat = suratTransformer::getModel($request->surat_id);
            if ($request->type === 'Remark & Disposisi') {
                $surat->status = $this->setStatusByNextRole();
                $this->addRemarks($request, $surat);
            } elseif ($request->type === 'Archive') {
                //archive
                $surat->is_archive = 1;
            } elseif ($request->type === 'Tambah Remark') {
                $this->addRemarks($request, $surat);
            } elseif ($request->type === 'Upload File') {
                // $this->addRemarks($request, $surat);
                $this->addNewFile($request,$surat);
            }
            $surat->save();

            DB::commit();
        } catch (Exception $ex) {
            Log::info($ex->getMessage());
            DB::rollBack();
            return response()->json($ex->getMessage(), 409);
        }
        if($request->type === 'Upload File'){
            return redirect()->back()->with('success',"File Berhasil di upload");
        }
        return redirect()->route('surat.index')->with('success', 'Success Data berhasil di simpan');
    }

    private function setStatusByNextRole($status = true)
    {

        if ($status) {
            return \Auth::user()->role + 1;
        }

        return 99;
    }

    private function addRemarks($request, $surat)
    {
        $remarks = new Remarks;
        $remarks->remarks = $request->remarks;
        $remarks->status = 1;
        $remarks->user_id = \Auth::user()->id;
        $surat->remarks()->save($remarks);
    }

    private function addNewFile($request, $surat)
    {
        $surat->file_url_keluar = URL::asset('storage/' . $request->file_url_keluar->store('documents_keluar', 'public'));
    }
}
