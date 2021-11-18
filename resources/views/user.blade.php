{{-- @foreach($name as $n)
<h3>{{$n}}</h3>
@endforeach --}}
@for($i=0;$i<count($name);$i++)
<h2>{{$name[$i]}}<h2><span>{{$i}}</span>
@endfor