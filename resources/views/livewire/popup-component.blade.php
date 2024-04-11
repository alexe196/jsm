<div>
    @if($isOpen)
        <div class="popup">
            <!-- Ваше содержимое всплывающего окна -->
            <button wire:click="closePopup">Закрыть</button>
        </div>
    @endif

    <button wire:click="openPopup">Открыть всплывающее окно</button>
</div>
