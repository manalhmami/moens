@extends('layouts.app')

@section('content')
    <h2>Attestations</h2>
    <div class="container bg-white rounded-lg shadow mt-4 p-3">
        <form action="{{ route('attestation.create') }}" method="POSt">
            @csrf
            @method('POST')
            <div class="flex justify">
                <div class="form-group">
                    <label for="type_attestation">Type attestation :</label>
                    <select class="form-control" id="type_attestation" name="type_attestation">
                        <option value="att_scolarite">Attestation de scolarité</option>
                        <option value="att_stage">Attestation de stage</option>
                        <option value="att_reussite">Attestation de réussite</option>
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>

    <div class="container mt-4">
        <table class="table table-light table-striped">
            <caption class="bg-white text-center h5" style="caption-side: top;">Liste des demanades</caption>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date de demande</th>
                    <th scope="col">Type de d'attestation</th>
                    <th scope="col">validation</th>
                    <th scope="col">Técharger</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attestations as $index => $attestation)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $attestation->date_demande }}</td>
                        <td>
                            @if ($attestation->type_attestation == 'att_scolarite')
                                <span class="badge bg-primary ">Attestation de scolarité</span>
                            @elseif($attestation->type_attestation == 'att_stage')
                                <span class="badge bg-secondary"> Attestation de stage</span>
                            @elseif($attestation->type_attestation == 'att_reussite')
                                <span class="badge bg-secondary">Attestation de réussite</span>
                            @endif
                        </td>
                        <td>
                            @if ($attestation->validation == 0)
                                <span class="badge bg-danger">En attente</span>
                            @elseif($attestation->validation == 1)
                                <span class="badge bg-success">Validé</span>
                            @endif
                        </td>
                        <td>
                            @if ($attestation->validation == 1)
                                <form action="{{ route('attestation.download', $attestation->id) }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="btn btn-sm btn-outline-info ">Télécharger</button>
                                </form>
                            @endif

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <div class="d-flex justify-content-center">

            {{ $attestations->links() }}
        </div>
    </div>
@endsection
