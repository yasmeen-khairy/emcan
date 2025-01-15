@include('inc.head')

<body>
    <div class="container-scroller">

        @include('inc.sidebar')
        @include('inc.nav')

        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Assign Form</h4>
                    <p class="card-description">Assign To {{ $course->title }} Course</p>
                    <form class="forms-sample" action="{{ route('course.application', $course->id) }}" method="POST">
                        @csrf

                        <!-- Name Input -->
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" id="exampleInputUsername2"
                                    placeholder="Username" value="{{ old('name') }}">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Email Input -->
                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" name="email" class="form-control" id="exampleInputEmail2"
                                    placeholder="Email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Message Input -->
                        <div class="form-group">
                            <label for="exampleTextarea1">Message</label>
                            <textarea class="form-control" name="message" id="exampleTextarea1" rows="4">{{ old('message') }}</textarea>
                            @error('message')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button type="reset" class="btn btn-dark">Cancel</button>
                    </form>
                </div>
            </div>
        </div>



        @include('inc.scripts')
        <script src="{{ asset('dashboard/assets/js/ajax.js') }}"></script>

</body>

</html>
