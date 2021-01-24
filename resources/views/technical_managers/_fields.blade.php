<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label class="required" for="name">Nome:</label>
            <input autocomplete="off" id="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" value="{{ old('name', $technicalManager->name) }}" required autofocus> 
            @include('layouts._field_error', array('field'=>'name'))
        </div>
    </div>
</div>
