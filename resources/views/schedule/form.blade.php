@extends('templates.layout')

@section('content')
	<!-- <form> -->
	<div class="row">
		<div class="input-field col s4">
			<select name="open" id="open">
				@for($i=6;$i<=11;$i++)
					<option value="{{$i}}">{{$i}}:00</option>
				@endfor
			</select>
			<label for="open">Waktu Buka</label>
		</div>

		<div class="input-field col s4">
			<select name="close" id="close">
				@for($j=19;$j<=24;$j++)
					<option value="{{$j}}">{{$j}}:00</option>
				@endfor
			</select>
			<label for="close">Waktu Tutup</label>
		</div>
	</div>
		<!-- <input type="" name=""> -->
	<!-- </form> -->
	<form id="schedule_form">
		<table class="table bordered" id="table-input">
			
		</table>	    
	</form>
@endsection

@section('js')
	@parent
	<script type="text/javascript">
		$('#open').change(function(){
			makeSchedule();
		});
		$('#close').change(function(){
			makeSchedule();
		});
		$(document).ready(function(){
			makeSchedule();
		});

		function makeSchedule(){
			var open = parseInt($("#open option:selected").val());
			var close = parseInt($("#close option:selected").val());
			var input="<tr>"+
				"<td>Pukul</td>"+
				"<td>Pelajar</td>"+
				"<td>Umum</td>"+
			"</tr>";
			var  k=0;
			for (k = open; k <= close; k++) {
				input+=	"<tr>"+
							"<td>"+k+":00</td>"+
							"<td><input type='number' name='mahasiswa' placeholder='harga Pelajar'></td>"+
							"<td><input type='number' name='mahasiswa' placeholder='harga umum'></td>"+
						"</tr>";
				
			}
			$("#table-input").html(input);
		}
	</script>
@endsection