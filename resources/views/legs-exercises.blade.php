@extends('layouts.app')
@section('style-css')
    <link href="{{ asset('css/exercise.css') }}" rel="stylesheet">
@endsection
@section('scripts')
    <script src="{{ asset('assets/js/exercises.js') }}"></script>
@endsection
@section('content')
    <body class="background">
       <div class="exercise-card">
           <div class="exercise-card-head">
               <p class="ex-card-title">Leg Exercises</p>
           </div>
           <div class="exercise-card-content">
               <div id="slider">
                   <ul id="slideWrap">
                       <li>
                           <img src="{{asset('assets/imgs/Exercise/legs/goblet-squad.gif')}}" alt="">
                           <p class="slide-title">Goblet Squad</p>
                       </li>

                       <li>
                           <img src="{{asset('assets/imgs/Exercise/legs/split-squat-exercise.gif')}}" alt="">
                           <p class="slide-title">Split Squad</p>
                       </li>

                       <li>
                           <img src="{{asset('assets/imgs/Exercise/legs/lunges-exercise.gif')}}" alt="">
                           <p class="slide-title">Lunges Squad</p>
                       </li>
                   </ul>
               </div>
               <div id="countdown">
                   <a id="prev" href="#">&#8810;</a>
                   <div id="countdown-number"></div>
                   <svg>
                       <circle r="18" cx="20" cy="20"></circle>
                   </svg>
                   <a id="next" href="#">&#8811;</a>
               </div>
           </div>
       </div>
    </body>
@endsection
