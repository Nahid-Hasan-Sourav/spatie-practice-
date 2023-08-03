@extends('dashboard.master')

@section('body')
    <div class="row">

        <div class="col-8 mx-auto">
            <div class="card">

                        <div class="card-header d-flex justify-content-between">
                            <h4 class="fw-bold">ALL ROLES</h4>
                            <a href="{{route('roles-view')}}" class="btn btn-dark">CREATE</a>
                        </div>
                        <script>
                            // success message popup notification
                        @if(Session::has('success'))
                        toastr.success("{{ Session::get('success') }}", "Success", {
                        "toastClass": "toast bg-success text-white",
                        "progressBarClass": "bg-success"
                        });
                           
                        @endif
                    
                        // error message popup notification
                        @if(Session::has('error'))
                        toastr.error("{{ Session::get('error') }}", "Error", {
                         "toastClass": "toast bg-danger text-white",
                         "progressBarClass": "bg-danger"
                         });
                        @endif
                        </script>
            </div>
            <table class="table table-dark table-striped-columns w-full text-center">
                <thead>
                  <tr>
                    <th scope="col">SL NO</th>
                    <th scope="col">Roll Name</th>
                    <th scope="col">Permission</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                  <tr>

                    <td scope="row">{{ $loop->iteration }}</td>
                    <td>{{$role->name}}</td>
                    <td class="text-start">
                        @foreach ($role->permissions as $permission)
                       <span> {{ $permission->name }},</span>
                        @endforeach
                    </td>
                    <td>
                       <small class="text-danger"> {{ $role->created_at->diffForHumans() }}</small>
                    </td>
                    <td>
                        <div class="d-flex ">
                            <a class="btn btn-success me-3" href="{{ route('role-edit',  ['id' => $role->id]) }}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <form action="{{ route('role-delete', $role->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger"> <i class="fa-solid fa-trash"></i></button>
                            </form>

                        </div>
                    </td>


                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
@endsection
