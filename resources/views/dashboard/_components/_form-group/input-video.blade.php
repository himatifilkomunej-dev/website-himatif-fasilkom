<div class="mb-3 form-group">
    <label for="">
        {{ $inputLabel }}
        @if(isset($inputIsRequired) && $inputIsRequired === true) 
            <span class="text-muted text-secondary">(harus diisi)</span> 
        @endif
    </label>

    <div class="custom-file">
        <input
            type="file"
            name="{{ $inputName }}"
            id="{{ $inputId }}" 
            onchange="openVideoFile(event, '#{{ $inputPreviewIdentity }}')"
            accept="video/mp4,video/quicktime,.mov,.mp4"
            @if(isset($inputIsRequired) && $inputIsRequired === true) required @endif
            @if(isset($inputIsDisabled) && $inputIsDisabled === true) disabled @endif
            class="custom-file-input @error($inputName) is-invalid @enderror">
        <label class="custom-file-label" for="{{ $inputName }}">Pilih video</label>

        @error($inputName)
        <div class="pt-2 text-invalid">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
