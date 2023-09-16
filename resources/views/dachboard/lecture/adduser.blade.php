@extends('layouts.admin')

@section('styles')
    <!-- Include any CSS styles you need here -->
@endsection

@section('title')
    Add User to Course
@endsection

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('lecture.saveAddUser',$id_co) }}">
            @csrf

           
            <ul class="list-group">
                @foreach($namesNOT as $nameNOT)
                    <li class="list-group-item">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="selected_names[]" value="{{ $nameNOT->id }}" id="name{{ $loop->index }}">
                            <label class="form-check-label" for="name{{ $loop->index }}">
                                {{ $nameNOT->name }}
                            </label>
                        </div>
                    </li>
                @endforeach
            </ul>

         
            <button type="submit" class="btn btn-warning text-dark btn-block mt-2">Add User to Course</button>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var selectedNames = [];
       
        // تفعيل الوظيفة عند تغيير حالة الاختيار
        $('input[type="checkbox"]').change(function() {
            var nameId = $(this).val();
            if ($(this).is(':checked')) {
                selectedNames.push(nameId);
            } else {
               
                selectedNames = selectedNames.filter(function(id) {
                    return id !== nameId;
                });
            }
        });

        // تقديم البيانات عند إرسال النموذج
        $('form').submit(function() {
            $('<input>').attr({
                type: 'hidden',
                name: 'selected_names_array',
                value: JSON.stringify(selectedNames)
            }).appendTo($(this));
            
        });
    </script>
@endsection
