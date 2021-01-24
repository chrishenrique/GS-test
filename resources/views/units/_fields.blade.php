<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label class="required" for="enterprise_id">Empreendimento:</label>
            <select id="enterprises-search" class="select2 form-control {{ $errors->has('enterprise_id') ? 'is-invalid' : '' }}" name="enterprise_id">
                <option value="">[ Selecione ]</option>
                @foreach ($enterprises as $ent)
                <option value="{{ $ent->id }}" @if($unit->enterprise_id == $ent->id)selected="selected"@endif>
                    {{ $ent->name }}
                </option>
                @endforeach
            </select> 
            @include('layouts._field_error', array('field'=>'enterprise_id'))
        </div>
    </div>
</div>
<div class="row">
    <div class="col-8">
        <div class="form-group">
            <label class="required" for="name">Nome:</label>
            <input autocomplete="off" id="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" value="{{ old('name', $unit->name) }}"> 
            @include('layouts._field_error', array('field'=>'name'))
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="required" for="unit_number">Numero da unidade:</label>
            <input autocomplete="off" id="unit_number" type="text" class="form-control {{ $errors->has('unit_number') ? 'is-invalid' : '' }}" name="unit_number" value="{{ old('unit_number', $unit->unit_number) }}"> 
            @include('layouts._field_error', array('field'=>'unit_number'))
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label class="required" for="total_area">Área total:</label>
            <input autocomplete="off" id="total_area" type="text" class="form-control {{ $errors->has('total_area') ? 'is-invalid' : '' }}" name="total_area" value="{{ old('total_area', $unit->total_area) }}"> 
            @include('layouts._field_error', array('field'=>'total_area'))
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="required" for="private_area">Área privativa:</label>
            <input autocomplete="off" id="private_area" type="text" class="form-control {{ $errors->has('private_area') ? 'is-invalid' : '' }}" name="private_area" value="{{ old('private_area', $unit->private_area) }}"> 
            @include('layouts._field_error', array('field'=>'private_area'))
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="required" for="roof_area">Área coberta:</label>
            <input autocomplete="off" id="roof_area" type="text" class="form-control {{ $errors->has('roof_area') ? 'is-invalid' : '' }}" name="roof_area" value="{{ old('roof_area', $unit->roof_area) }}"> 
            @include('layouts._field_error', array('field'=>'roof_area'))
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <div class="custom-control custom-switch">
                <input type="hidden" name="active" value="0">
                <input type="checkbox" class="custom-control-input" id="has_roof" name="has_roof" value="1" {{ old( 'has_roof', $unit->has_roof) ? 'checked' : '' }}>
                <label class="custom-control-label" for="has_roof">Tem area de cobertura?</label>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="required" for="sale_value">Valor de venda:</label>
            <input autocomplete="off" id="sale_value" type="text" class="form-control {{ $errors->has('sale_value') ? 'is-invalid' : '' }}" name="sale_value" value="{{ old('sale_value', $unit->sale_value) }}"> 
            @include('layouts._field_error', array('field'=>'sale_value'))
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="required" for="bank_appraisal_value">Valor avaliado pelo banco:</label>
            <input autocomplete="off" id="bank_appraisal_value" type="text" class="form-control {{ $errors->has('bank_appraisal_value') ? 'is-invalid' : '' }}" name="bank_appraisal_value" value="{{ old('bank_appraisal_value', $unit->bank_appraisal_value) }}"> 
            @include('layouts._field_error', array('field'=>'bank_appraisal_value'))
        </div>
    </div>

</div>