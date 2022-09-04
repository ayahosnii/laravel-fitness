<div class="addfood" style="background: #f6e8cd; margin: 30px; padding: 30px">
    @if(App::getLocale() == 'en')
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button"
                   class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-success' }}">1</a>
                <p>{{ trans('Add_food.Step1') }}</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button"
                   class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-success' }}">2</a>
                <p>{{ trans('Add_food.Step2') }}</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button"
                   class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-success' }}"
                   disabled="disabled">3</a>
                <p>{{ trans('Add_food.Step3') }}</p>
            </div>
        </div>
    </div>
    @elseif(App::getLocale() == 'ar')
     <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a href="#step-3" type="button"
                       class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-success' }}">3</a>
                    <p>{{ trans('Add_food.Step3') }}</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-2" type="button"
                       class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-success' }}">2</a>
                    <p>{{ trans('Add_food.Step2') }}</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-1" type="button"
                       class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-success' }}"
                       disabled="disabled">1</a>
                    <p>{{ trans('Add_food.Step1') }}</p>
                </div>
            </div>
        </div>
    @endif


    @include('livewire.Food_Info')
    @include('livewire.Main_Food')

        <div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
            @if ($currentStep != 3)
                <div style="display: none" class="row setup-content" id="step-3">
                    @endif
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <label for="member">Add to girly database</label>
                            <input type="checkbox" wire:model="for_member" value="1">
                            <h3 style="font-family: 'Cairo', sans-serif;">{{ trans('Add_food.Sure') }}</h3><br>
                            <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button"
                                    wire:click="back(2)">{{ trans('Add_food.Back') }}</button>
                            <button class="btn btn-success btn-sm btn-lg pull-right" wire:click="submitFood"
                                    type="button">{{ trans('Add_food.Finish') }}</button>
                        </div>
                    </div>
                </div>
        </div>


</div>
