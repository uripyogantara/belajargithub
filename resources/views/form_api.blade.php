<!DOCTYPE html>
<html>
<head>
	<title>Form API</title>
</head>
<body>
	<form id="form" action="{{url('api/insert')}}" method="POST">
		<input type="text" name="nama" placeholder="Nama">
		<input type="text" name="alamat" placeholder="Alamat">
		<input type="text" name="telepon" placeholder="Telepon">

		<button type="submit">Submit</button>
	</form>

	<script type="text/javascript" src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
	<script type="text/javascript">
		$('#form').submit(function(e){
			e.preventDefault();

			var url= "/api/insert";
			var data=$('#form').serialize();

			$.ajax({
				type: 'ajax',
				method: 'POST',
				url: url,
				data: data,
				dataTypeL: 'json',
				success: function(response){
					if (response.success) {
						alert('success');
					}else{
						alert('error');
					}
				},
				error: function(){
					alert('couldnt post');
				}
			});
		});
	</script>
</body>
</html>