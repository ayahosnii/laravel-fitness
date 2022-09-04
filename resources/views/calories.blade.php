@extends('layouts.app')
@section('style-css')
    <link rel="stylesheet" href="{{asset('assets/css/cal.css')}}">
@stop
@section('content')
    <div class="slider" style="background-image: url({{asset('assets/imgs/home-banner1.jpg')}})">
        <p>Calculate your Calories</p>
    </div>
    <form id="calorie-calculator" action="{{route('calorie.store')}}" method="post">
        @csrf
        <h2 class="form-title">Daily Calories Calculator</h2>
        <label for="age">Age</label>
        <input type="number" name="age" id="age" placeholder="Enter your age in years" required>
        <span></span>
        <div class="radio-group">
            <label for="sex">Sex</label>
            <input type="radio" name="sex" value="male" id="male" checked="checked"> <label for="male">Male</label>
            <input type="radio" name="sex" value="female" id="female"> <label for="female">Female</label>
        </div>
        <div class="row">
            <label>Weight (lbs)</label>
            <div class="col-md-6">
                <input type="number" name="weight" id="weight" placeholder="Enter your weight in pounds" required>
                <span></span>
            </div>
            <div class="col-md-3">
                <input name="weight-unit" type="radio" value="2"> lbs
            </div>
            <div class="col-md-3">
                <input name="weight-unit" type="radio" value="1"> kg
            </div>
        </div>


        <label>Height (inches)</label>
        <input type="number" name="inches" id="inches" placeholder="Enter your height in inches" required>
        <span></span>
        <label>Activity Level</label>
        <select name="activity_level" id="activity_level" required>
            <option value="">Select an Activity Level</option>
            <option value="1.2">Little to no exercise</option>
            <option value="1.375">Light exercise (1−3 days per week)</option>
            <option value="1.55">Moderate exercise (3−5 days per week)</option>
            <option value="1.725">Heavy exercise (6−7 days per week)</option>
            <option value="1.9">Very heavy exercise (twice per day, extra heavy workouts)</option>
        </select>
        <span></span>
        <label>Choose Goal:</label>
        <select name="gain_loss_amount" id="gain_loss_amount" required>
            <option value="">Select a Goal</option>
            <option value="-1000">Lose 2 Pounds per Week</option>
            <option value="-750">Lose 1.5 Pounds per Week</option>
            <option value="-500">Lose 1 Pounds per Week</option>
            <option value="-250">Lose 0.5 Pounds per Week</option>
            <option value="0">Stay the Same Weight</option>
            <option value="250">Gain 0.5 Pound per Week</option>
            <option value="500">Gain 1 Pound per Week</option>
            <option value="750">Gain 1.5 Pounds per Week</option>
            <option value="1000">Gain 2 Pounds per Week</option>
        </select>
        <span></span>
        <button type="reset">Reset</button>
        <button id="submit_cal">Calculate</button>
        <div id="results"></div>

    <input type="number" name="cal_result" id="cal_result" placeholder="Calories result" required readonly>


        <label>Protein (g)</label>
        <input type="number" name="protein" id="protein" placeholder="Protein in grams" required readonly>
        <span></span>
        <label>Fat (g)</label>
        <input type="number" name="fat" id="fat" placeholder="Fat in grams" required readonly>
        <span></span>
        <label>op (g)</label>
        <input type="number" name="carbs" id="carbs" placeholder="Carbs in grams" required readonly>
        <span></span>

        <button type="submit">Save</button>

        <div id="m-results"></div>
    </form>
    @endsection
    @section('scripts')
    <script>
    let weightUnit = document.querySelectorAll("input[name=weight-unit]");
    $(document).on('click', '#submit_cal', function (e) {
        e.preventDefault();
        calcDailyCals();
        console.log('hello')
    });




    function calcDailyCals(){
        let age = parseInt($('#age').val());
        let sex = $('input[name="sex"]:checked').val();

        let weight = parseFloat($('#weight').val()) * 0.453592;


        let height = parseFloat($("#inches").val()) * 2.54;
        let activity = parseFloat($('#activity_level').val());
        let goal = parseInt($('#gain_loss_amount').val());

        let result;

        if (document.querySelectorAll("input[name=weight-unit]").value === 1){
            if (sex === 'male') {
                result = (88.362 + (13.397 * weight) + (4.799 * height) - (5.677 * age)) * activity;
            } else {
                result = (447.593 + (9.247 * weight) + (3.098 * height) - (4.33 * age)) * activity;
            }
        } else if(weightUnit.checked === 2) {
            if (sex === 'male') {
                result = (88.362 + (13.397 * weight * 0.453592) + (4.799 * height) - (5.677 * age)) * activity;
            } else {
                result = (447.593 + (9.247 * weight * 0.453592) + (3.098 * height) - (4.33 * age)) * activity;
            }
        }



        result = Math.round(result + goal);

        calcDailyMacros(result);

        $('#results').fadeOut('fast',function(){
            $(this).html('<h3>Estimated Daily Calories: ' + result + '</h3>').fadeIn('fast');
        });


        function calcDailyMacros(result){
            $('#cal_result').val(result)
            let carbs = (result * .4) /4;
            let protein = (result * .3) /4;
            let fat = (result * .3) / 9;

            $('#carbs').val(Math.round(carbs));
            $('#protein').val(Math.round(protein));
            $('#fat').val(Math.round(fat));
        }


    }

    </script>
    @endsection
