<div class="container mt-5">
    <div class="row align-items-center">
        <div class="col">
            <table class="table table-dark">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Task status</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status Time</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($tasks as $item)
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td class="text-center">{{$item->task_status->name}}</td>
                        <td class="text-center">{{$item->name}}</td>
                        <td class="text-center">{{$item->description}}</td>
                        <td class="text-center">
                            @foreach($item->task_status_time as $stime)
                                <div>
                                    {{$taskstatus[$stime->task_status_id]}} - {{$stime->date}}
                                </div>
                            @endforeach
                        </td>
                        <td class="text-center">
                            <div class="mt-5 md:mt-0 md:col-span-2">
                                <input type="hidden"  wire:model="id" value="{{$item->id}}">
                                <div class="col mt-4">
                                    <button class="btn btn-primary" wire:click="delete({{ $item->id }})">{{ __('Delete') }}</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
