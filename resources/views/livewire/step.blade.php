<div>
    <h2 class="d-flex justify-content-center" style="padding-top: 1rem">
        Add steps if required
        <div class="buttons">
            <a class="fas fa-plus icon-addStep cursor-hover" wire:click="increment" ></a>
        </div>
    </h2>

    @foreach($steps as $step)
        <div class="d-flex justify-content-center" wire:key="{{$step}}">
            <input type="text" name="step[]" class="item-step" placeholder="{{'Step '.($step+1)}}">
            <a class="fas fa-trash icon-trashStep cursor-hover" wire:click="remove({{$step}})"></a>
        </div>
    @endforeach
    
</div>
