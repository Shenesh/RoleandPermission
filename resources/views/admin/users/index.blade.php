@extends('layout')
@section('content')

    {{-- <div class="card" style="margin-top: 20px">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            User Table
        </div>
        <div class="card-body">
            <table id="usertable" class="display compact row-border stripe" style="width:100%">
                <thead><tr><th>User</th><th>Email</th><th>Role</th><th>Permission</th><th>Action</th></tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div> --}}
    <div class="card" style="margin-top: 20px">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            User Table
        </div>
        <div class="card-body">
            <table id="" class="display compact row-border stripe" style="width:100%">
                <thead><tr><th>User</th><th>Email</th><th>Role</th><th>Permission</th><th>Action</th></tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                  <tr>  <td>{{ $user->name }}</td><td>{{ $user->email }}</td>
                    <td>
                        @if ($user->roles->isNotEmpty())
                        @foreach ($user->roles as $role)
                            <span class="badge badge-secondary">
                                {{ $role->name }}
                            </span>
                        @endforeach
                    @endif
                    </td>
                    <td>
                        {{--  @dump($user->permissions)  --}}
                        @if ($user->permissions->isNotEmpty())
                                        
                        @foreach ($user->permissions as $permission)
                            <span class="badge badge-secondary">
                                {{ $permission->name }}                                    
                            </span>
                        @endforeach
                    
                    @endif
                    </td>
                    
                <td>
                    <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                        <a class="btn btn-sm btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
                        <a class="btn btn-sm btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                  
                </form>
                </td></tr>
                @endforeach
               
                </tbody>
            </table>
        </div>
    </div>
    {{--  <script>
        $(document).ready(function($) {
            var testtable = $('#usertable').DataTable( {
                "ajax": "{!! route('user.get_all_users') !!}",
                columns: [
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: '', name: ''},
                {data: '', name: ''},
                {data: 'action', name: 'action'},
                ]
            } ); 
        });
    </script>  --}}

@endsection

