@extends('layouts.index_master')
@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/users.min.css') }}">
@endsection
@section('title', 'インコが見られる場所')
@section('main')
<div class="main">
	<h2>ユーザー一覧</h2>

	<a href="{{ url('users/new') }}" class="btn btn-new">新規登録</a>

	<div class="container-fluid">
		<div class="row">
			<table class="highlight">
				<thead>
					<tr>
						<th class="col s1"></th>
						<th class="col s2">ID</th>
						<th class="col s3">NAME</th>
						<th class="col s4">EMAIL</th>
						<th class="col s2">ROLE</th>
					</tr>
				</thead>
				@foreach($users as $user)
				<tbody>
					<tr>
						<td class="col s1"><a href="" class="btn">詳細</a></td>
						<td class="col s2">{{ $user->id }}</td>
						<td class="col s3">{{ $user->name }}</td>
						<td class="col s4">{{ $user->email }}</td>
						<td class="col s2">{{ $user->role }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

</div>

<!-- page control -->
{!! $users->render() !!}
@endsection
