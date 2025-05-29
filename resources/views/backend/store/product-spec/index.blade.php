<!doctype html>
<html lang="en">
    
<head>
    @include('components.backend.head')
</head>
	   
		@include('components.backend.header')

	    <!--start sidebar wrapper-->	
	    @include('components.backend.sidebar')
	   <!--end sidebar wrapper-->

    
     <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">                                       
                        <svg class="stroke-icon">
                          <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <!-- Zero Configuration  Starts-->
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('product-specifications.index') }}">Product Specifications</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Product Specifications</li>
                            </ol>
                        </nav>

                        <a href="{{ route('product-specifications.create') }}" class="btn btn-primary px-5 radius-30">+ Add Product Specifications</a>
                    </div>

                    <div class="text-end mb-3">
                        <input type="text" id="specSearch" placeholder="Search..." class="form-control" style="max-width: 300px; display: inline-block;">
                    </div>

                    
                    <div class="table-responsive custom-scrollbar">
                    @php
                        // Group by product name first
                        $groupedByProduct = collect($specs)->groupBy(function($item) {
                            return $item->product->product_name ?? 'Unknown Product';
                        });
                        $row = 1;
                    @endphp

                    <table class="table table-bordered display" id="basic-1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Case Style</th>
                                <th>Specification Part</th>
                                <th>Manufacturer</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($groupedByProduct as $productName => $productGroup)
                                <tr>
                                    <td colspan="6" style="font-weight: bold; background-color: #f2f2f2;">{{ $productName }}</td>
                                </tr>

                                @php
                                    // Within each product group, group by case style
                                    $groupedByCaseStyle = $productGroup->groupBy('case_style');
                                @endphp

                                @foreach ($groupedByCaseStyle as $caseStyle => $caseGroup)
                                    <tr>
                                        <td colspan="6" style="font-weight: bold; padding-left: 20px; background-color: #e9ecef;">
                                            Case Style: {{ $caseStyle }}
                                        </td>
                                    </tr>

                                    @foreach ($caseGroup as $spec)
                                        <tr class="data-row" data-search="{{ strtolower($productName . ' ' . $caseStyle . ' ' . $spec->name . ' ' . $spec->manufacturer) }}">
                                            
                                            <td>{{ $row++ }}</td>
                                            <td>{{ $productName }}</td>
                                            <td>{{ $caseStyle }}</td>
                                            <td>{{ $spec->name }}</td>
                                            <td>{{ $spec->manufacturer }}</td>
                                            <td>
                                                <a href="{{ route('product-specifications.edit', $spec->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                <form action="{{ route('product-specifications.destroy', $spec->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>


                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
            <!-- footer start-->
             @include('components.backend.footer')
      </div>
    </div>

        @include('components.backend.main-js')
        

        <script>
            // document.getElementById('specSearch').addEventListener('input', function () {
            //     const searchVal = this.value.trim().toLowerCase();
            //     const rows = document.querySelectorAll('.data-row');

            //     rows.forEach(row => {
            //         const text = row.getAttribute('data-search');
            //         row.style.display = text.includes(searchVal) ? '' : 'none';
            //     });

            //     // Optional: hide group headers if all their child rows are hidden
            //     document.querySelectorAll('.group-header, .case-header').forEach(header => {
            //         let nextRow = header.nextElementSibling;
            //         let shouldShow = false;

            //         while (nextRow && !nextRow.classList.contains('group-header') && !nextRow.classList.contains('case-header')) {
            //             if (nextRow.classList.contains('data-row') && nextRow.style.display !== 'none') {
            //                 shouldShow = true;
            //                 break;
            //             }
            //             nextRow = nextRow.nextElementSibling;
            //         }

            //         header.style.display = shouldShow ? '' : 'none';
            //     });
            // });


            document.getElementById('specSearch').addEventListener('input', function () {
    const searchVal = this.value.trim().toLowerCase();
    const rows = document.querySelectorAll('.data-row');

    rows.forEach(row => {
        const text = row.getAttribute('data-search');
        row.style.display = text.includes(searchVal) ? '' : 'none';
    });

    // Hide headers if no matching rows
    document.querySelectorAll('.group-header, .case-header').forEach(header => {
        let nextRow = header.nextElementSibling;
        let shouldShow = false;

        while (nextRow && !nextRow.classList.contains('group-header') && !nextRow.classList.contains('case-header')) {
            if (nextRow.classList.contains('data-row') && nextRow.style.display !== 'none') {
                shouldShow = true;
                break;
            }
            nextRow = nextRow.nextElementSibling;
        }

        header.style.display = shouldShow ? '' : 'none';
    });
});

        </script>

</body>

</html>