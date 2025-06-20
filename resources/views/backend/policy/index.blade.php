<!doctype html>
<html lang="en">

<head>
    @include('components.backend.head')
</head>

<body>
    @include('components.backend.header')

    <!--start sidebar wrapper-->
    @include('components.backend.sidebar')
    <!--end sidebar wrapper-->

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6"></div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('terms-and-conditions.index') }}">
                                    <svg class="stroke-icon">
                                        <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                                    </svg>
                                </a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <!-- Table Section Starts -->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('terms-and-conditions.index') }}">Home</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">Home Details</li>
                                    </ol>
                                </nav>

                                <a href="{{ route('terms-and-conditions.create') }}" class="btn btn-primary px-5 radius-30">
                                    + Add Terms & Conditions Details
                                </a>
                            </div>

                            <div class="table-responsive custom-scrollbar">
                                <table class="display" id="basic-1">
                                    <thead>
                                        <tr>
                                            <th>Heading</th>
                                            <th>Banner</th>
                                            <th>Description</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($policyDetails as $item)
                                            <tr>
                                                <td>{{ $item->banner_heading }}</td>
                                                <td>
                                                    @if($item->banner_image)
                                                        <img src="{{ asset($item->banner_image) }}" style="height: 50px;">
                                                    @else
                                                        <span class="text-muted">No Image</span>
                                                    @endif
                                                </td>
                                                <td>{!! Str::limit(strip_tags($item->banner_title), 100) !!}</td>
                                                <td>
                                                    <a href="{{ route('terms-and-conditions.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                    <form action="{{ route('terms-and-conditions.destroy', $item->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Table Section Ends -->
            </div>
       
        <!-- Container-fluid ends-->

    </div>
</div>
        @include('components.backend.footer')

    @include('components.backend.main-js')
</body>

</html>
