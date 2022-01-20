       
        $Pengguna = Pengguna::find($id)->update($request->all());
        if ($request->hasFile('image')){
                $request->file('image')->store('images');
                $Pengguna->image = $request->file('image')->getClientOriginalName();
                $Pengguna->save;
             }
        
        Alert::success('Sukses', 'Data Berhasil Dirubah');
        return redirect()->route('Daftaruser.index');
    }
    