<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Nilai;
use Response;

class InputNilaiController extends Controller
{
    
    public function inputNilai(){
        return view('inputNilai');
    }

    public function getMatkul($prodi){
        $matkul = DB::table('kelas_matkuls') -> where('prodi', $prodi) -> get();

        return Response::json($matkul);
    }

    public function getMahasiswa($matkul){
        $kelas = DB::table('kelas_matkuls')  -> where('id', $matkul) -> get();
        
        $resultKelas = collect(json_decode($kelas))->pluck('id')->all();
        $relasiKelas = DB::table('mahasiswa_to_kelas_matkuls') -> whereIn('kelas_matkul_id', $resultKelas)  -> get();
        $resultMahasiswa = collect(json_decode($relasiKelas))->pluck('id')->all();

        $mahasiswa = DB::table('mahasiswas')
        ->join('nilais', 'mahasiswas.id', '=', 'nilais.mahasiswa_id')
        ->select('mahasiswas.*', 'nilais.*')
        ->get();
        return Response::json($mahasiswa);

    }

    public function inputNilaiMahasiswa(Request $request, $kelas){
        // 1. buatlah validate data, cuman validate data yang banyak input buat cuma satu attribute


        // 2. Buatlah insert data nilai apabila disubmit dari ui. UI nya ga ush diapa apain, udah aku sesuai buat kalian. 
        // kalian cuma fokus ke sini. itukan nilainya banyak ya barti insert ke tabelnya pake perulangan.

        // udah gitu aja semangat
        $rules = [
            'nim.*' => 'required|max:12',
            'nilai.*' => 'required|numeric|max:100|min:0'];
        
        $messages = [
            'nim.*.required' => 'nim field is required.',
            'nilai.*.required' => "nilai is required"
            ];
        
        $validator = Validator::make($request->all(), $rules, $messages);

        
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();}

        $nilai = $request->all();
        

        
        foreach ($nilai['nim'] as $key => $value) {
            $mahasiswa_id= DB::table('mahasiswas') -> where('nim',$nilai['nim'][$key]) -> get();

            $nilais = Nilai::where('mahasiswa_id', $mahasiswa_id[0] -> id)->first();

            $nilais-> update([
                'mahasiswa_id' => $mahasiswa_id[0] -> id,
                'kelas_matkul_id' => $kelas,
                'nilai' => $nilai['nilai'][$key],
                ]);
            }

        return redirect('/inputNilai');

        
    }

}
