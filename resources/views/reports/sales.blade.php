@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Relatórios</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Relatório</li>
                    <li class="breadcrumb-item active">Vendas</li>
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
                        <form action="{{ route('reports.sales') }}" method="GET">
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    <div class="form-group">
                                        <label for="begin_at">Inicio:</label>
                                        <input autocomplete="off" id="begin_at" type="date" class="form-control" name="begin_at" value="{{ $beginAt }}" autofocus>
                                    </div>
                                </div>
                                <div class="col-sm-4 invoice-col">
                                    <div class="form-group">
                                        <label for="end_at">Fim:</label>
                                        <input autocomplete="off" id="end_at" type="date" class="form-control" name="end_at" value="{{ $endAt }}" autofocus>
                                    </div>
                                </div>
                                <div class="col-sm-4 invoice-col">
                                </div>
                            </div>
                            <div class="row invoice-info">
                                <div class="col-md-4 invoice-col">
                                    <div class="form-group">
                                        <label for="status">Vendedor:</label>
                                        <select class="select2 form-control" name="salesman_id" id="salesman_id">
                                            <option value="">[ Selecione ]</option>
                                            @foreach($salesman as $man)
                                            <option value="{{ $man->id }}" @if($man->id == $salesmanId) selected @endif>{{ $man->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 invoice-col">
                                    <div class="form-group">
                                        <label for="status">Cliente:</label>
                                        <select class="select2 form-control" name="client_id" id="client_id">
                                            <option value="">[ Selecione ]</option>
                                            @foreach($clients as $client)
                                            <option value="{{ $client->id }}" @if($client->id == $clientId) selected @endif>{{ $client->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 invoice-col">
                                    <div class="form-group">
                                        <label for="status">Status:</label>
                                        <select class="select2 form-control" name="status" id="status">
                                            <option value="">[ Selecione ]</option>
                                            @foreach($statuses as $key => $value)
                                            <option value="{{ $key }}" @if($key == $status) selected @endif>{{ $value }}</option>
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
                                    <a href="{{ route('reports.sales') }}" class="btn btn-default pull-left">
                                        <i class="fa fa-times"></i> Limpar
                                    </a>
                                </div>
                            </div>
                        </form>
                        <br>
                        <div class="row">
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>{{ $totalDone }}</h3>
                                        <p>Total Concluidas</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-check"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>{{ $totalPending }}</h3>
                                        <p>Total Pendentes</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-hand-paper"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3>{{ $totalNegotiation }}</h3>
                                        <p>Total em Negociacao</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-hourglass-half"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3>{{ $totalLost }}</h3>
                                        <p>Total Perdidas</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-times"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Status</th>
                                    <th>Cliente</th>
                                    <th>Vendedor</th>
                                    <th>Unidade / Empreend.</th>
                                    <th>Valor final</th>
                                    <th>Valor de descontos</th>
                                    <th>Data da venda</th>
                                    
                                </tr>
                            </thead>
                            <tbody id="sales-list">
                                @foreach($sales as $sale)
                                <tr>
                                    <td>
                                    @if($sale->status == 1)
                                    <small class="badge pull-left bg-green">{{ $sale->getStatusName() }}</small>
                                    @elseif($sale->status == 2)
                                    <small class="badge pull-left bg-yellow">{{ $sale->getStatusName() }}</small>
                                    @elseif($sale->status == 3)
                                    <small class="badge pull-left bg-info">{{ $sale->getStatusName() }}</small>
                                    @else
                                    <small class="badge pull-left bg-red">{{ $sale->getStatusName() }}</small>
                                    @endif
                                    </td>
                                    <td>{{ $sale->client->name }}</td>
                                    <td>{{ $sale->salesman->name }}</td>
                                    <td>{{ $sale->unit->name }} - {{ $sale->unit->enterprise->name }}</td>
                                    <td>{{ Number::currency() }} {{ Number::toMoneyApp($sale->sold_by) }}</td>
                                    <td>{{ Number::currency() }} {{ Number::toMoneyApp($sale->total_discounts) }}</td>
                                    <td>{{ $sale->created_at->format('d/m/Y') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @include('layouts._without_items', ['items' => $sales])
                {{ $sales->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
</section>
@endsection