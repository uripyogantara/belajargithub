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
	<form method="POST" id="schedule_form" action='{{url("schedule")}}'>
	{{csrf_field()}}
		<table class="table bordered" id="table-input">
			<thead>
				<tr>
					<td>Pukul</td>
					<td>Pelajar</td>
					<td>Umum</td>
				</tr>
			</thead>
			<tbody id="section"></tbody>
		</table>	    
		<button type="submit" class="btn">Save</button>
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
			// makeSchedule();
			$('select').material_select();
		});

		function makeSchedule(){
			var open = parseInt($("#open option:selected").val());
			var close = parseInt($("#close option:selected").val());
			var select="";
			var j;
			for (j = open+1; j <= close; j++) {
				select+="<option value='"+j+"' selected>"+j+":00</option>";
			}
			var string = "<tr>"+
				"<td width='30%'>"+
					"<div class='row'>"+
						"<div class='col m6'>"+
							"<select name='start[]' class='start' >"+
								"<option value='"+open+"' selected>"+open+":00</option>"+
							"</select>"+
						"</div>"+
						"<div class='col m6'>"+
							"<select name='finish[]' class='finish1' onchange='addSchedule(1)'>"+
								select+
							"</select>"+
						"</div>"+
						
					"</div>"+
				"</td>"+
				"<td><input name='harga_pelajar[]' type='number'  placeholder='Harga Pelajar'></td>"+
				"<td><input name='harga_umum[]' type='number'  placeholder='Harga Pelajar'></td>"+
			"</tr>"
			$("#section").html(string);
			$('select').material_select();
		}

		function addSchedule(number){
			var tes=$(".finish option:selected");
			var start = parseInt($(".finish"+number+" option:selected").val());
			// for (var i = 0; i <sta; i--) {
			// 	Things[i]
			// }
			number=parseInt(number)+1;
			var close = parseInt($("#close option:selected").val());
			var select="";
			var j;
			for (j = start+1; j <= close; j++) {
				select+="<option value='"+j+"' selected>"+j+":00</option>";
			}
			var string = "<tr>"+
				"<td width='30%'>"+
					"<div class='row'>"+
						"<div class='col m6'>"+
							"<select name='start[]' class='start' >"+
								"<option value='"+start+"' selected>"+start+":00</option>"+
							"</select>"+
						"</div>"+
						"<div class='col m6'>"+
							"<select name='finish[]' class='finish"+number+"' onchange='addSchedule("+number+")'>"+
								select+
							"</select>"+
						"</div>"+
						
					"</div>"+
				"</td>"+
				"<td><input name='harga_pelajar[]' type='number'  placeholder='Harga Pelajar'></td>"+
				"<td><input name='harga_umum[]' type='number'  placeholder='Harga Pelajar'></td>"+
			"</tr>"
			$("#section").append(string);
			$('select').material_select();
		}
	</script>
@endsection