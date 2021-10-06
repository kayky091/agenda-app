<?php

namespace App\Http\Controllers;



use App\Models\Contato;
use App\Http\Requests\ContatosRequest;
use Illuminate\Support\Facades\Redirect;
use PDF;


class ContatosController extends Controller
{

    public function index()
    {
        $search = request('search');

        if ($search) {


            $contato = Contato::where('nome', 'LIKE', '%' . $search . '%')->get();
            return view('contatos.index', compact(['contato', 'search']));
        }

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

        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName());
            $requestImage->move(public_path('img/fotos'), $imageName);
            $contato->photo_path = $imageName;
        }

        $contato->save();

        return redirect()->back()->with('success', 'dados cadastrados com sucesso !');
    }


    public function show($id)
    {
        $contato = Contato::find($id);
        return view('contatos.show', compact('contato'));
    }

    public function edit($id)
    {
        $contato = Contato::find($id);
        return view('contatos.edit', compact('contato'));
    }


    public function update(ContatosRequest $request, $id)
    {
        $contato = Contato::find($id);
        if (isset($contato)) {

            $contato->nome =  $request->input('nome');
            $contato->sobrenome =  $request->input('sobrenome');
            $contato->email =  $request->input('email');
            $contato->telefone = $request->input('telefone');

            if ($request->hasFile('image') && $request->file('image')->isValid()) {

                $requestImage = $request->image;
                $extension = $requestImage->extension();
                $imageName = md5($requestImage->getClientOriginalName());
                $requestImage->move(public_path('img/fotos'), $imageName);
                $contato->photo_path = $imageName;
            }

            $contato->save();
        }
        return Redirect::route('contatos.index')->with('edits', 'dados editados com sucesso !');
    }


    public function destroy($id)
    {
        $contato = Contato::find($id);
        $contato->delete();

        return  redirect()->back()->with('delete', 'dados deletados com sucesso !');
    }

    public function gerarPDF()
    {


        $contato = Contato::all();
        $pdf = PDF::loadView('contatos.pdf', compact('contato'));
        return $pdf->setPaper('a4')->download('lista-contatos.pdf');
    }
}
