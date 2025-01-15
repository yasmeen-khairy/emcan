@include('inc.head')

<body>
    <div class="container-scroller">

        @include('inc.sidebar')
        @include('inc.nav')

        <div class="container-fluid page-body-wrapper">
            <div class="container-fluid page-body-wrapper">
                <div class="main-panel">
                    <div class="row">

                        <table id="myTable" class="display">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr id="tr">
                                        <td id="td">{{ $user->name }}</td>
                                        <td id="td">{{ $user->email }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="1">Sorry, no users found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

        @include('inc.scripts')
        <script>
            $(document).ready(function() {
                // Initialize DataTable using jQuery method
                let table = $('#myTable').DataTable();
            });
        </script>

</body>

</html>
