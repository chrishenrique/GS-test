@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Vendedores</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('salesman.index') }}">Vendedores</a></li>
                    <li class="breadcrumb-item active">Editar Vendedor</li>
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
                <form role="form" method="POST" action="{{ route('salesman.update', $salesman) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('salesman._fields')
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            Salvar
                        </button>
                        <a href="{{ route('salesman.index') }}" class="btn btn-link">
                            Cancelar
                        </a>
                        <button type="button" class="btn btn-outline-danger float-right"
                            onclick="if (confirm('Deseja realmente apagar?')) document.getElementById('destroy-form').submit();">
                            <i aria-hidden="true" class="fa fa-trash color-red"></i>
                        </button>
                    </div>
                </form>
                <form id="destroy-form" action="{{ route('salesman.destroy', $salesman) }}" method="POST"
                    style="display: none;">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
