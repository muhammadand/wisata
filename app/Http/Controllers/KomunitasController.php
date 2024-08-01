<?php
namespace App\Http\Controllers;

use App\Models\Komunitas;
use Illuminate\Http\Request;

class KomunitasController extends Controller
{
    public function index()
    {
        $komunitas = Komunitas::all();
        return view('komunitas.index', compact('komunitas'));
    }

    public function create()
    {
        return view('komunitas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_komunitas' => 'required',
            'foto' => 'required|image',
            'deskripsi' => 'required',
            'nama_ketua' => 'required',
        ]);

        $path = $request->file('foto')->store('images', 'public');

        $komunitas = new Komunitas([
            'nama_komunitas' => $request->get('nama_komunitas'),
            'foto' => $path,
            'deskripsi' => $request->get('deskripsi'),
            'nama_ketua' => $request->get('nama_ketua'),
        ]);

        $komunitas->save();

        return redirect()->route('komunitas.index')
            ->with('success', 'Komunitas created successfully.');
    }

    public function show($id)
    {
        $komunitas = Komunitas::find($id);
        return view('komunitas.show', compact('komunitas'));
    }

    public function edit($id)
    {
        $komunitas = Komunitas::find($id);
        return view('komunitas.edit', compact('komunitas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_komunitas' => 'required',
            'foto' => 'image',
            'deskripsi' => 'required',
            'nama_ketua' => 'required',
        ]);

        $komunitas = Komunitas::find($id);
        $komunitas->nama_komunitas = $request->get('nama_komunitas');
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('images', 'public');
            $komunitas->foto = $path;
        }
        $komunitas->deskripsi = $request->get('deskripsi');
        $komunitas->nama_ketua = $request->get('nama_ketua');
        $komunitas->save();

        return redirect()->route('komunitas.index')
            ->with('success', 'Komunitas updated successfully.');
    }

    public function destroy($id)
    {
        $komunitas = Komunitas::find($id);
        $komunitas->delete();

        return redirect()->route('komunitas.index')
            ->with('success', 'Komunitas deleted successfully.');
    }
}
