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
                    <li class="breadcrumb-item"><a href="{{ route('sales.index') }}">Vendas</a></li>
                    <li class="breadcrumb-item active">Nova Venda</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        @include('layouts._alerts')
        <div class="card">
            <div class="card-body">
                <form role="form" method="POST" action="{{ route('sales.store', $sale) }}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    @include('sales._fields')
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            Salvar
                        </button>
                        <a href="{{ route('sales.index') }}" class="btn btn-link">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
