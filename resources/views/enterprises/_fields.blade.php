<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label class="required" for="name">Nome:</label>
            <input autocomplete="off" id="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" value="{{ old('name', $enterprise->name) }}" required> 
            @include('layouts._field_error', array('field'=>'name'))
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="cep">CEP:</label>
            <input autocomplete="off" id="cep" type="text" class="form-control {{ $errors->has('cep') ? 'is-invalid' : '' }}" name="cep" value="{{ old('cep', $enterprise->cep) }}"> 
            @include('layouts._field_error', array('field'=>'cep'))
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="address">Endereco:</label>
            <input autocomplete="off" id="address" type="text" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" value="{{ old('address', $enterprise->address) }}"> 
            @include('layouts._field_error', array('field'=>'address'))
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="number">Numero:</label>
            <input autocomplete="off" id="number" type="text" class="form-control {{ $errors->has('number') ? 'is-invalid' : '' }}" name="number" value="{{ old('number', $enterprise->number) }}"> 
            @include('layouts._field_error', array('field'=>'number'))
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="neighborhood">Bairro:</label>
            <input autocomplete="off" id="neighborhood" type="text" class="form-control {{ $errors->has('neighborhood') ? 'is-invalid' : '' }}" name="neighborhood" value="{{ old('neighborhood', $enterprise->neighborhood) }}"> 
            @include('layouts._field_error', array('field'=>'neighborhood'))
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="state_code">Estado:</label>
            <input autocomplete="off" id="state_code" type="text" class="form-control {{ $errors->has('state_code') ? 'is-invalid' : '' }}" name="state_code" value="{{ old('state_code', $enterprise->state_code) }}"> 
            @include('layouts._field_error', array('field'=>'state_code'))
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="city_code">Cidade:</label>
            <input autocomplete="off" id="city_code" type="text" class="form-control {{ $errors->has('city_code') ? 'is-invalid' : '' }}" name="city_code" value="{{ old('city_code', $enterprise->city_code) }}"> 
            @include('layouts._field_error', array('field'=>'city_code'))
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="form-group">
            <label for="construction_value">Valor da obra:</label>
            <input autocomplete="off" id="construction_value" type="text" class="form-control {{ $errors->has('construction_value') ? 'is-invalid' : '' }}" name="construction_value" value="{{ old('construction_value', $enterprise->construction_value) }}"> 
            @include('layouts._field_error', array('field'=>'construction_value'))
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="begin_at">Data inicio:</label>
            <input autocomplete="off" id="begin_at" type="text" class="form-control {{ $errors->has('begin_at') ? 'is-invalid' : '' }}" name="begin_at" value="{{ old('begin_at', $enterprise->begin_at) }}"> 
            @include('layouts._field_error', array('field'=>'begin_at'))
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="technical_managers_id">Data fim:</label>
            <input autocomplete="off" id="end_at" type="text" class="form-control {{ $errors->has('end_at') ? 'is-invalid' : '' }}" name="end_at" value="{{ old('end_at', $enterprise->end_at) }}"> 
            @include('layouts._field_error', array('field'=>'end_at'))
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="technical_managers_id">Responsavel tecnico:</label>
            <input autocomplete="off" id="technical_managers_id" type="text" class="form-control {{ $errors->has('technical_managers_id') ? 'is-invalid' : '' }}" name="technical_managers_id" value="{{ old('technical_managers_id', $enterprise->technical_managers_id) }}"> 
            @include('layouts._field_error', array('field'=>'technical_managers_id'))
        </div>
    </div>
</div>