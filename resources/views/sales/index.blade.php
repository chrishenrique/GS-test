@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Vendas</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Vendas</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content" id="sales">
    <div class="container-fluid">
        @include('layouts._alerts')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('sales.create') }}">
                            <i aria-hidden="true" class="fa fa-user"></i>
                            Nova Venda
                        </a>
                        <a href="{{ route('sales.trash') }}" class=" float-right">
                            <i aria-hidden="true" class="fa fa-trash"></i>
                        </a>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Unidade</th>
                                    <th>Status</th>
                                    <th>Vendida em</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="sales-list">
                                @foreach($sales as $sale)
                                <tr>
                                    <td>{{ $sale->id }}</td>
                                    <td>{{ $sale->unit_id }}</td>
                                    <td>{{ $sale->status }}</td>
                                    <td>{{ $sale->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <a href="{{ route('sales.edit', $sale) }}" class="float-right">Editar</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @include('layouts._without_items', ['items' => $sales])
                {{ $sales->links('vendor.pagination.simple-default') }}
            </div>
        </div>
    </div>
</section>
@endsection
