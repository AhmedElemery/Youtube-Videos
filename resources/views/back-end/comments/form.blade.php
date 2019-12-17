@php
     $input = "comment";
    @endphp
    <div class="col-md-6">
        <div class="form-group">
            <label class="bmd-label-floating">Your Comment</label>
            <textarea name="{{ $input }}"  rows="2"
            class="form-control @error($input) is-invalid @enderror" >{{ isset($row) ? $row->{ $input } : '' }}</textarea>
        @error($input)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
    </div>