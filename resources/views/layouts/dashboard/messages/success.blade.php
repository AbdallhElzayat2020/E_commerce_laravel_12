@if($errors->has('success'))
    <div class="col-md-12 col-sm-12">
        <button type="button" class="btn btn-lg btn-block btn-danger mb-2" id="type-success">
            {{$errors->first('success')}}
        </button>
    </div>
@endif