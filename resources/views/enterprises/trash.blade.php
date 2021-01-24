@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Empreendimentos Apagados</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('enterprises.index') }}">Empreendimentos</a></li>
                    <li class="breadcrumb-item active">Empreendimentos Apagados</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content" id="enterprises">
    <div class="container-fluid">
        @include('layouts._alerts')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('enterprises.index') }}">
                            <i aria-hidden="true" class="fa fa-caret-left"></i>
                            Voltar
                        </a>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Apagado em</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="enterprisess-list">
                                @foreach($enterprises as $enterprise)
                                <tr>
                                    <td>{{ $enterprise->id }}</td>
                                    <td>{{ $enterprise->name }}</td>
                                    <td>{{ $enterprise->deleted_at->format('d/m/Y') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @include('layouts._without_items', ['items' => $enterprises])
                {{ $enterprises->links('vendor.pagination.simple-default') }}
            </div>
        </div>
    </div>
</section>
@endsection
