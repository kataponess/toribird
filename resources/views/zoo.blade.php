@extends('layouts.index_master')
@section('stylesheet')
<link rel="stylesheet" href="{{ asset('css/zoo.css') }}">
@endsection
@section('title', 'インコが見られる場所')
@section('main')
@include('search.parrot_modal')
<div class="main">
	<h2>動物園で見られるインコ・オウム</h2>

	<!--------------------- select --------------------->
	<div class="select-area row">

		<div class="dropdownlist col xl2 l3 m4 s10">
			<label>都道府県選択</label>
			<select class="browser-default cursor" onchange="selectPref(this)" id="selectPref">
				<option value="0" selected class="cursor">選択してください</option>
				@foreach($prefecturesTable as $prefectureTable)
				<option value="{{ $prefectureTable->prefecturename }}" id="{{ $prefectureTable->id }}" class="cursor">{{ $prefectureTable->prefecturename }}</option>
				@endforeach
			</select>
		</div>

		<i class="fas fa-angle-right"></i>

		<div class="dropdownlist col xl2 l3 m4 s10">
			<label>動物園選択</label>
			<select class="browser-default cursor" onchange="selectZoo(this)" id="selectZoo">
				<option value="0" selected class="cursor">選択してください</option>
				@foreach($zoonamesTable as $zoonameTable)
				<option value="{{ $zoonameTable->zooname }}" class="select {{ $zoonameTable->prefecture_id }}" class="cursor">{{ $zoonameTable->zooname }}</option>
				@endforeach
			</select>
		</div>

		<!-- <div class="dropdownlist col xl2 l3 m4 s10">
			<label>種類選択</label>
			<select class="browser-default" onchange="selectZoo(this)" id="selectZoo">
				<option value="0" selected>選択してください</option>
				@foreach($parrotnamesTable as $parrotnameTable)
				<option value="{{ $parrotnameTable->parrotname }}" class="select {{ $parrotnameTable->parrotname_id }}">{{ $parrotnameTable->parrotname }}</option>
				@endforeach
			</select>
		</div> -->

	</div>

	<!--------------------- result --------------------->
	<div class="row">
		@foreach ($parrotsTable as $prefecture => $parrotTable)
		@foreach ($parrotTable as $zooname => $parrots)
		<div class="col xl3 l4 m6 s12 result {{ $prefecture }}" id="{{ $zooname }}">
			<ul class="zoo-name-outer z-depth-4">
				<li>
					<div class="zoo-name">
						<div class="name">{{ $zooname }}</div>
						<div class="pref">{{ $prefecture }}</div>
					</div>
				</li>
				@foreach ($parrots as $parrot)
				<li>
					<ul class="parrot-card modal-trigger" href="#{{ $parrot->parrotname_id }}">
						<li>
							<img class="result-img" src="{{ $parrot->path }}">
						</li>
						<li>
							<p class="result-name">{{ $parrot->parrotname_id }}</p>
						</li>
					</ul>
				</li>
				@endforeach
			</ul>
		</div>
		@endforeach
		@endforeach
	</div>

</div>
@endsection

@section('script')
<script src="{{ asset('js/zoo.js') }}"></script>
@endsection
