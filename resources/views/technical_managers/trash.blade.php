@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Responsaveis Tecnicos Apagados</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('technical_managers.index') }}">Responsaveis Tecnicos</a></li>
                    <li class="breadcrumb-item active">Responsaveis Tecnicos Apagados</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content" id="technical_managers">
    <div class="container-fluid">
        @include('layouts._alerts')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('technical_managers.index') }}">
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
                            <tbody id="technical_managers-list">
                                @foreach($technicalManagers as $tec)
                                <tr>
                                    <td>{{ $tec->id }}</td>
                                    <td>{{ $tec->name }}</td>
                                    <td>{{ $tec->deleted_at->format('d/m/Y') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @include('layouts._without_items', ['items' => $technicalManagers])
                {{ $technicalManagers->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
</section>
@endsection
