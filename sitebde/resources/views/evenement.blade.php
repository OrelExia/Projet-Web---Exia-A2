@extends('layout') {{HTML::style('css/evenement.css')}} 
@section('title')
<h1 id="title"></h1>
@endsection
 
@section('content')
<div class="eventContainer">
    @if($user != null)
    <div class="eventPanel" id="{{$user->id }}">
        @else
        <div class="eventPanel" id="0">
            @endif
            <div class="eventHead">
                <img class="eventImage" src="" alt="evenement">
            </div>
            <div class="eventBody">
                <div class="eventItem">
                    <div class="eventLabel labelLeft" id="titleEvent"></div>
                    <div class="eventLabel labelRight" id="dateEvent"></div>
                </div>
                <div class="eventItem">
                    <div class="eventLabel labelLeft" id="descriptionEvent"></div>
                </div>
                <div class="eventItem">
                    <div class="eventLabel labelRight" id="priceEvent"></div>
                </div>
                <div class="eventItem">
                    @if($user != null && $user->id_role == 2)
                        <div class="eventLabel labelLeft" id="pdfLabel">
                            <button class="btn btn-dark" type="button" id="pdf">inscrits.pdf</button>
                        </div>
                    @endif
                    <div class="eventLabel labelRight" id="subscribe">                            
                        @if($isRegister == null)
                        <form method="POST" action="{{route('storeRegistration')}}">
                            <button class="btn btn-success" name="event" value="{{$id_event}}" type="submit">S'inscrire</button>
                        @else
                        <form method="POST" action="{{route('destroyRegistration', ['id' => $id_event])}}">
                            <button class="btn btn-danger" type="submit">Se désinscrire</button>
                        @endif
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

{{HTML::script("js/evenement.js")}}