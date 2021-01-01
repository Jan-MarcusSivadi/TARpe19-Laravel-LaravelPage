<div>
    <h2 class="d-flex justify-content-center" style="padding-top: 1rem">
        Add steps if required
        <div class="buttons">
            <a class="fas fa-plus icon-addStep cursor-hover" wire:click="increment" ></a>
        </div>
    </h2>

    @for($i = 0; $i < $steps; $i++)
        <div class="d-flex justify-content-center">
            <input type="text" name="title" class="item-step" placeholder="Step {{$i+1}}">
            <a class="fas fa-trash icon-trashStep cursor-hover"></a>
        </div>
    @endfor
    
</div>
