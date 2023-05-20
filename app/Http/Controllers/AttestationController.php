<?php

namespace App\Http\Controllers;

use App\Models\Attestation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class AttestationController extends Controller
{
    //create attestation
    public function createAttestation(Request $request)
    {
        //validate request
        $request->validate([
            'type_attestation' => 'required',
        ]);

        $attestation = Attestation::create(
            [
                'user_id' => Auth::id(),
                'date_demande' => Carbon::now(),
                'type_attestation' => $request->type_attestation,
            ]
        );

        return redirect()->back();
    }

    //get attestations by student
    public function getAttestationByStudent()
    {
        $attestations = Attestation::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(10);

        // return to view
        return view('attestations.demandes', ['attestations' => $attestations]);
    }

    //download attestation
    public function downloadAttestation($id)
    {
        $attestation = Attestation::with('student')->find($id);
        if ($attestation->type_attestation == 'att_scolarite') {
            $html = '
            <h2 style="text-align: center;">Attestation de Scolarité</h2>
            <br>
            <p>Je soussigné(e),</p>
            <p>Nom : Votre nom</p>
            <p>Classe : Votre classe</p>
            <p>Année scolaire : Votre année scolaire</p>
            <br>
            <p>Déclare que l\'élève susnommé(e) est régulièrement inscrit(e) dans notre établissement.</p>
            <p>Fait à Date et lieu</p>
            <br>
            <p>Signature</p>';
        }

        $pdf = new PDF();

        PDF::SetTitle('Hello World');
        PDF::AddPage();
        PDF::writeHTML($html, true, false, true, false, '');

        PDF::Output('hello_world.pdf');
        return response()->download(public_path($filename));
        dd('tst');

    }

    //get all attestation
    public function getAllAttestation()
    {
        $attestation = Attestation::all();
        return response()->json($attestation);
    }

    //get attestation by id

    public function getAttestationById($id)
    {
        $attestation = Attestation::with('student')->find($id);
        return response()->json($attestation);
    }

    // validate attestation
    public function validateAttestation(Request $request, $id)
    {
        $attestation = Attestation::find($id);
        $attestation->validation = $request->validation;
        $attestation->save();
        return response()->json($attestation);
    }
}
