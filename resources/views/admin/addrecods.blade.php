@extends('layouts.app')
@section('content')
    @foreach($regions as $region)
        <div>
            <button type="button" class="btn btn-primary" data-toggle="collapse"
                    data-target="#{{$region->id}}">{{$region->name}} Region</button>
            <div id="{{$region->id}}" class="collapse">
                @foreach($cities as $city)
                    @if($city->region_id==$region->id)
                        <br><br>
                        <form id="form{{$city->id}}"  method="POST">
                            @csrf
                            {{$city->name}}<br>
                            confirmed: <input type="number" name="confirmed" ><br>
                            recovered: <input type="number" name="recovered"><br>
                            deaths: <input type="number" name="deaths" ><br>
                            <input type="hidden" name="ville_id" value="{{$city->id}}">
                            <input type="hidden" name="region_id" value="{{$city->region_id}}">
                            <input type="hidden" name="DAY" value="{{date("Y-m-d")}}">
                        </form>
                        <button class="btn-warning" onclick="sendform(this)">Add</button>
                    @endif
                @endforeach
            </div>
        </div>

    @endforeach

    <img src="https://drive.google.com/file/d/1ZPXi9IIUs1GeKu3RxaH07KFKH8ppWCPh/preview"><br>

    <div >
    <script>
        function sendform(tbn) {
           var form= $(tbn).prev();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{url('admin')}}",
                data: form.serialize(), // serializes the form's elements.
                success: function(data,status)
                {   if(status=="success"){
                    $(tbn).prop('disabled', true);
                    $(tbn).css('cursor', 'not-allowed');
                }
                    alert(status);
                    console.log(status)// show response from the php script.
                }
            });
        }
    </script>
@endsection
