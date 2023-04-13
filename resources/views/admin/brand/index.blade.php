@extends('admin\mastar')
@section('admin_content')
@if(Session::has('success'))
<span style="color:red;">{{ Session::get('success') }}</span>
@endif
@if(Session::has('fail'))
<span style="color:red;">{{ Session::get('fail') }}</span>
@endif
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Brand</h2>

            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
              <thead>
                  <tr>
                      <th style="width: 5%">No</th>
                      <th style="width: 25%">Title</th>
                      <th style="width: 30%">Description</th>
                      <th style="width: 10%">Status</th>
                      <th style="width: 30%">Actions</th>
                  </tr>
              </thead>
              <tbody>
                @if($brand->isNotEmpty())
                @foreach ($brand as $key=>$br)
                <tr>
                    <td>{{ $key+1 }}</td>

                    <td class="center">{{ $br->title }}</td>
                    <td class="center">{{ $br->description }}</td>
                    <td class="center">
                        @if($br->status==1)
                            <a href="{{ route('brand.status',$br->id) }}" class="btn btn-danger">
                                Deactive
                            </a>
                         @else
                            <a href="{{ route('brand.status',$br->id) }}" class="btn btn-success">
                                Active
                            </a>
                        @endif

                    </td>
                    <td class="center">
                        <a class="btn btn-info" href="{{ route('brand.edit',$br->id) }}">
                            <i class="halflings-icon white edit"></i>
                        </a>
                        <form action="{{ route('brand.destroy',$br->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="halflings-icon white trash"></i>
                        </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @else
                    <tr>No data</tr>
                @endif
              </tbody>
          </table>
        </div>
    </div><!--/span-->

</div><!--/row-->
@endsection
