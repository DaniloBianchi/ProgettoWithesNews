<div>
    Counter : {{ $counter}}
    <button wire:click='increment'>+</button>
    <button wire:click="decrement">-</button>
@if($counter)
<div>Eccomi</div>
@endif
</div>
