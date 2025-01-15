@include('inc.head')

<body>
    <div class="container-scroller">

        @include('inc.sidebar')
        @include('inc.nav')

        <div class="container-fluid page-body-wrapper">
            <div class="container-fluid page-body-wrapper">
                <div class="main-panel">

                    <div class="row">

                        <form action="{{ route('course.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" value="{{ old('title') }}"
                                    class="form-control @error('title') is-invalid @enderror" id="title"
                                    placeholder="Enter title">
                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" name="description" value="{{ old('description') }}"
                                    class="form-control @error('description') is-invalid @enderror" id="description"
                                    placeholder="Description">
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="startDate">Start date</label>
                                <input type="date" name="start_date" value="{{ old('start_date') }}"
                                    class="form-control @error('start_date') is-invalid @enderror" id="startDate">
                                @error('start_date')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="endDate">End date</label>
                                <input type="date" name="end_date" value="{{ old('end_date') }}"
                                    class="form-control @error('end_date') is-invalid @enderror" id="endDate">
                                @error('end_date')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        @include('inc.scripts')

</body>

</html>
