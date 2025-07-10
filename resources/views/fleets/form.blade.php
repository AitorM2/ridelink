<div class="form-container-div">
    <div class="form-container-input">
        {{ html()->label('Nombre del vehículo', 'car_name')->class('form-label form-required') }}
        {{ html()->text('car_name', old('car_name', $fleet->car_name ?? ''))->required()->class('form-input') }}
        @error('car_name')
            <p class="form-error-msg">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-container-input">
        {{ html()->label('Modelo', 'car_model')->class('form-label form-required') }}
        {{ html()->text('car_model', old('car_model', $fleet->car_model ?? ''))->required()->class('form-input') }}
        @error('car_model')
            <p class="form-error-msg">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="form-container-div">
    <div class="form-container-input">
        {{ html()->label('Matrícula', 'car_plate')->class('form-label form-required') }}
        {{ html()->text('car_plate', old('car_plate', $fleet->car_plate ?? ''))->required()->class('form-input') }}
        @error('car_plate')
            <p class="form-error-msg">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-container-input">
        {{ html()->label('Color', 'car_color')->class('form-label') }}
        {{ html()->text('car_color', old('car_color', $fleet->car_color ?? ''))->class('form-input') }}
        @error('car_color')
            <p class="form-error-msg">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="form-container-div">
    <div class="form-container-input">
        {{ html()->label('VIN', 'car_vin')->class('form-label') }}
        {{ html()->text('car_vin', old('car_vin', $fleet->car_vin ?? ''))->class('form-input') }}
        @error('car_vin')
            <p class="form-error-msg">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-container-input">
        {{ html()->label('Imagen del vehículo', 'car_image')->class('form-label') }}
        {{ html()->file('car_image')->accept('image/*')->class('form-input') }}
        @error('car_image')
            <p class="form-error-msg">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="form-container-div">
    <div class="form-container-input">
        {{ html()->label('Kilómetros', 'kilometers')->class('form-label') }}
        {{ html()->number('kilometers', old('kilometers', $fleet->kilometers ?? ''))->class('form-input')->attribute('min', 0) }}
        @error('kilometers')
            <p class="form-error-msg">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-container-input">
        {{ html()->label('Compañía', 'company_id')->class('form-label form-required') }}
        {{ html()->select('company_id', ['' => 'Selecciona una empresa'] + $companies->toArray())
    ->id('company_id')
    ->class('form-input')
    ->value(old('company_id', $fleet->company_id ?? '')) }}
        @error('company_id')
            <p class="form-error-msg">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="form-container-btn">
    <button class="form-btn group group-hover:from-green-700 group-hover:to-black">
        <span class="form-btn-text">
            {{ $btnform ?? 'Guardar' }}
        </span>
    </button>
</div>