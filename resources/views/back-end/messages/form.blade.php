{{ csrf_field() }}
<div class="row">
 @php
     $input = "name";
 @endphp
    <div class="col-md-6">
        <div class="form-group">
            <label class="bmd-label-floating">Sender Name</label>
            <input type="text" name="{{ $input }}" value="{{ isset($row) ? $row->{$input} : '' }}"
            class="form-control @error($input) is-invalid @enderror">
         @error($input)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
    </div>
    @php
     $input = "email";
    @endphp
    <div class="col-md-6">
        <div class="form-group">
            <label class="bmd-label-floating">Sender E-mail</label>
            <input type="email" name={{ $input }} value="{{ isset($row) ? $row->{ $input } : '' }}"
            class="form-control @error($input) is-invalid @enderror">
         @error($input)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
    </div>

    @php
     $input = "message";
    @endphp
    <div class="col-md-12">
        <div class="form-group">
            <label class="bmd-label-floating">Message</label>
            <textarea name="{{ $input }}"  rows="5"
            class="form-control @error($input) is-invalid @enderror" >{{ isset($row) ? $row->{ $input } : '' }}</textarea>
        @error($input)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
    </div>

</div>
