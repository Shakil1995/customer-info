@extends('layouts.app')

@section('title', 'Create Customer')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-12 w-75">

        <div class="row justify-content-center g-0">
            <div class="col-12 text-end">
                <a href="{{ route('customers.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>

        <form method="post" action="{{ route('customers.store') }}" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div class="card">

                <div class="card-header">
                    <h3>Create Customer</h3>
                </div>

                <div class="card-body">

                    <div class="row prices p-3">
                        <div class="row col-md-12">
                            <div class="col-md-2 col-12 g-0" style="padding-right:5px!important">
                                <label for="code" class="form-label">Code</label>
                                <input type="number" min="0" class="form-control" name="code[]" id="code" placeholder="code"
                                value="{{ old('code[]') }}">
                            </div>

                            <div class="col-12 col-md-5 g-0" style="padding-right:5px!important">
                                <label for="name" class="form-label">Full Name </label>
                                <input type="name" min="0" class="form-control" name="name[]" id="name" placeholder="name"
                                value="{{ old('name[]') }}">
                            </div>

                            <div class="col-12 col-md-2 g-0" style="padding-right:5px!important">
                                <label for="age" class="form-label">Age</label>
                                <input type="number" min="0" class="form-control" name="age[]" id="age" placeholder="Customer Age"
                                value="{{ old('age[]') }}">
                            </div>

                            <div class="col-md-2 col-12 g-0" style="padding-right:5px!important">
                                <label for="area_id" class="form-label">Location</label>
                                <select  class="form-control" class="form-select" name="area_id[]" id="area_id">
                                    <option value="" selected>Location</option>
                                    @foreach ($areas as $area)
                                    <option value="{{ $area['id'] }}">{{ $area['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12 col-md-1 d-flex align-items-end g-0">
                                <a href="javascript:void(0)" class="btn btn-success addMore"><span class="glyphicon glyphicon glyphicon-plus"
                                        aria-hidden="true"></span> Add More</a>
                            </div>

                        </div>
                    </div>

                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Submit </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- For Add New Input Row -->
<div class="row pricesCopy p-3" style="display: none;">
    <div class="row col-md-12">
        <div class="col-md-2 col-12 g-0" style="padding-right:5px!important">
            <input type="number" min="0" class="form-control" name="code[]" id="code" placeholder="code"
            value="{{ old('code[]') }}">
        </div>

        <div class="col-12 col-md-5 g-0" style="padding-right:5px!important">
            <input type="name" min="0" class="form-control" name="name[]" id="name" placeholder="name"
            value="{{ old('name[]') }}">
        </div>

        <div class="col-12 col-md-2 g-0" style="padding-right:5px!important">
            <input type="number" min="0" class="form-control" name="age[]" id="name" placeholder="Customer Age"
            value="{{ old('age[]') }}">
        </div>

        <div class="col-md-2 col-12 g-0" style="padding-right:5px!important">
            <select  class="form-control" class="form-select" name="area_id[]" id="area_id">
                <option value="" selected>Location</option>
                @foreach ($areas as $area)
                   <option value="{{ $area['id'] }}">{{ $area['name'] }}</option>
                 @endforeach
            </select>
        </div>

        <div class="col-12 col-md-1 d-flex align-items-end g-0">
            <a href="javascript:void(0)" class="btn btn-danger remove"><span class="glyphicon glyphicon glyphicon-plus"
                    aria-hidden="true"></span> Remove</a>
        </div>

    </div>
</div>
@endsection



@push('scripts')
    <script type="text/javascript">
        $(document).ready(function (e) {
            //add more fields group
            $(".addMore").click(function(){
                    var fieldHTML='<div class="row prices p-3" style="margin-top:5px!important">'
                    +$(".pricesCopy").html()+'</div>';
                    $('body').find('.prices:last').after(fieldHTML);
                });
            //remove fields group
            $("body").on("click",".remove",function(){
                    $(this).parents(".prices").remove();
                });
        });
    </script>
@endpush