<?php
namespace App\Http\Controllers;

use App\Models\Tipo_u;
use Illuminate\Http\Request;

class Tipo_uController extends Controller
{
    public function index()
    {
        $tipo_u = Tipo_u::paginate(10);
        return view('admin.tipo_u.index', compact('tipo_u'));
    }

    public function create()
    {
        return view('admin.tipo_u.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo_u' => 'required|unique:tipo_u|max:255',
        ]);

        Tipo_u::create($request->all());
        return redirect()->route('admin/tipo_u.index')->with('success', 'Tipo de usuario creado exitosamente.');
    }

    public function show(Tipo_u $tipo_u)
    {
        return view('admin.tipo_u.show', compact('tipo_u'));
    }

    public function edit(Tipo_u $tipo_u)
    {
        return view('admin.tipo_u.edit', compact('tipo_u'));
    }

    public function update(Request $request, Tipo_u $tipo_u)
    {
        $request->validate([
            'tipo_u' => 'required|unique:tipo_u,tipo_u,' . $tipo_u->id . '|max:255',
        ]);

        $tipo_u->update($request->all());
        return redirect()->route('admin/tipo_u.index')->with('success', 'Tipo de usuario actualizado exitosamente.');
    }

    public function destroy(Tipo_u $tipo_u)
    {
        $tipo_u->delete();
        return redirect()->route('admin/tipo_u.index')->with('success', 'Tipo de usuario eliminado exitosamente.');
    }
}
