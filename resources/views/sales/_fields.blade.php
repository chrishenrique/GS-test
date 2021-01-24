<div class="row">
    <div class="col-md-8">
        <div class="form-group">
            <label class="required" for="client_id">Cliente:</label>
            <input autocomplete="off" id="client_id" type="text" class="form-control {{ $errors->has('client_id') ? 'is-invalid' : '' }}" name="client_id" value="{{ old('client_id', $sale->client_id) }}"> 
            @include('layouts._field_error', array('field'=>'client_id'))
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="required" for="salesman_id">Vendedor:</label>
            <input autocomplete="off" id="salesman_id" type="text" class="form-control {{ $errors->has('salesman_id') ? 'is-invalid' : '' }}" name="salesman_id" value="{{ old('salesman_id', $sale->salesman_id) }}"> 
            @include('layouts._field_error', array('field'=>'salesman_id'))
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label class="required" for="unit_id">Unidade:</label>
            <input autocomplete="off" id="unit_id" type="text" class="form-control {{ $errors->has('unit_id') ? 'is-invalid' : '' }}" name="unit_id" value="{{ old('unit_id', $sale->unit_id) }}"> 
            @include('layouts._field_error', array('field'=>'unit_id'))
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label class="required" for="sold_by">Valor de descontos gerais:</label>
            <input autocomplete="off" id="sold_by" type="text" class="form-control {{ $errors->has('sold_by') ? 'is-invalid' : '' }}" name="sold_by" value="{{ old('sold_by', $sale->sold_by) }}"> 
            @include('layouts._field_error', array('field'=>'sold_by'))
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