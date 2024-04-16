<div>
    @if($showingModal)
        <!-- Модальное окно -->
            <div class="modal" style="display: block;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ADD TASK</h5>
                            <button type="button" class="btn-close" wire:click="hideModal"></button>
                        </div>
                        <div class="modal-body">
                            <form wire:submit="add_task">
                                <div class="mt-5 md:mt-0 md:col-span-2">
                                    <!-- Name -->
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-label for="name" value="{{ __('Name') }}" />
                                        <x-input id="name" type="text" class="mt-1 block w-full" wire:model="name" required autocomplete="name" />
                                        <x-input-error for="name" class="mt-2" />
                                    </div>

                                    <!-- Description -->
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-label for="description" value="{{ __('Description') }}" />
                                        <x-input id="description" type="text" class="mt-1 block w-full" wire:model="description" required autocomplete="description" />
                                        <x-input-error for="description" class="mt-2" />
                                    </div>
                                    <div class="col mt-4">
                                        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" wire:click="hideModal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>
    @endif

    <button wire:click="showModal">Открыть всплывающее окно</button>
</div>
