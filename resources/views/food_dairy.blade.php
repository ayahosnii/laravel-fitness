@extends('layouts.app')
@section('style-css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    /* Dropdown Button */
    .dropbtn {
        background-color: #04AA6D;
        color: white;
        padding: 16px;
        font-size: 16px;
        border: none;
        cursor: pointer;
    }

    /* Dropdown button on hover & focus */
    .dropbtn:hover, .dropbtn:focus {
        background-color: #3e8e41;
    }

    /* The search field */
    #myInput {
        box-sizing: border-box;
        background-image: url('http://127.0.0.1:8000/assets/imgs/icons/searchicon.png');
        background-position: 14px 12px;
        background-repeat: no-repeat;
        font-size: 16px;
        padding: 14px 20px 12px 45px;
        border: none;
        border-bottom: 1px solid #ddd;
        width: 497px;
    }

    /* The search field when it gets focus/clicked on */
    #myInput:focus {outline: 3px solid #ddd;}

    /* The container <div> - needed to position the dropdown content */
    .dropdown {
        position: relative;
        display: inline-block;
    }

    /* Dropdown Content (Hidden by Default) */
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f6f6f6;
        width: 500px;
        height: 150px;
        border: 1px solid #ddd;
        z-index: 1;
        overflow: scroll;
    }

    /* Links inside the dropdown */
    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    /* Change color of dropdown links on hover */
    .dropdown-content a:hover {background-color: #f1f1f1}

    /* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
    .show {display:block;}

    .form-food{
        background-color: #f6f6f6;
        height: 250px;
        width: 500px;
        position: relative;
        left: 800px;
        padding: 20px;
    }
    #foodname{
        font-size: 30px;
        text-align: center;
    }
</style>
    @stop
@section('content')
<div class="container">
    {{--
            * table of units g=1 kg=1/1000 oz = .....
            * form of breakfast>>etc have relationship with food
            * add unit relationship to breakfast table
            * put many of (Servings per container) required table and has relationship with units
    --}}
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a type="button" class="btn btn-pink" id="yesterday" href="#">Yesterday</a>
            <a type="button" class="btn btn-pink" id="today" href="#">Today</a>
            <a type="button" class="btn btn-pink" id="tomorrow" href="#">Tomorrow</a>
        </div>

        <form action="{{route('dairy.store')}}" method="post" style="all: unset !important; ">
            @csrf
            <div class="row justify-content-center">

        <label for="breakfast">Choose Foods for breakfast:</label>

        <select id="breakfast" name="breakfast">
            @foreach($foods as $food)
            <option value="{{$food->id}}">{{$food->Food_Name}}</option>
            @endforeach
        </select>
        <label for="lunch">Choose Foods for lunch:</label>

        <select id="lunch" name="lunch">
            @foreach($foods as $food)
                <option value="{{$food->id}}">{{$food->Food_Name}}</option>
            @endforeach
        </select>

        <label for="dinner">Choose Foods for dinner:</label>

        <select id="dinner" name="dinner">
            @foreach($foods as $food)
                <option value="{{$food->id}}">{{$food->Food_Name}}</option>
            @endforeach
        </select>
                <button type="submit" class="btn btn-pink">Add</button>
            </div>
        </form>
        <table class="table" id="tod_tr" style="display: table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">
                    BreakFast
                    <a type="button" class="btn btn-pink" id="breakfast" href="#" onclick="myFunction()">+</a>
                </th>
                <th scope="col">
                    Lunch
                    <a type="button" class="btn btn-pink" id="lunch" href="#">+</a>
                </th>
                <th scope="col">
                    Dinner
                    <a type="button" class="btn btn-pink" id="lunch" href="#">+</a>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($dairies as $key=>$dairy)

                <tr>
                <th scope="row">{{$key}}</th>
                <td>{{$dairy->foods->Food_Name}}</td>
                <td>{{$dairy->lunchs->Food_Name}}</td>
                <td>{{$dairy->dinners->Food_Name}}</td>
            </tr>
            @endforeach

            </tbody>
        </table>

        <table class="table" id="yes_tr" style="display: none">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">BreakFast</th>
                <th scope="col">Lunch</th>
                <th scope="col">Dinner</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                @foreach($dairies_yes as $key=>$dairy)
                    <th scope="row">{{$key}}</th>
                    <td>{{$dairy->foods->Food_Name}}</td>
                    <td>{{$dairy->lunchs->Food_Name}}</td>
                    <td>{{$dairy->dinners->Food_Name}}</td>
                @endforeach
            </tr>
            </tbody>
        </table>

    </div>

    <div class="dropdown">
        <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
        <div id="myDropdown" class="dropdown-content">
            @foreach($foods as $food)
            <a href="#" id="foody" data-id="{{$food->id}}"  onclick="myfun(this)">{{$food->Food_Name}}</a>
            @endforeach
        </div>
    </div>

    <div class="form-food">
        <form>
        <p id="foodname"></p>
            <div class="row">
                <div class="col-md-12">
                    <input name="food_id" id="food_id" {{--style="display: none"--}} style="display: none" readonly>
                </div>
                <div class="col-md-6">
                    <label for="">Serving Size</label>
                    <input>
                </div>
                <div class="col-md-6">
                    <label for="">Servings per container</label>
                    <input>
                </div>
                <div class="col-md-6">
                    <label for="">Created_at</label>
                    <input>
                </div>
            </div>
            <a type="button" class="btn btn-pink my-3" id="add-f" href="#">Add breakfast</a>
        </form>
    </div>
@endsection
@section('scripts')
        <script>
        const yesterday = document.getElementById('yesterday');
        const today = document.getElementById('today');
        const tomorrow = document.getElementById('tomorrow');
        const yes_tr = document.getElementById('yes_tr');
        const tod_tr = document.getElementById('tod_tr');

        yesterday.addEventListener('click', () => {



            if (yes_tr.style.display === 'none') {
                // 👇️ this SHOWS the form
                yes_tr.style.display = 'table'
                tod_tr.style.display = 'none';
            }
        });


        today.addEventListener('click', () => {

            if (tod_tr.style.display === 'none') {
                // 👇️ this SHOWS the form
                tod_tr.style.display = 'table';
                yes_tr.style.display = 'none';
            }
        });

        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        function filterFunction() {
            var input, filter, ul, li, a, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            div = document.getElementById("myDropdown");
            a = div.getElementsByTagName("a");
            for (i = 0; i < a.length; i++) {
                txtValue = a[i].textContent || a[i].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                } else {
                    a[i].style.display = "none";
                }
            }
        }

        window.myfun = function(obj) {
            document.getElementById("foodname").innerHTML = obj.innerHTML;
        }


        var a = document.getElementsByTagName("a")
        $(function(){
            $(a).click(function(){
                var foodid = $(this).attr('data-id');
                $('#food_id').val(foodid);
                var foodid = null;
            });
        });
    </script>
@stop
