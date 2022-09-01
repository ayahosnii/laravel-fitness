@extends('layouts.app')
@section('style-css')
    @livewireStyles
@endsection
@section('content')
<div class="addfood" style="background: #f6e8cd; margin: 30px; padding: 30px">
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button"
                   class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-success' }}">1</a>
                <p>{{ trans('Parent_trans.Step1') }}</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button"
                   class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-success' }}">2</a>
                <p>{{ trans('Parent_trans.Step2') }}</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button"
                   class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-success' }}"
                   disabled="disabled">3</a>
                <p>{{ trans('Parent_trans.Step3') }}</p>
            </div>
        </div>
    </div>
<form action="" style="all: unset !important; ">

    <div class="row justify-content-center justify-content-sm-between" style="margin: 40px 500px">
            <div class="col-md-8">
                <label for="food-name">Food Name <span class="text-danger fs-5">*</span></label>
                <input name="food-name" type="text">
            </div>
        </div>
    <div class="row justify-content-center justify-content-sm-between" style="margin: 40px 500px">
            <div class="col-md-4">
                <label for="serving-size">Serving Size <span class="text-danger fs-5">*</span></label>
                <input name="serving-size" type="text" placeholder="Ex: 200gm">
            </div>

            <div class="col-md-4">
                <label for="servings-per-container">Servings per container <span class="text-danger fs-5">*</span></label>
                <input name="servings-per-container" type="text" placeholder="Ex: 2">
            </div>
        </div>
    <div class="row justify-content-center justify-content-sm-between" style="margin: 40px 500px">
            <div class="col-md-4">
                <label for="calories">Calories <span class="text-danger fs-5">*</span> </label>
                <input name="calories" type="number">
            </div>

            <div class="col-md-4">
                <label for="fat">Fat <span class="text-danger fs-5">*</span></label>
                <input name="fat" type="number">
            </div>
        </div>
    <div class="row justify-content-center justify-content-sm-between" style="margin: 40px 500px">
            <div class="col-md-4">
                <div class="row justify-content-md-between">
                    <div class="col-5 position-relative bottom-50">
                <label for="carbs">Carbs <span class="text-danger fs-5">*</span> </label>
                    </div>
                    <div class="col-5">
                <input name="carbs" type="number">
            </div>
            </div>
            </div>

            <div class="col-md-4">
                <label for="Protein	">Protein <span class="text-danger fs-5">*</span></label>
                <input name="Protein" type="number">
            </div>
        </div>
    <div class="row justify-content-center justify-content-sm-between" style="margin: 40px 500px">
            <div class="col-md-4">
                <label for="saturated">Saturated </label>
                <input name="saturated" type="number">
            </div>

            <div class="col-md-4">
                <label for="polyunsaturated	">Polyunsaturated</label>
                <input name="polyunsaturated" type="number">
            </div>
        </div>
    <div class="row justify-content-center justify-content-sm-between" style="margin: 40px 500px">
            <div class="col-md-4">
                <label for="monounsaturated">Monounsaturated </label>
                <input name="monounsaturated" type="number">
            </div>

            <div class="col-md-4">
                <label for="trans">Trans</label>
                <input name="trans" type="number">
            </div>
        </div>
    <div class="row justify-content-center justify-content-sm-between" style="margin: 40px 500px">
            <div class="col-md-4">
                <div class="row justify-content-md-between">
                    <div class="col-5 position-relative bottom-50">
                <label for="cholesterol" class="position-absolute top-25" style="top: 10px">Cholesterol </label>
                    </div>
                    <div class="col-5">

                <input name="cholesterol" type="number">
            </div>
                </div>
            </div>


            <div class="col-md-4">
                <div class="row justify-content-md-between">
                    <div class="col-5 position-relative bottom-50">
                <label for="sugars" class="position-absolute top-25" style="top: 10px">Sugars</label>
                    </div>
                    <div class="col-5">
                <input name="sugars" type="number">
            </div>
        </div>
            </div>
    </div>
    <div class="row justify-content-center justify-content-sm-between" style="margin: 40px 500px">
            <div class="col-md-4">
                <div class="row justify-content-md-between">
                    <div class="col-5 position-relative bottom-50">
                <label for="sodium"  class="position-absolute top-25" style="top: 10px">Sodium </label>
                    </div>
                    <div class="col-5">
                <input name="sodium" type="number">
            </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="row justify-content-md-between">
                    <div class="col-5 position-relative bottom-50">
                        <label for="potassium" class="position-absolute top-25" style="top: 10px">Potassium</label>
                    </div>
                    <div class="col-5">
                        <input name="potassium" type="number">
                    </div>
                </div>
            </div>
        </div>
    <div class="row justify-content-center justify-content-sm-between" style="margin: 40px 500px">
            <div class="col-md-4">
                <div class="row justify-content-md-between">
                <div class="col-5 position-relative bottom-50">
                <label for="dietary-fiber"  class="position-absolute top-25" style="">Dietary Fiber </label>
                </div>
                <div class="col-5">
                <input name="dietary-fiber" type="number">
                </div>
            </div>
            </div>
        </div>
    <div class="row justify-content-center justify-content-sm-between" style="margin: 40px 500px">
        <div class="col-md-4">
            <div class="row justify-content-md-between">
            <div class="col-5 position-relative bottom-50">
            <label for="vitamin-a"  class="position-absolute top-25" style="top: 10px">Vitamin A </label>
            </div>
            <div class="col-5">
            <input name="vitamin-a" type="number">
            </div>
        </div>
        </div>


        <div class="col-md-4">
            <div class="row justify-content-md-between">
                <div class="col-5 position-relative bottom-50">
            <label for="vitamin-c" class="position-absolute top-25" style="top: 10px">Vitamin C</label>
                </div>
                <div class="col-5">
            <input name="vitamin-c" type="number">
                </div>
        </div>
    </div>
    </div>
    <div class="row justify-content-center justify-content-sm-between" style="margin: 40px 500px">
        <div class="col-md-4">
            <div class="row justify-content-md-between">
                <div class="col-5 position-relative bottom-50">
            <label for="calcium">Calcium</label>
                </div>
                <div class="col-md-5">
                    <input name="calcium" type="number">
                </div>
        </div>
        </div>

        <div class="col-md-4">
            <div class="row justify-content-md-between">
                <div class="col-5 position-relative bottom-50">
            <label for="iron">Iron</label>
                </div>
                <div class="col-md-5">
                    <input name="iron" type="number">
                </div>

        </div>
    </div>
        <a class="btn btn-warning my-5">add</a>
    </div>
</form>
</div>
@endsection

@section('scripts')
    @livewireScripts
    <script>
        console.log('here')
    </script>
@endsection
