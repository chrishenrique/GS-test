<div class="row">
    <div class="col-md-8">
        <div class="form-group">
            <label class="required" for="client_id">Cliente:</label>
            <select id="client_id" class="select2 form-control {{ $errors->has('client_id') ? 'is-invalid' : '' }}" name="client_id">
                <option value="">[ Selecione ]</option>
                @foreach ($clients as $client)
                <option value="{{ $client->id }}" @if($sale->client == $client->id)selected="selected"@endif>
                    {{ $client->name }}
                </option>
                @endforeach
            </select>  
            @include('layouts._field_error', array('field'=>'client_id'))
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="required" for="salesman_id">Vendedor:</label>
            <select id="salesman_id" class="select2 form-control {{ $errors->has('salesman_id') ? 'is-invalid' : '' }}" name="salesman_id">
                <option value="">[ Selecione ]</option>
                @foreach ($salesman as $man)
                <option value="{{ $man->id }}" @if($sale->salesman_id == $man->id)selected="selected"@endif>
                    {{ $man->name }}
                </option>
                @endforeach
            </select>  
            @include('layouts._field_error', array('field'=>'salesman_id'))
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label class="required" for="unit_id">Unidade:</label>
            <select id="unit_id" class="select2 form-control {{ $errors->has('unit_id') ? 'is-invalid' : '' }}" name="unit_id">
                <option value="">[ Selecione ]</option>
                @foreach ($units as $unit)
                <option value="{{ $unit->id }}" @if($sale->unit_id == $unit->id)selected="selected"@endif>
                    [{{ $unit->unit_number }}] {{ $unit->name }} - {{ $unit->enterprise->name }}
                </option>
                @endforeach
            </select> 
            @include('layouts._field_error', array('field'=>'unit_id'))
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label class="required" for="total_discounts">Valor de descontos gerais:</label>
            <input autocomplete="off" id="total_discounts" type="text" class="form-control {{ $errors->has('total_discounts') ? 'is-invalid' : '' }}" name="total_discounts" value="{{ old('total_discounts', $sale->total_discounts) }}"> 
            @include('layouts._field_error', array('field'=>'total_discounts'))
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="required" for="sold_by">Valor final da venda:</label>
            <input autocomplete="off" id="sold_by" type="text" class="form-control {{ $errors->has('sold_by') ? 'is-invalid' : '' }}" name="sold_by" value="{{ old('sold_by', $sale->sold_by) }}" readonly> 
            @include('layouts._field_error', array('field'=>'sold_by'))
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label class="required" for="status">Status:</label>
            <select class="select2 form-control" name="status" id="status" required>
                <option value="">[ Selecione ]</option>
                @foreach ($status as $key => $value)
                <option value="{{ $key }}" @if($sale->status == $key) selected="selected" @endif>
                    {{ $value }}
                </option>
                @endforeach
            </select>
            @include('layouts._field_error', array('field'=>'status'))
        </div>
    </div>
</div>