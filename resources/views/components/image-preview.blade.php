@if(isset($image) && $image)
    <div style="margin-top: 10px;">
        <img src="{{ asset($image) }}" style="max-width: 200px; max-height: 200px; border: 1px solid #eee; border-radius: 6px;" alt="Preview Image" />
    </div>
@endif 