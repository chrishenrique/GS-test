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
                    <li class="breadcrumb-item active">Empreendimentos</li>
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
                        <a href="{{ route('enterprises.create') }}">
                            <i aria-hidden="true" class="fa fa-user"></i>
                            Novo Empreendimento
                        </a>
                        <a href="{{ route('enterprises.trash') }}" class=" float-right">
                            <i aria-hidden="true" class="fa fa-trash"></i>
                        </a>
                    </div>
                    <div class="card-header">
                        <a href="{{ route('enterprises.index') }}" class="btn btn-default">
                            Todos
                        </a>
                        @foreach (range('A', 'Z') as $letter)
                        <a href="{{ route('enterprises.index', ['first' => $letter]) }}" class="btn btn-{{$first == $letter ? 'primary' : 'default'}}">
                            {{$letter}}
                        </a>
                        @endforeach 
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mt-2">
                                    <form action="{{ route('enterprises.index', ['first' => $letter]) }}" method="get" class="">
                                        <div class="input-group input-group-sm">
                                            <input type="text" name="term" class="form-control float-right" placeholder="Buscar">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-primary btn-flat"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>                
                                    </form>      
                                </div> 
                            </div>
                        </div>

                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Criado em</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="enterprises-list">
                                @foreach($enterprises as $enterprise)
                                <tr>
                                    <td>{{ $enterprise->id }}</td>
                                    <td>{{ $enterprise->name }}</td>
                                    <td>{{ $enterprise->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <a href="{{ route('enterprises.edit', $enterprise) }}" class="float-right">Editar</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @include('layouts._without_items', ['items' => $enterprises])
                {{ $enterprises->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
</section>
@endsection
