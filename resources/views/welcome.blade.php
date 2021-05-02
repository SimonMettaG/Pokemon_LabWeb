@extends('layouts.main')



@section('script')
	<script>
        Echo.channel('my-channel')
        .listen('.start-fight', function(data) {
  console.log(data);
});
	</script>
@endsection



