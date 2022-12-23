<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Exception;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Mahasiswa::all();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama'          => 'required',
                'nim'           => 'required',
                'alamat'        => 'required',
                'prodi'         => 'required',
                'email'         => 'required',
                'ttl'           => 'required',
                'jk'            => 'required',
                'totalsks'      => 'required',
                'perolehansks'  => 'required',
                'ipk'           => 'required',
            ]);

            $mahasiswa = Mahasiswa::create([
                'nama'          => $request->nama,
                'nim'           => $request->nim,
                'alamat'        => $request->alamat,
                'prodi'         => $request->prodi,
                'email'         => $request->email,
                'ttl'           => $request->ttl,
                'jk'            => $request->jk,
                'totalsks'      => $request->totalsks,
                'perolehansks'  => $request->perolehansks,
                'ipk'           => $request->ipk
            ]);

            $data = Mahasiswa::where('id', '=', $mahasiswa->id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Mahasiswa::where('id', '=', $id)->get();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        try {
            $request->validate([
                'nama'          => 'required',
                'nim'           => 'required',
                'alamat'        => 'required',
                'prodi'         => 'required',
                'email'         => 'required',
                'ttl'           => 'required',
                'jk'            => 'required',
                'totalsks'      => 'required',
                'perolehansks'  => 'required',
                'ipk'           => 'required',
            ]);


            $mahasiswa = Mahasiswa::findOrFail($id);

            $mahasiswa->update([
                'nama'          => $request->nama,
                'nim'           => $request->nim,
                'alamat'        => $request->alamat,
                'prodi'         => $request->prodi,
                'email'         => $request->email,
                'ttl'           => $request->ttl,
                'jk'            => $request->jk,
                'totalsks'      => $request->totalsks,
                'perolehansks'  => $request->perolehansks,
                'ipk'           => $request->ipk
            ]);

            $data = Mahasiswa::where('id', '=', $mahasiswa->id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $mahasiswa = Mahasiswa::findOrFail($id);

            $data = $mahasiswa->delete();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success Destroy data');
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
}