<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;

class ApiController extends Controller
{
    public function update(Request $request, $id)
    {
    	$siswa = Siswa::find($id);
    	$siswa->mapel()->updateExistingPivot($request->pk, ['nilai' => $request->value]);
    }
}
