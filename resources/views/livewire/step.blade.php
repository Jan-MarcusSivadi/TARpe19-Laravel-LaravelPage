<div>
    <h2 class="d-flex justify-content-center" style="padding-top: 1rem">
        Add steps if required
        <div class="buttons">
            <a class="fas fa-plus icon-addStep cursor-hover" wire:click="increment" ></a>
        </div>
    </h2>

    @foreach($steps as $step)
        <!-- Note: this is my workaround for the delete button error.-->
        @if($loop->last)
            <div class="d-flex justify-content-center">
                <input type="text" name="step[]" class="item-step" placeholder="{{'Step '.($step)}}">
                <a class="fas fa-trash icon-trashStep cursor-hover" wire:click="remove({{$step}})"></a>
            </div>
        @else
            <div class="d-flex justify-content-center">
                <input type="text" name="step[]" class="item-step" placeholder="{{'Step '.($step)}}">
                <a class="fas fa-trash icon-trashStep cursor-hover" style="visibility: hidden;"></a>
            </div>
        @endif
    @endforeach
    
</div>
