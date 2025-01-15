@include('inc.head')

<body>
    <div class="container-scroller">

        @include('inc.sidebar')
        @include('inc.nav')

        <div class="container-fluid page-body-wrapper">
            <div class="container-fluid page-body-wrapper">
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <!-- Course Details Card -->
                        <div class="col-md-8">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="card shadow-lg">
                                <div class="card-header text-center bg-primary text-white">
                                    <h3>Course Details</h3>
                                </div>
                                <div class="card-body">
                                    <!-- Course Information -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="title"><strong>Title</strong></label>
                                                <p id="title">{{ $course->title }}</p>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="description"><strong>Description</strong></label>
                                                <p id="description">{{ $course->description }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="startDate"><strong>Start Date</strong></label>
                                                <p id="startDate">
                                                    {{ \Carbon\Carbon::parse($course->start_date)->format('F j, Y') }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="endDate"><strong>End Date</strong></label>
                                                <p id="endDate">
                                                    {{ \Carbon\Carbon::parse($course->end_date)->format('F j, Y') }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Buttons -->
                                    <div class="d-flex justify-content-between mt-4">
                                        <a href="{{ route('course.index') }}" class="btn btn-secondary btn-sm">Back to
                                            Courses</a>
                                        @if (Auth::user()->isAdmin())
                                        <a href="{{ route('course.edit', $course->id) }}"
                                            class="btn btn-primary btn-sm">Update Course</a>
                                        @else
                                        <a href="{{ route('course.application-form', $course->id) }}"
                                            class="btn btn-success btn-sm">Assign Course</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('inc.scripts')
        <script>
            $(document).ready(function() {
                let table = $('#myTable').DataTable();
            });
        </script>
        <script src="{{ asset('dashboard/assets/js/ajax.js') }}"></script>
</body>

</html>
