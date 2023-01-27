@extends('layouts.app')
@section('style-css')
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
    #inputSearch {
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
    #inputSearch:focus {outline: 3px solid #ddd;}

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

    #form-food-div{
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
    @include('alerts.success')
    @include('alerts.errors')
    {{$date}}

    <div id="date_controls">
    <span class="date">
        <a class="prev" href="#">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <time id="current-date"></time>
        <a class="next" href="#">
            <i class="fa-solid fa-arrow-right"></i>
        </a>
    </span>
        <input type="hidden" id="date_selector" value=""/>
        <i class="icon-calendar" id="datepicker-trigger"></i>
    </div>




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

{{--
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
--}}

        <table class="table" id="tod_tr_1" style="display: table">
            <thead>
            <tr>
                <th scope="col">

                    BreakFast ({{\App\Helpers\Meals::getBrkfastCalories()}} cal)

                    <a type="button" class="btn btn-pink" id="breakfastBtn" href="#">+</a>
                </th>
                <th scope="col">
                    Serving Size
                </th>
                <th scope="col">
                    Calories
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($breakfasts as $breakfast)
                <tr id="bf">
                    <td>{{$breakfast->food->Food_Name}}({{$breakfast->food->calories}} cal/100g)</td>
                    <td>{{$breakfast->serving_size}}{{$breakfast->unit->abbr}} x {{$breakfast->servings_per_container}}</td>
                    <td>{{$breakfast->total_calories}} kcal</td>
                </tr>
            @endforeach

            <tr id="data-container"></tr>
            </tbody>
        </table>
        <table class="table" id="tod_tr_2" style="display: table">
            <thead>
            <tr>
                <th scope="col">
                    Lunch ({{\App\Helpers\Meals::getLunchCalories()}} cal)
                    <a type="button" class="btn btn-pink" id="lunchBtn" href="#">+</a>
                </th>
                <th scope="col">
                    Serving Size
                </th>
                <th scope="col">
                    Calories
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($lunches as $lunch)
                <tr>
                    <td>{{$lunch->food->Food_Name}}({{$lunch->food->calories}} cal/100g)</td>
                    <td>{{$lunch->serving_size}}{{$lunch->unit->abbr}} x {{$lunch->servings_per_container}}</td>
                    <td>{{$lunch->total_calories}} kcal</td>
                </tr>
            @endforeach


            </tbody>
        </table>
        <table class="table" id="tod_tr_3" style="display: table">
            <thead>
            <tr>
                <th scope="col">
                    Dinner ({{\App\Helpers\Meals::getDinnerCalories()}} cal)
                    <a type="button" class="btn btn-pink" id="dinnerBtn" href="#">+</a>
                </th>
                <th scope="col">
                    Serving Size
                </th>
                <th scope="col">
                    Calories
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($dinners as $dinner)
                <tr>
                    <td>{{$dinner->food->Food_Name}}({{$dinner->food->calories}} cal/100g)</td>
                    <td>{{$dinner->serving_size}}{{$dinner->unit->abbr}} x {{$dinner->servings_per_container}}</td>
                    <td>{{$dinner->total_calories}} kcal</td>
{{--                    <td>{{$dinner->serving_size * $dinner->servings_per_container/100 * $dinner->food->calories}} kcal</td>--}}
                </tr>
            @endforeach


            </tbody>
        </table>

        <table class="table" id="yes_tr_1" style="display: none">
            <thead>
            <tr>
                <th scope="col">

                    BreakFast ({{\App\Helpers\Meals::getYesBrkfastCalories()}} cal)

                    <a type="button" class="btn btn-pink" id="breakfastBtn" href="#">+</a>
                </th>
                <th scope="col">
                    Serving Size
                </th>
                <th scope="col">
                    Calories
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($yes_breakfasts as $breakfast)
                <tr>
                    <td>{{$breakfast->food->Food_Name}}({{$breakfast->food->calories}} cal/100g)</td>
                    <td>{{$breakfast->serving_size}}{{$breakfast->unit->abbr}} x {{$breakfast->servings_per_container}}</td>
                    <td>{{$breakfast->total_calories}} kcal</td>
                </tr>
            @endforeach


            </tbody>
        </table>
        <table class="table" id="yes_tr_2" style="display: none">
            <thead>
            <tr>
                <th scope="col">
                    Lunch ({{\App\Helpers\Meals::getYesLunchCalories()}} cal)
                    <a type="button" class="btn btn-pink" id="lunchBtn" href="#">+</a>
                </th>
                <th scope="col">
                    Serving Size
                </th>
                <th scope="col">
                    Calories
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($yes_lunches as $lunch)
                <tr>
                    <td>{{$lunch->food->Food_Name}}({{$lunch->food->calories}} cal/100g)</td>
                    <td>{{$lunch->serving_size}}{{$lunch->unit->abbr}} x {{$lunch->servings_per_container}}</td>
                    <td>{{$lunch->total_calories}} kcal</td>
                </tr>
            @endforeach


            </tbody>
        </table>
        <table class="table" id="yes_tr_3" style="display: none">
            <thead>
            <tr>
                <th scope="col">
                    Dinner ({{\App\Helpers\Meals::getYesDinnerCalories()}} cal)
                    <a type="button" class="btn btn-pink" id="dinnerBtn" href="#">+</a>
                </th>
                <th scope="col">
                    Serving Size
                </th>
                <th scope="col">
                    Calories
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($yes_dinners as $dinner)
                <tr>
                    <td>{{$dinner->food->Food_Name}}({{$dinner->food->calories}} cal/100g)</td>
                    <td>{{$dinner->serving_size}}{{$dinner->unit->abbr}} x {{$dinner->servings_per_container}}</td>
                    <td>{{$dinner->total_calories}} kcal</td>
{{--                    <td>{{$dinner->serving_size * $dinner->servings_per_container/100 * $dinner->food->calories}} kcal</td>--}}
                </tr>
            @endforeach


            </tbody>
        </table>


    </div>

    <div class="dropdown">
        <input type="text" placeholder="Search.." id="inputSearch" style="display: none" onkeyup="searchFunction()">
        <div id="myFoodList" class="dropdown-content" style="display: none">
            @foreach($foods as $food)
            <a href="#" id="foody" data-id="{{$food->id}}"  onclick="myfun(this)">{{$food->Food_Name}}</a>
            @endforeach
        </div>
    </div>

    <div id="form-food-div" style="display: none">
        <form id="form-meals" action="" method="post">
            @csrf
        <p id="foodname"></p>
            <div class="row">
                <div class="col-md-12">
                    <input name="food_id" id="food_id" hidden readonly>
                </div>
                <div class="col-md-6">
                    <label for="">Serving Size</label>
                    <input type="number" name="serving_size">
                </div>
                <div class="col-md-6" style="margin-top: 27px">
                    <label for="">Unit</label>
                    <select id="units" name="unit_id">
                        @foreach($units as $unit)
                            <option value="{{$unit->id}}">{{$unit->abbr}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="">Servings per container</label>
                    <input name="servings_per_container" type="number">
                </div>

                <div class="col-md-6">
                    <label for="">Date</label>
                    <input id="created_at" name="created_at">
                </div>
            </div>
            <button type="submit" class="btn btn-pink my-3" id="add-f" href="#"></button>
        </form>
    </div>
@endsection
@section('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
        const yesterday = document.getElementById('yesterday');
        const today = document.getElementById('today');
        const tomorrow = document.getElementById('tomorrow');

        const breakfastBtn = document.getElementById('breakfastBtn');
        const lunchBtn = document.getElementById('lunchBtn');
        const dinnerBtn = document.getElementById('dinnerBtn');
        const addF = document.getElementById('add-f');

        const food_list = document.getElementById("myFoodList")

        const tod_tr_1 = document.getElementById('tod_tr_1');
        const tod_tr_2 = document.getElementById('tod_tr_2');
        const tod_tr_3 = document.getElementById('tod_tr_3');

        const yes_tr_1 = document.getElementById('yes_tr_1');
        const yes_tr_2 = document.getElementById('yes_tr_2');
        const yes_tr_3 = document.getElementById('yes_tr_3');

        var a = document.getElementsByTagName("a")
        var inpSearch = document.getElementById("inputSearch");
        var foodFormDiv = document.getElementById("form-food-div");
        var mealForm = document.getElementById("form-meals");
        var foodServing = document.getElementById('myFormId');




        /*** Get the url params ***/
        const numberOfDays = 1;
        let currentDate = new Date();
        const prevArrow = document.querySelector('.prev');
        const nextArrow = document.querySelector('.next');

        // Converting this date to a string in the format "weekday, month day, year" using the toLocaleDateString()
        const currentDateString = currentDate.toLocaleDateString('en-US', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });

        // belongs to this element ==> <time id="current-date"></time>
        document.getElementById('current-date').textContent = currentDateString;

        // Get the prev and next arrow elements


        let prevDateString;
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('date')) {
            prevDateString = urlParams.get('date');
        }

        /*** To retrieve the item that was created at the time specified in the URL ***/

        // 1- if we retrieve the items on load the window
        if (location.pathname.includes('/food-diary/'+prevDateString)) {
            window.onload = function () {
                var currentUrl = '/food-diary/' + prevDateString;
                $.ajax({
                    type: "GET",
                    url: currentUrl,
                    data: {date: prevDateString},
                    success: function (data) {
                        console.log(data);
                        console.log(currentUrl)
                        let currentPath = window.location.pathname;
                        let currentLanguage = currentPath.split('/')[1];
                        console.log(currentLanguage)
                        let output = '';
                        for (let i = 0; i < data.length; i++) {
                            let foodName;
                            if (currentLanguage === 'en') {
                                foodName = data[i].food.Food_Name.en;
                            } else {
                                foodName = data[i].food.Food_Name.ar;
                            }
                            output += `
                <td> ${foodName} + </td>
                <td> ${data[i].serving_size} .'x'. ${data[i].servings_per_container}</td>
                <td> ${data[i].total_calories} kcal </td>
        `;
                        }
                        document.querySelector('#bf').innerHTML = output;
                    }
                });
            };
        }

        // 2- if we retrieve the items after clicking on .prev
        document.querySelector('.prev').addEventListener('click', (event) => {
            event.preventDefault();
            const prevDate = new Date(currentDate.getTime() - (1 * 24 * 60 * 60 * 1000));
            currentDate = prevDate;
            const prevDateString = prevDate.toISOString().substring(0,10);
            const url = new URL(location.href);
            url.searchParams.append('date', prevDateString);
            console.log(url.href)
            let href = url.href
            console.log(url.href)
            fetch(location.href)
                .then(response => response.text())
                .then(data => {
                    while(url.searchParams.get("date")) {
                        url.searchParams.delete("date");
                    }
                    url.searchParams.append('date', prevDateString);
                    window.history.pushState({}, "", url.href);
                })
                .catch(error => {
                    console.log(error);
                });

            var currentUrl = '/food-diary/'+prevDateString;
            $.ajax({
                type: "GET",
                url: currentUrl,
                data:{date:prevDateString},
                success: function(data) {
                    console.log(data);
                    console.log(currentUrl)
                    let currentPath = window.location.pathname;
                    let currentLanguage = currentPath.split('/')[1];
                    console.log(currentLanguage)
                    let output = '';
                    for (let i = 0; i < data.length; i++) {
                        let foodName;
                        if(currentLanguage === 'en'){
                            foodName = data[i].food.Food_Name.en;
                        }else{
                            foodName = data[i].food.Food_Name.ar;
                        }
                        output += `
                <td> ${foodName} + </td>
                <td> ${data[i].serving_size} .'x'. ${data[i].servings_per_container}</td>
                <td> ${data[i].total_calories} kcal </td>
        `;
                    }
                    document.querySelector('#bf').innerHTML = output;
                }
            });

        });


            // Update the date and navigate to the appropriate page when the next arrow is clicked
        nextArrow.addEventListener('click', (event) => {
            event.preventDefault();
            currentDate.setDate(currentDate.getDate() + 1);
            const nextDateString = currentDate.toLocaleDateString('en-US', { year: 'numeric', month: '2-digit', day: '2-digit' });
            location.href = `?date=${nextDateString}`;
        });



        /*yesterday.addEventListener('click', () => {

            if (yes_tr.style.display === 'none') {
                // 👇️ this SHOWS the form
                yes_tr.style.display = 'table'
                tod_tr.style.display = 'none';
            }
        });*/


        today.addEventListener('click', () => {

            if (tod_tr_1.style.display === 'none' && tod_tr_2.style.display === 'none' && tod_tr_3.style.display === 'none') {
                // 👇️ this SHOWS the form
                tod_tr_1.style.display = 'table';
                tod_tr_2.style.display = 'table';
                tod_tr_3.style.display = 'table';

                yes_tr_1.style.display = 'none';
                yes_tr_2.style.display = 'none';
                yes_tr_3.style.display = 'none';

            }
        });



        function searchFunction() {
            var search_input, serFoodUpCase, ul, li, a_food, i;
            search_input = inpSearch
            serFoodUpCase = search_input.value.toUpperCase();
            foodlist = food_list;
            a_food = foodlist.getElementsByTagName("a");
            for (i = 0; i < a_food.length; i++) {
                foodLinkValue = a_food[i].textContent || a_food[i].innerText;
                if (foodLinkValue.toUpperCase().indexOf(serFoodUpCase) > -1) {
                    a_food[i].style.display = "";
                } else {
                    a_food[i].style.display = "none";
                }
            }
        }

        window.myfun = function(obj) {
            document.getElementById("foodname").innerHTML = obj.innerHTML;
        }


        $(function(){
            $(a).click(function(){
                var foodid = $(this).attr('data-id');
                $('#food_id').val(foodid);
                var foodid = null;
            });
        });




        // Get dates
        function getToday(date = new Date()) {
            const today_d = new Date(date.getTime())
            today_d.setDate(date.getDate())

            var dd = String(today_d.getDate()).padStart(2, '0');
            var mm = String(today_d.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today_d.getFullYear();
            let today = dd + '-' + mm + '-' + yyyy;

            return today
        }
        function getPreviousDay(date = new Date()) {
            const previous_d = new Date(date.getTime());
            previous_d.setDate(date.getDate() - 1)

            let dd = String(previous_d.getDate()).padStart(2, '0');
            let mm = String(previous_d.getMonth() + 1).padStart(2, '0')
            let yyyy = previous_d.getFullYear()

            let previouss = dd + '-' + mm + '-' + yyyy;

            return previouss
        }
        function getNextDay(date = new Date()) {
            const next_d = new Date(date.getTime());
            next_d.setDate(date.getDate() + 1)

            let dd = String(next_d.getDate()).padStart(2, '0');
            let mm = String(next_d.getMonth() + 1).padStart(2, '0')
            let yyyy = next_d.getFullYear()

            let nextt = dd + '-' + mm + '-' + yyyy;

            return nextt
        }

        //Get time
        var time = new Date();
        var hh = String(time.getHours()).padStart(2, '0');
        var mi = String(time.getMinutes()).padStart(2, '0');
        var ss = String(time.getSeconds()).padStart(2, '0');


        time = hh + ':' + mi + ':' + ss;


        // Function when click yesterday button
        $(function (){
            $(yesterday).click(function (){
                $('#created_at').val(getPreviousDay())

                if (yes_tr_1.style.display === 'none' && yes_tr_2.style.display === 'none' && yes_tr_3.style.display === 'none') {
                    // 👇️ this SHOWS the form
                    yes_tr_1.style.display = 'table'
                    yes_tr_2.style.display = 'table'
                    yes_tr_3.style.display = 'table'

                    tod_tr_1.style.display = 'none';
                    tod_tr_2.style.display = 'none';
                    tod_tr_3.style.display = 'none';

                }
            })
        })

        // Function when click today button
        $(function (){
            $(today).click(function (){
                $('#created_at').val(getToday() +" "+ time)
            })
        })

        $(function (){
            $(tomorrow).click(function (){
                $('#created_at').val(getNextDay())
            })
        })

        $('#created_at').val(getToday() +" "+ time)

        $(function(){
            $(breakfastBtn).click(function(){
                mealForm.action = "{{route('dairy.breakfast.store')}}"
                food_list.style.display = 'block';;
                inpSearch.style.display = 'block';
                foodFormDiv.style.display = 'block';
                addF.innerHTML = 'Add Breakfast'
            });
        });
        $(function(){
            $(lunchBtn).click(function(){
                mealForm.action = "{{route('dairy.lunch.store')}}"
                food_list.style.display = 'block';
                inpSearch.style.display = 'block';
                foodFormDiv.style.display = 'block';
                addF.innerHTML = 'Add Lunch'
            });
        });

        $(function(){
            $(dinnerBtn).click(function(){
                mealForm.action = "{{route('dairy.dinner.store')}}"
                food_list.style.display = 'block';
                inpSearch.style.display = 'block';
                foodFormDiv.style.display = 'block';
                addF.innerHTML = 'Add Dinner'
            });
        });
    </script>
@stop
