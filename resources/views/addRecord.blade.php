@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<link rel="stylesheet" href="{{ asset('css/addRecord.css') }}">

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css"></script>

@section('content')

  <div class="container">
    @foreach($regions as $region)
            <div>
                <button type="button" style="margin-top: 20px; width:350px; height:50px" class="btn btn-primary" data-toggle="collapse"
                        data-target="#{{$region->id}}">{{$region->name}} Region</button>
                <div id="{{$region->id}}" class="collapse">

                <div class="region" style="width: 1200px;border-radius:10px">

                    @foreach($cities as $city)
                        @if($city->region_id==$region->id)
                            <form id="form{{$city->id}}"  method="POST">
                            @csrf

                                <div class="row" style="width:1000px;margin-left: 30px;padding-bottom:2px">

                                    <div class="box" style="font-size: 1.5em; color:white; padding-top:20px; padding-left:20px">
                                        {{$city->name}}
                                    </div>
                                    <div class="box">
                                        <div class="stati bg-nephritis">
                                            <input type="number" name="RECOVERED" id="RECOVERED"  placeholder="Cases recovered">
                                        </div>
                                    </div>
                                    <div class="box">
                                        <div class="stati bg-alizarin">
                                            <input type="number" name="DEATHS" id="DEATHS"  placeholder="Cases dead">
                                        </div>
                                    </div>
                                    <div class="box">
                                        <div class="stati bg-peter_river">
                                            <input type="number" name="CONFIRMED" id="CONFIRMED"  placeholder="Cases confirmed">
                                        </div>
                                    </div>
                                    <input type="hidden" name="ville_id" value="{{$city->id}}">
                                    <input type="hidden" name="region_id" value="{{$city->region_id}}">
                                    <input type="hidden" name="DAY" value="{{date("Y-m-d")}}">
                                    <div class="box" style="width: 100px">
                                        <div class="stati" style="width: 100px;padding:0px">
                                            <button class="submit" onclick="sendform(this)" type="button">Add</button>                                        </div>
                                        </div>
                                    </div>

                            </form>

                        @endif
                    @endforeach

                </div>
                </div>
            </div>

        @endforeach


        <script>
            function sendform(tbn) {
               var form= $(tbn).closest("form");

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "{{url('addRecord')}}",
                    data: form.serialize(), // serializes the form's elements.
                    success: function(data,status)
                    {   if(status=="success"){
                        $(tbn).prop('disabled', true);
                        $(tbn).css('cursor', 'not-allowed');
                        $(tbn).css('opacity', '0.5');
                        $(tbn).text('Sent');
                    }

                    }
                });
            }
        </script>

    @endsection
