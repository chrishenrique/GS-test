@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Vendedores Apagados</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('salesman.index') }}">Vendedores</a></li>
                    <li class="breadcrumb-item active">Vendedores Apagados</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content" id="salesman">
    <div class="container-fluid">
        @include('layouts._alerts')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('salesman.index') }}">
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
                            <tbody id="salesmans-list">
                                @foreach($salesman as $man)
                                <tr>
                                    <td>{{ $man->id }}</td>
                                    <td>{{ $man->name }}</td>
                                    <td>{{ $man->deleted_at->format('d/m/Y') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @include('layouts._without_items', ['items' => $salesman])
                {{ $salesman->links('vendor.pagination.simple-default') }}
            </div>
        </div>
    </div>
</section>
@endsection
