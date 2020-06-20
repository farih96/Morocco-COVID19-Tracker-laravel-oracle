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
                            @php
                                $key = false;
                                $key = array_search($city->id, array_column($cases, 'ville_id'));
                            @endphp
                            @if($city->region_id==$region->id && $key )



                                <form id="form{{$city->id}}" >
                                    @csrf

                                        <div class="row" style="margin-top: 50px">

                                            <div class="box" style="font-size: 1.5em; color:white; padding-top:20px; padding-left:20px">
                                                {{$city->name}}
                                            </div>
                                            <div class="box">
                                                <div class="stati bg-nephritis">
                                                    @php
                                                        if($key)
                                                            echo '<input type="text" name="recovered" id="recovered" value="'.$cases[$key]['recovered'].'" placeholder="Cases recovered">';
                                                     @endphp
                                                </div>
                                            </div>
                                            <div class="box">
                                                <div class="stati bg-alizarin">
                                                    @php
                                                        if($key)
                                                            echo '<input type="text" name="deaths" id="deaths" value="'.$cases[$key]['deaths'].'" placeholder="Cases deaths">';
                                                       @endphp
                                                </div>
                                            </div>
                                            <div class="box">
                                                <div class="stati bg-peter_river">
                                                    @php

                                                        if($key)
                                                            echo '<input type="text" name="confirmed" id="confirmed" value="'.$cases[$key]['confirmed'].'" placeholder="Cases confirmed">';
                                                      @endphp
                                                </div>
                                            </div>
                                            <input type="hidden" name="case_id" value="{{$cases[$key]['id']}}">

                                            <div class="box" style="width:100px; padding-top:30px">
                                                <button  onclick="sendform(this)" type="button" class="btn btn-primary" id="submit">Update</button>
                                            </div>

                                        </div>
                                    </form>

                                @endif
                            @endforeach

                        </div>
                        </div>
                    </div>

                @endforeach

</div>

<script>
    function sendform(tbn) {
        var form= $(tbn).closest("form");
     //   var case_id = $(tbn).closest("form").attr('class');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: '/update',
            data: form.serialize(),// serializes the form's elements.
            dataType: 'json',

            success: function(data,status)
            {   if(status=="success"){
                $(tbn).prop('disabled', true);
                $(tbn).css('cursor', 'not-allowed');
                $(tbn).css('opacity', '0.5');
            }

            }
        });
    }
</script>



@endsection
