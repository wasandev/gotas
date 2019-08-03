@extends('layouts.app')


@section('nav')
  @include('partials.nav')
@endsection

@section('content')
    <div class="w-full max-w-2xl mx-auto my-4">  
        <div class="">

            <!-- Following -->
            <div>
                <div>
                    All Users
                </div>

                <div>
                    <table class="table table-striped task-table">
                        <thead>
                        <th>User</th>
                        
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    <div>{{ $user->name }}</div>
                                </td>
                                
                                @if (auth()->user()->isFollowing($user->id))
                                    <td>
                                        <form action="{{route('unfollow', ['id' => $user->id])}}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" id="delete-follow-{{ $user->id }}" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i>Unfollow
                                            </button>
                                        </form>
                                    </td>
                                @else
                                    <td>
                                        <form action="{{route('follow', ['id' => $user->id])}}" method="POST">
                                            {{ csrf_field() }}

                                            <button type="submit" id="follow-user-{{ $user->id }}" class="btn btn-success">
                                                <i class="fa fa-btn fa-user"></i>Follow
                                            </button>
                                        </form>
                                    </td>
                                @endif  

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection