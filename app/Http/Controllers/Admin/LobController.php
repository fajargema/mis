<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lob;
use Exception;
use Illuminate\Http\Request;

class LobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Lob::get();

        return view('pages.admin.klaim.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.klaim.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string',
            'client' => 'required|string',
            'reason' => 'required|string',
            'burden' => 'required|string',
            'date' => 'required|date',
        ]);
        try {
            $data = $request->all();
            $save = Lob::create($data);

            activity()
                ->causedBy(auth()->user())
                ->performedOn($save)
                ->log('Menambahkan klaim baru');

            return redirect()->route('dashboard.klaim.index')->with('success', 'Klaim berhasil ditambahkan!!');
        } catch (Exception $e) {
            return redirect()->route('dashboard.klaim.index')->with('error', 'Klaim Gagal ditambahkan!!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Lob::findOrFail($id);

        return view('pages.admin.klaim.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'type' => 'required|string',
            'client' => 'required|string',
            'reason' => 'required|string',
            'burden' => 'required|string',
        ]);
        try {
            $klaim = Lob::findOrFail($id);

            $data = $request->all();
            $data['user_id'] = auth()->id();

            $klaim->update($data);

            activity()
                ->causedBy(auth()->user())
                ->performedOn($klaim)
                ->log('Mengubah data klaim ' . $klaim->client);
            return redirect()->route('dashboard.klaim.index')->with('success', 'Klaim berhasil diupdate!!');
        } catch (Exception $e) {
            return redirect()->route('dashboard.klaim.index')->with('error', 'Klaim Gagal diupdate!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $klaim = Lob::findOrFail($id);

            $klaim->delete();

            return redirect()->route('admin.klaim.index')->with('success', 'Klaim berhasil dihapus!!');
        } catch (Exception $e) {
            return redirect()->route('admin.klaim.index')->with('error', 'Klaim Gagal dihapus!!');
        }
    }

    public function lob()
    {
        $data = [];

        $types = ['KBG dan Suretyship', 'Konsumtif', 'KUR', 'PEN', 'Produktif'];
        $reasons = ['Macet', 'Kebakaran', 'Meninggal', 'PHK'];

        foreach ($types as $type) {
            $data[$type]['title'] = $type;
            foreach ($reasons as $reason) {
                $count = Lob::where('type', $type)->where('reason', $reason)->count();
                $beban = Lob::where('type', $type)->where('reason', $reason)->sum('burden');

                $data[$type]['reason'][$reason]['title'] = $reason;
                $data[$type]['reason'][$reason]['count'] = $count;
                $data[$type]['reason'][$reason]['beban'] = $beban;

                $data[$type]['subtotal_nasabah'] = ($data[$type]['subtotal_nasabah'] ?? 0) + $count;
                $data[$type]['subtotal_beban'] = ($data[$type]['subtotal_beban'] ?? 0) + $beban;
            }
        }

        $total_nasabah = Lob::count();
        $total_beban = Lob::sum('burden');

        return view('pages.admin.lob.index', compact('data', 'total_nasabah', 'total_beban'));
    }
}
