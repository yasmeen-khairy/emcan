@include('inc.head')

<body>
    <div class="container-scroller">

        @include('inc.sidebar')
        @include('inc.nav')
        <div class="col-lg-9 grid-margin stretch-card">
            <div class="card">
                <div style="margin-top: 70px" class="card-body">
                    <div class="table-responsive">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @elseif (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Start date</th>
                                    <th>End date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($courses as $course)
                                    <tr id="tr{{ $course->id }}">
                                        <td>{{ $course->title }}</td>
                                        <td>{{ $course->start_date }}</td>
                                        <td>{{ $course->end_date }}</td>
                                        <td>
                                            @if (Auth::user()->isAdmin())
                                                <a href="{{ route('course.show', $course->id) }}"
                                                    class="btn btn-primary btn-sm">Details</a>
                                                <a href="{{ route('course.edit', $course->id) }}"
                                                    class="btn btn-success btn-sm">Update</a>
                                                <a href="javascript:void(0)" onclick="deleteCourse({{ $course->id }})"
                                                    class="btn btn-danger btn-sm">Delete</a>
                                            @else
                                                <a href="{{ route('course.show', $course->id) }}"
                                                    class="btn btn-primary btn-sm">Details</a>
                                                <a href="{{ route('course.application-form', $course->id) }}"
                                                    class="btn btn-success btn-sm">Assign Course</a>
                                            @endif

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>Sorry, no courses found</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>

                    </div>
                    {{ $courses->links() }}
                </div>
            </div>
        </div>

        @include('inc.scripts')
        <script src="{{ asset('dashboard/assets/js/ajax.js') }}"></script>

</body>

</html>
