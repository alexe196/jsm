<section class="text-gray-600 body-font">
    <div class="container flex flex-wrap px-5 py-24 mx-auto items-center">
        <div class="md:w-1/2 md:pr-12 md:py-8 md:border-r md:border-b-0 mb-10 md:mb-0 pb-10 border-b border-gray-200">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Create Tasks</h1>

            <!-- Кнопка-триггер модального окна -->
            <button type="button" class="btn btn-primary" wire:click="showModal">
                Добавить задачу
            </button>


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
            </div>


        </div>
        <div class="flex flex-col md:w-1/2 md:pl-12">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Status Tasks</h1>
            <table class="table table-dark">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Task status</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($tasks  as $index => $item)

                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td class="text-center">{{$item->task_status->name}}</td>
                        <td class="text-center">{{$item->name}}</td>
                        <td class="text-center">{{$item->description}}</td>
                        <td class="text-center">
                            <form wire:submit.prevent="update_status_task('{{ $item->id }}')">
                                <input type="hidden" wire:model="{{$tasks[$index]->id}}">
                                <div class="row">
                                    <div class="col-8 mt-4">
                                        <select class="form-control" wire:key="{{ $item->id }}" required wire:model="task_status_id.{{$item->id}}" >
                                            <option value="">{{ __('Select Status') }}</option>
                                            @foreach ($task_satus_select as $status)
                                                <option {{$item->task_status->id == $status->id ? 'selected' : ''}} wire:key="{{ $status->id }}" value="{{$status->id}}">{{$status->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col mb-4">
                                        <button  class="btn btn-primary" type="submit">
                                            {{ __('edit') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

</section>




