<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Biodata;

use App\Ibukandung;
use Validator;
use App\kelas;
use Storage;
use PDF;

class MahasiswaController extends Controller
{
    
    
    public function welcome(){
        return view('welcome');
    }

    public function biodata(){
        return 'Nama : (Lutfiana Khoirunnisa) <br>NIM : (3.34.18.1.14) <br>Alamat : (Boyolali,Jawa Tengah)<br> Hobi : Mengaji';
    }

    public function mahasiswa($jurusan){
        return 'Mahasiswa jurusan : '.$jurusan;
    }

    public function mahasiswa2($jurusan=null) {
        if($jurusan == null)
        return "Data jurusan mahasiswa kosong";
        return "Mahasiswa jurusan : ".$jurusan;
    }

    public function mahasiswa3($jurusan="Teknik Informatika") {
        return 'Mahasiswa jurusan : '.$jurusan;
    }

    public function biodata2() {
        return view('biodata2');
    }

    public function halaman_tersembunyi(){
        return 'Ini halaman yang disembunyikan';
    }

    public function tampilkan_halaman_tersembunyi(){
        return redirect()->route('rahasia');
    }
    public function pertama() {
        echo "route pertama";
    }
    public function kedua() {
        echo "route kedua";
    }
    public function ketiga() {
        echo "route ketiga";
    }

    public function satu() {
        echo "latihan 1";
    }
    public function dua() {
        echo "latihan dua";
    }
    public function tiga(){
        echo "latihan tiga";
    }
    

    public function posts_admin()
    {
        return 'Halaman Admin';
    }
    public function posts()
    {
        return 'Halaman Dashboard';
    }
    public function posts_simpan()
    {
        return 'Data berhasil disimpan';
    }

    public function kuliah(){
        return "Kuliah Teknik Informatika";
    }
    public function kuliah2(){
        return "Kuliah Teknik Informatika juga";
    }

    public function halaman_admin(){
        return 'Halaman Admin bisa diakses setelah login';
    }
    public function halaman_posts(){
        return 'Halaman Dashboard bisa diakses setelah login';
    }
    public function halaman_simpan(){
        return 'Bisa menyimpan setelah setelah login';
    }


    public function input(){
        return view('input_data');
    }

    public function tampilkan(Request $request){
        $nama = $request->input('nama');
        $prodi = $request->input('prodi');
        $tanggal_lahir = $request->input('tanggal_lahir');
        $alamat = $request->input('alamat');
        $hobi = $request->input('hobi');
        $quote = $request->input('quote');
        echo "Nama :".$nama;echo "<br>"; 
        echo "Prodi :".$prodi;echo "<br>";
        echo "Tanggal Lahir :".$tanggal_lahir;echo "<br>";
        echo "Alamat :".$alamat;echo "<br>";
        echo "Hobi :".$hobi;echo "<br>";
        echo "Quote :".$quote;echo "<br>";
    }

    public function tampilkan_biodata(){
        $biodata_list = Biodata::all()->sortBy('nama');
        $jumlah_biodata = $biodata_list->count();
        return view('tampilkan_biodata', compact('biodata_list','jumlah_biodata'));
    }
    
    public function tambah_biodata(){
        $list_kelas = Kelas::pluck('nama_kelas', 'id');
        return view('tambah_biodata', compact('list_kelas'));
    }

