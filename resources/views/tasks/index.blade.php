@extends('layouts.app')
 
@section('content')
<div class="d-flex flex-column">
    <div style="width: 85%" class="card my-2 align-self-center">
        <div class="card-header">
            New Task
        </div>
        <div class="card-body">
            <!-- Display Validation Errors -->
            @include('common.errors')
    
            <!-- New Task Form -->
            <form action="{{ url('task') }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}
    
                <!-- Task Name -->
                <div class="form-group mb-2">
                    <label for="task-name" class="col-sm-3 form-label">Task</label>
    
                    <div class="col-sm-6">
                        <input type="text" name="name" id="task-name" class="form-control">
                    </div>
                </div>
    
                <!-- Add Task Button -->
                <div class="form-group mb-2">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Add Task
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @if (count($tasks) > 0)
        <div style="width: 85%" class="card my-2 align-self-center">
            <div class="card-header">
                Current Tasks
            </div>
 
            <div class="card-body">
                <table class="table table-striped task-table">
 
                    <!-- Table Headings -->
                    <thead>
                        <th>Task</th>
                        <th>&nbsp;</th>
                    </thead>
 
                    <!-- Table Body -->
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $task->name }}</div>
                                </td>
 
                                <td>
                                    <form class="d-flex justify-content-end" action="{{ url('task/'.$task->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                             
                                        <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-danger">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
@endsection