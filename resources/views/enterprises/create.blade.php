@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Empreendimentos</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('enterprises.index') }}">Empreendimentos</a></li>
                    <li class="breadcrumb-item active">Novo Empreendimento</li>
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
                <form role="form" method="POST" action="{{ route('enterprises.store', $enterprise) }}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    @include('enterprises._fields')
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            Salvar
                        </button>
                        <a href="{{ route('enterprises.index') }}" class="btn btn-link">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
