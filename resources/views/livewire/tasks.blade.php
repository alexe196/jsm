<section class="text-gray-600 body-font">
    <div class="container flex flex-wrap px-5 py-24 mx-auto items-center">
        <div class="md:w-1/2 md:pr-12 md:py-8 md:border-r md:border-b-0 mb-10 md:mb-0 pb-10 border-b border-gray-200">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Pitchfork Kickstarter Taxidermy</h1>

            <form wire:submit="save">
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="col-span-6 sm:col-span-4">
                        <select wire:model="task_status_id" >
                            <option value="">{{ __('Select Status') }}</option>
                            @foreach ($tasstatus as $item)
                                <option wire:key="{{ $item->id }}" value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
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

                    <div class="col-span-6 sm:col-span-4">
                        <x-button> {{ __('Save') }} </x-button>
                    </div>
                </div>
            </form>

        </div>
        <div class="flex flex-col md:w-1/2 md:pl-12">
            <h2 class="title-font font-semibold text-gray-800 tracking-wider text-sm mb-3">Tasks</h2>
            <table class="table table-dark">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Task status</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($tasks as $item)
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->task_status_id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->description}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>




