@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Unidades disponiveis</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Relatório</li>
                    <li class="breadcrumb-item active">Unidades disponiveis</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content" class="invoice">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <form action="{{ route('reports.units') }}" method="GET">
                            <div class="row invoice-info">
                                <div class="col-md-12 invoice-col">
                                    <div class="form-group">
                                        <label for="status">Empreendimento:</label>
                                        <select class="select2 form-control" name="enterprise_id" id="enterprise_id">
                                            <option value="">[ Selecione ]</option>
                                            @foreach($enterprises as $ent)
                                            <option value="{{ $ent->id }}" @if($ent->id == $enterpriseId) selected @endif>{{ $ent->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-info pull-left">
                                        <i class="fa fa-filter"></i> Filtrar
                                    </button>
                                    <a href="{{ route('reports.units') }}" class="btn btn-default pull-left">
                                        <i class="fa fa-times"></i> Limpar
                                    </a>
                                </div>
                            </div>
                        </form>
                        <br>
                        <div class="row">
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>{{ $units->count() }}</h3>
                                        <p>Total de unidades</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-building"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>{{ $totalSold }}</h3>
                                        <p>Unidades vendidas</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-dollar-sign"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>{{ $totalAvailable }}</h3>
                                        <p>Unidades disponiveis</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-cart-arrow-down"></i>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Vendida</th>
                                    <th>Numero da unidade</th>
                                    <th>Unidade / Empreend.</th>
                                    <th>Area total</th>
                                    <th>Cobertura</th>
                                    <th>Valor de venda</th>
                                    <th>Valor avaliado pelo banco</th>
                                    <th>Cadastrado em</th>
                                </tr>
                            </thead>
                            <tbody id="sales-list">
                                @foreach($units as $unit)
                                <tr>
                                    <td>
                                    @if($unit->sale)
                                    <small class="badge pull-left bg-green">Sim</small>
                                    @else
                                    <small class="badge pull-left bg-danger">Não</small>
                                    @endif
                                    </td>
                                    <td>[{{ $unit->unit_number }}]</td>
                                    <td>{{ $unit->name }} - {{ $unit->enterprise->name }}</td>
                                    <td>{{ $unit->total_area }}m</td>
                                    <td>
                                    @if($unit->has_roof)
                                    <small class="badge pull-left bg-green">Sim</small>
                                    @else
                                    <small class="badge pull-left bg-danger">Não</small>
                                    @endif
                                    </td>
                                    <td>{{ Number::currency() }} {{ Number::toMoneyApp($unit->sale_value) }}</td>
                                    <td>{{ Number::currency() }} {{ Number::toMoneyApp($unit->bank_appraisal_value) }}</td>
                                    <td>{{ $unit->created_at->format('d/m/Y') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @include('layouts._without_items', ['items' => $units])
                {{ $units->links('vendor.pagination.simple-default') }}
            </div>
        </div>
    </div>
</section>
@endsection