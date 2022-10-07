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
           <div class="cate-card-head">
               <p class="ex-card-title">Workout List</p>
           </div>

           <div class="cate-card-content">
               <a href="">
               <div class="slide-cate-img" style="background-image: url({{asset('assets/imgs/Exercise/categories/push.jpg')}})">
                   <p>Push Exercise</p>
               </div>
               </a>
                <div class="slide-cate-img" style="background-image: url({{asset('assets/imgs/Exercise/categories/pull.jpg')}})">
                   <p>Pull Exercise</p>
                </div>
               <a href="{{route('exercises.legs')}}">
               <div class="slide-cate-img"
                    style="background-image: url({{asset('assets/imgs/Exercise/categories/leg.webp')}});">
                   <p>Leg Exercise</p>
                </div>
               </a>
           </div>
       </div>
    </body>
@endsection
