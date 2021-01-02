<div>
    <h2 class="d-flex justify-content-center" style="padding-top: 1rem">
        Change Steps if required
        <div class="buttons">
            <a class="fas fa-plus icon-addStep cursor-hover" wire:click="increment" ></a>
        </div>
    </h2>

    @foreach($steps as $step)
        <div class="d-flex justify-content-center" wire:key="{{$loop->index}}">
            @if(isset($step['name']))
                <input type="text" name="stepName[]" class="item-step" placeholder="{{'Step '.($loop->index+1)}}" value="{{$step['name']}}">
            @else
                <input type="text" name="stepName[]" class="item-step" placeholder="{{'Step '.($loop->index+1)}}">
            @endif

            @if(isset($step['id']))
                <input type="hidden" name="stepId[]" value="{{$step['id']}}">
            @else
                <input type="hidden" name="stepId[]">
            @endif
            
            <a class="fas fa-trash icon-trashStep cursor-hover" wire:click="remove({{$loop->index}})"></a>
        </div>
    @endforeach

    <!-- @foreach($steps as $step)
        Note: this is my workaround for the delete button error.
        <div class="d-flex justify-content-center">
            <input type="text" name="step[]" class="item-step" value="{{isset($step['name'])}}">
            <a class="fas fa-trash icon-trashStep" style="color: gray!important;"></a>
        </div>

        
        <div class="d-flex justify-content-center">
            @if(isset($step['name']))
                <input type="text" name="step[]" class="item-step" value="{{$step['name']}}" placeholder="{{'Step '.($loop->index+1)}}">
            @else
                <input type="text" name="step[]" class="item-step" placeholder="{{'Step '.($loop->index+1)}}">
            @endif
            
            @if($loop->last)
                <a class="fas fa-trash icon-trashStep cursor-hover" wire:click="remove({{$loop->index}})"></a>
            @else
                <a class="fas fa-trash icon-trashStep" style="color: gray!important;"></a>
            @endif
        </div>

        
    @endforeach -->
    
</div>