    public function store(Request $request){
        $input = $request->all();

        //foto
        if($request->hasFile('foto')){
            $foto = $request->file('foto');
            $ext = $foto->getClientOriginalExtension();
            if($request->file('foto')->isValid()){
                $foto_name = date('YmdHis'). ".$ext";
                $upload_path = 'public/fotoupload';
                $request->file('foto')->move($upload_path, $foto_name);
                $input['foto'] = $foto_name;
            }
        }

        $validator = Validator::make($input, [
        'nim' => 'required|string|unique:biodata,nim',
        'nama' => 'required|string|max:100',
        'prodi' => 'required|string|max:30',
        'tanggal_lahir' => 'required|date',
        'alamat' => 'required|string|max:100',
        'hobi' => 'required|string|max:30',
        'quote' => 'required|string|max:100',
        'nama_ibukandung' => 'required|string|max:100',
        'id_kelas' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        $biodata = Biodata::create($input);
       
        $ibukandung = new Ibukandung;         
        $ibukandung->nama_ibukandung = $request->input('nama_ibukandung');
        $biodata->ibukandung()->save($ibukandung);
  
        return redirect('tampilkan_biodata');
       
    }

    public function show($id){
        $biodata = biodata::find($id);
        return view('show', compact('biodata'));
    }

    public function edit($id){
        $biodata = biodata::find($id);
        $list_kelas = kelas::pluck('nama_kelas', 'id');
        if(!empty($biodata->ibukandung->nama_ibukandung)){
            $biodata->nama_ibukandung = $biodata->ibukandung->nama_ibukandung;
        }
        return view('edit',compact('biodata', 'list_kelas'));
        }

    public function update($id, Request $request){
        $this->validate($request,[
           'nim' => 'required',
           'nama' => 'required',
           'nama_ibukandung' => 'required',
            ]);

            $foto = $request->file('foto');
            $ext = $foto->getClientOriginalExtension();
            if($request->file('foto')->isValid()){
                $foto_name = date('YmdHis'). ".$ext";
                $upload_path = "public/fotoupload";
                $request->file('foto')->move($upload_path, $foto_name);
                $input['foto'] = $foto_name;
            }

            $biodata = Biodata::find($id);
            $biodata->nim = $request->nim;
            $biodata->nama = $request->nama;
            $biodata->tanggal_lahir = $request->tanggal_lahir;
            $biodata->alamat = $request->alamat;
            $biodata->hobi = $request->hobi;
            $biodata->quote = $request->quote;
            $biodata->foto = $foto_name;
            $ibukandung = $biodata->ibukandung;
            $ibukandung->nama_ibukandung = $request->input('nama_ibukandung');
            $biodata->ibukandung()->save($ibukandung);
            $biodata->id_kelas = $request->id_kelas;
            $biodata->save();
            return redirect('tampilkan_biodata');
            }
    

    public function delete($id){
        $biodata = biodata::findOrFail($id);
        $biodata->delete();
        return redirect('tampilkan_biodata');
            }
    

    public function test_collection(){
        $biodata = ['aulia andriani',
                    'andre sulistyo',
                    'kurniawan budi',
                    'monika namira'];
        $collection = collect($biodata)->map(function($nama){
            return ucwords($nama);
        });
        return $collection;
    }

    public function first_collection(){
        $collection = biodata::all()->first();
        return $collection;
    }

    public function last_collection(){
        $collection = biodata::all()->last();
        return $collection;
    }

    public function count_collection(){
        $collection = biodata::all();
        $jumlah = $collection->count();
        return 'Jumlah Data :'.$jumlah;
    }

    public function take_collection(){
        $collection = biodata::all()->take(2);
        return $collection;
    }

    public function pluck_collection(){
        $collection = biodata::all()->pluck('nim','nama');
        return $collection;
    }

    public function where_collection(){
        $collection = biodata::all();
        $collection = $collection->where('nim','19870');
        return $collection;
    }

    public function toarray_collection(){
        $collection = biodata::select('nim', 'nama')->take(3)->get();
        $koleksi = $collection->toArray();
        foreach ($koleksi as $biodata){
            echo $biodata['nim'].' - '.$biodata['nama'].'<br>';
        }
    }

    public function date_mutator(){
        $biodata = biodata::findOrFail(1);
        dd($biodata->tanggal_lahir);
    }

    public function cari(Request $request)
    {
        $kata_kunci = $request->input('kata_kunci');
        $query = Biodata::where('nama', 'LIKE', "%".$kata_kunci."%");
        $biodata_list = $query->paginate(2);
        $pagination = $biodata_list->appends($request->except('page'));
        $jumlah_biodata = $biodata_list->total();
        return view('tampilkan_biodata', compact('biodata_list', 'kata_kunci', 'pagination', 'jumlah_biodata'));
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function buat_pdf()
    {
        $biodata_list = Biodata::all();

        $pdf = PDF::loadview('biodata_pdf',['biodata_list' =>$biodata_list]);
        return $pdf->download('laporan-biodata.pdf');
    }
        
}

