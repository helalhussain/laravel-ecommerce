@extends('admin\mastar')

@section('admin_content')
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Create size</h2>

            </div>

            <div class="box-content">
                <form class="form-horizontal" action="{{ route('size.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if(Session::has('success'))
                    <span>{{ Session::get('success') }}</span>
                    @endif
                    @if(Session::has('fail'))
                        <span>{{ Session::get('fail') }}</span>
                    @endif
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="date01">Size </label>
                            <div class="controls">
                                <input type="text" id="input" class="input-xlarge @error('size') is-invalid @enderror"
                                name="size" data-role="tagsinput" placeholder="Size">
                               <br> @error('size')
                                <span style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Create Size</button>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div><!--/span-->
    </div><!--/row-->
    </div><!--/row-->
@endsection
