<?php
  
namespace App\Http\Controllers;
   
use App\Models\user;
use Illuminate\Http\Request;
  
class DaftaruserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Daftaruser.create');
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
            'password'=> 'required', 
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'fakul_id'=> 'required',
            'prodi_id'=> 'required',
        ]);
        $path = $request->file('image')->store('public/images');
        $Pengguna = new Pengguna;
        $Pengguna->name = $request->name
        $Pengguna->email = $request->email
        $Pengguna->level = $request->level
        $Pengguna->password = $request->password
        $Pengguna->fakul_id = $request->fakul_id
        $Pengguna->prodi_id= $request->prodi_id
        $Pengguna->image = $path;
        $Pengguna->save();
     
        return redirect()->route('Penggunas.index')
                        ->with('success','Pengguna has been created successfully.');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\Pengguna  $Pengguna
     * @return \Illuminate\Http\Response
     */
    public function show(Pengguna $Pengguna)
    {
        return view('Penggunas.show',compact('Pengguna'));
    } 
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengguna  $Pengguna
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengguna $Pengguna)
    {
        return view('Penggunas.edit',compact('Pengguna'));
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
            'title' => 'required',
            'description' => 'required',
        ]);
        
        $Pengguna = Pengguna::find($id);
        if($request->hasFile('image')){
            $request->validate([
              'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $path = $request->file('image')->store('public/images');
            $Pengguna->image = $path;
        }
        $Pengguna->title = $request->title;
        $Pengguna->description = $request->description;
        $Pengguna->save();
    
        return redirect()->route('Penggunas.index')
                        ->with('success','Pengguna updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengguna  $Pengguna
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengguna $Pengguna)
    {
        $Pengguna->delete();
    
        return redirect()->route('Penggunas.index')
                        ->with('success','Pengguna has been deleted successfully');
    }
}