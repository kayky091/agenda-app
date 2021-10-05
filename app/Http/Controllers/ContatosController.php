<?php

namespace App\Http\Controllers;



use App\Models\Contato;
use App\Http\Requests\ContatosRequest;

class ContatosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contato = Contato::all();
        return view('contatos.index', compact('contato'));
    }


    public function store(ContatosRequest $request)
    {
        $contato = new contato();
        $contato->nome =  $request->input('nome');
        $contato->sobrenome =  $request->input('sobrenome');
        $contato->telefone =  $request->input('telefone');
        $contato->email =  $request->input('email');

        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName());
            $requestImage->move(public_path('img/fotos'), $imageName);
            $contato->photo_path = $imageName;

        }

        $contato->save();

        return redirect()->back()->with('success' , 'dados cadastrados com sucesso !');
    }

   
    public function show($id)
    {
        //
    }

   
  

    
    public function update(ContatosRequest $request, $id)
    {
           $contato = Contato::find($id);
              if(isset($contato)){  
    
                $contato->nome =  $request->input('nome');
                $contato->sobrenome =  $request->input('sobrenome');
                $contato->email =  $request->input('email');
                $contato->telefone = $request->input('telefone');

                if($request->hasFile('image') && $request->file('image')->isValid()){

                    $requestImage = $request->image;
                    $extension = $requestImage->extension();
                    $imageName = md5($requestImage->getClientOriginalName());
                    $requestImage->move(public_path('img/fotos'), $imageName);
                    $contato->photo_path = $imageName;
        
                }

                $contato->save();
            } 
            return  redirect()->back()->with('edits' , 'dados editados com sucesso !');
        
    }

    
    public function destroy($id)
    {
        //
    }
}
