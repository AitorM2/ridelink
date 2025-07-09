<div class="form-container-div">
    <div class="form-container-input">
        {{ html()->label('Nombre de la empresa', 'name')->class('form-label form-required') }}
        {{ html()->text('name', old('name', $company->name ?? ''))->required()->class('form-input') }}
        @error('name')
            <p class="form-error-msg">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-container-input">
        {{ html()->label('Logo de la empresa', 'logo')->class('form-label') }}
        {{ html()->file('logo')->accept('image/*')->class('form-input') }}
        @error('logo')
            <p class="form-error-msg">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="form-container-div">
    <div class="form-container-input">
        {{ html()->label('Correo electrónico', 'email')->class('form-label') }}
        {{ html()->email('email', old('email', $company->email ?? ''))->class('form-input') }}
        @error('email')
            <p class="form-error-msg">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-container-input">
        {{ html()->label('Teléfono', 'phone')->class('form-label') }}
        {{ html()->text('phone', old('phone', $company->phone ?? ''))->class('form-input') }}
        @error('phone')
            <p class="form-error-msg">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="form-container-div">
    <div class="form-container-input">
        {{ html()->label('Descripción', 'description')->class('form-label') }}
        {{ html()->textarea('description', old('description', $company->description ?? ''))->class('form-input') }}
        @error('description')
            <p class="form-error-msg">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-container-input">
        {{ html()->label('Dirección', 'address')->class('form-label form-required') }}
        {{ html()->text('address', old('address', $company->address ?? ''))->required()->class('form-input') }}
        @error('address')
            <p class="form-error-msg">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="form-container-div">
    <div class="form-container-input">
        {{ html()->label('Ciudad', 'city')->class('form-label form-required') }}
        {{ html()->text('city', old('city', $company->city ?? ''))->required()->class('form-input') }}
        @error('city')
            <p class="form-error-msg">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-container-input">
        {{ html()->label('Provincia/Estado', 'state')->class('form-label form-required') }}
        {{ html()->text('state', old('state', $company->state ?? ''))->required()->class('form-input') }}
        @error('state')
            <p class="form-error-msg">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="form-container-div">
    <div class="form-container-input">
        {{ html()->label('Código Postal', 'postal_code')->class('form-label form-required') }}
        {{ html()->text('postal_code', old('postal_code', $company->postal_code ?? ''))->required()->class('form-input') }}
        @error('postal_code')
            <p class="form-error-msg">{{ $message }}</p>
        @enderror
    </div>
    <div class="form-container-input">
        {{ html()->label('País', 'country')->class('form-label form-required') }}
        {{ html()->text('country', old('country', $company->country ?? ''))->required()->class('form-input') }}
        @error('country')
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
