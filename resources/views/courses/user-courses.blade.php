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
                                    <th>Course Title</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Acions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($courses as $course)
                                    <tr id="tr{{ $course->course->id }}">
                                        <td>{{ $course->course->title }}</td>
                                        <td>{{ $course->course->start_date }}</td>
                                        <td>{{ $course->course->end_date }}</td>
                                        <td>
                                            <a href="{{ route('course.show', $course->course->id) }}"
                                                class="btn btn-primary btn-sm">Details</a>
                                            <a href="javascript:void(0)" onclick="unassign({{ $course->course->id }})"
                                                class="btn btn-danger btn-sm"> Unassign</a>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td id="td">Sorry, no courses found</td>
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
