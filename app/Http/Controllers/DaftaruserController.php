<?php
  
namespace App\Http\Controllers;
   
use App\Models\Pengguna;
use Illuminate\Http\Request;
use App\Models\Prodi;
use App\Models\Fakultas;  
use App\Models\User;  
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Alert;
class DaftaruserController extends Controller
{
    /**

 */

    public function __construct()
        {
            $this->middleware('auth');
        }

    public function index()
    {
        $prodi = Prodi::all();
        $fakultas = Fakultas::all();
        $id_fakultas = Auth::user()->fakul_id;
        $pengguna = DB::Table('users')
                    ->join('tb_fakultas','users.fakul_id','=','tb_fakultas.id_fakultas')
                    ->join('tb_prodi','users.prodi_id','=','tb_prodi.id')
                    ->select('users.*','tb_fakultas.nama_fak','tb_prodi.nama_prodi')
                    ->where('tb_fakultas.id_fakultas','=',$id_fakultas)
                    ->get();
        
        return view('Daftaruser.index',compact('pengguna','id_fakultas','prodi','fakultas'))
        ->with('i', (request()->input('page', 1) - 1) * 10);
    }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prodi = Prodi::all();
        $fakultas = Fakultas::all();
        return view('Daftaruser.create', compact('prodi','fakultas'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email'=> 'required',
            'level'=> 'required',
            'password' => 'required |string |min:8',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'fakul_id'=> 'required',
            'prodi_id'=> 'required',
        ]);
        $path = $request->file('image')->store('images');

        $Daftaruser = new Pengguna;
        $Daftaruser->name = $request->name;
        $Daftaruser->email = $request->email;
        $Daftaruser->level = $request->level;
        $Daftaruser->password = hash::make($request->password);
        $Daftaruser->fakul_id = $request->fakul_id;
        $Daftaruser->prodi_id= $request->prodi_id;
        $Daftaruser->image = $path;
        $Daftaruser->save();
     
        Alert::success('Data User Ditambahkan');
        return redirect()->route('Daftaruser.index');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\Pengguna  $Pengguna
     * @return \Illuminate\Http\Response
     */
    public function show(Pengguna $Pengguna)
    {
        return view('Daftaruser.show',compact('Pengguna'));
    } 
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengguna  $Pengguna
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengguna $Pengguna, $id)
    {
        $prodi = Prodi::all();
        $fakultas = Fakultas::all();
        $Pengguna=Pengguna::find($id);
        return view('Daftaruser.edit',compact('Pengguna','prodi','fakultas'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pengguna  $Pengguna
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $request->validate([
            'name' => 'required',
            'email'=> 'required',
            'level'=> 'required',
            'fakul_id'=> 'required',
            'prodi_id'=> 'required'
            
        ]);

          if ($request->hasFile('image')){
                $request->file('image')->move('images/',$request->file('image')->getClientOriginalName());
                $Pengguna->image = $request->file('image')->getClientOriginalName();
             }
       


        $Pengguna = Pengguna::find($id)->update($request->only('name','email','level','image','fakul_id','prodi_id'));
        Alert::success('Sukses', 'Data Berhasil Dirubah');
        return redirect()->route('Daftaruser.index');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengguna  $Pengguna
     * @return \Illuminate\Http\Response
     */
   public function updatepassword(Request $request, $id)
    {
        $request->validate([
            'password' => ['required','min:8','confirmed']
        ]);
            User::find($id)->update(['password' => Hash::make($request->password)]);
            Alert::success('password berhasil dirubah');
            return redirect()->route('Daftaruser.index');    
   
    }

    public function hapus(Request $request, $id)
    {
        $Pengguna = Pengguna::find($id)->delete();
        Alert::success('Sukses', 'Data Berhasil Dirubah');
        return redirect()->route('Daftaruser.index');
    }
}