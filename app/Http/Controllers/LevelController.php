<?
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;

class LevelController extends Controller
{
    public function index()
    {
        $level = Level::all();
        return view('level.index', compact('level'));
    }

    public function edit($id)
    {
        $level = Level::find($id);
        // $tarifs = Tarif::all();
        return view('level.edit', compact('level'));
    }
    public function update(Request $request, $id)
    {
        // dd($request);
        $level = Level::find($id);
        // $tarif = Tarif::findOrFail("id_tarif", $id );

        $level->update([
            'id'=>$id,
            'nama_level' => $request->nama_level,
        ]);
        return redirect('/level');
    }

    public function delete(Request $request, $id)
{
    $level = Level::find($id);

    if ($level) {
        $level->delete();
    }

    return redirect('/level');
}
}