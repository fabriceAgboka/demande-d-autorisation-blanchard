@extends('layout.default')
@section('title', 'Tableau de bord')

@section('content')
    <p>
        <span class="tab-values">Salut Fabrice </span>
    </p>
    <div class="card">
        <div class="row p-3">
            <div class="col-md-3">
                <p>
                    <span class="tab-head">140</span>
                    <span class="tab-values">En attente</span>
                </p>
            </div>
            <div class="col-md-3">
                <p>
                    <span class="tab-head">300</span>
                    <span class="tab-values">Confirmer</span>
                </p>
            </div>
            <div class="col-md-3">
                <p>
                    <span class="tab-head">350</span>
                    <span class="tab-values">Valider</span>
                </p>
            </div>
            <div class="col-md-3">
                <p>
                    <span class="tab-head">40</span>
                    <span class="tab-values">Rejeter</span>
                </p>
            </div>
        </div>
    </div>
    <div class="row p-3">
        <div class="col-md-4">
            <div class="bg-white rounded shadow">
                <div style="height: 500px">
                    {!! $chart->container() !!}
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="bg-white rounded shadow">
                <div style="height: 500px" id="statistics-mois">
                    {!! $chart4->container() !!}
                </div>
                <div style="height: 500px" id="statistics-annee">
                    {!! $chart3->container() !!}
                </div>
            </div>
            <div class="mt-2 text-center">
                <button type="button" id="statistics-mois-btn" class="btn btn-success mr-8">Statistics semaine courante
                </button>
                <button type="button" id="statistics-annee-btn" class="btn btn-success"> Statistics année courante
                </button>
            </div>
        </div>
    </div>
@stop

@section('styles')
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .tab-head {
            color: #014612;
            font-size: 35px;
            font-weight: bolder
        }

        .tab-values {
            color: black;
            font-size: 15px;
            font-weight: 400
        }
    </style>
@endsection

@section('scripts')

    <script src="{{ $chart->cdn() }}"></script>

    {{ $chart->script() }}
    {{ $chart2->script() }}
    {{ $chart3->script() }}
    {{ $chart4->script() }}

    <script>
        $("#statistics-mois").show()
        $("#statistics-annee").hide()
        $('#statistics-mois-btn').click(function(e) {
            e.preventDefault();
            $("#statistics-mois").show()
            $("#statistics-annee").hide()
        });
        $('#statistics-annee-btn').click(function(e) {
            e.preventDefault();
            $("#statistics-mois").hide()
            $("#statistics-annee").show()
        });
    </script>
@endsection
