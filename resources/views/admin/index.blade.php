@extends('admin.admin_master')
@section('title', 'Dashboard')
@section('admin')
<div class="page-content">
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2 row-cols-xxl-4">
        <div class="col">
            <div class="card radius-10 bg-gradient-cosmic">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="me-auto">
                            <p class="mb-0 text-white">Total Vacant Rooms</p>
                            <h4 class="my-1 text-white">4805</h4>
                            <p class="mb-0 font-13 text-white">+2.5% from last week</p>
                        </div>
                        <div id="chart1"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-gradient-ibiza">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="me-auto">
                            <p class="mb-0 text-white">Total Allocated Rooms</p>
                            <h4 class="my-1 text-white">847</h4>
                            <p class="mb-0 font-13 text-white">+5.4% from last week</p>
                        </div>
                        <div id="chart2"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-gradient-ohhappiness">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="me-auto">
                            <p class="mb-0 text-white">Pending Approval</p>
                            <h4 class="my-1 text-white">34.6%</h4>
                            <p class="mb-0 font-13 text-white">-4.5% from last week</p>
                        </div>
                        <div id="chart3"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-gradient-kyoto">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="me-auto">
                            <p class="mb-0 text-dark">Approved Rooms</p>
                            <h4 class="my-1 text-dark">810</h4>
                            <p class="mb-0 font-13 text-dark">+8.4% from last week</p>
                        </div>
                        <div id="chart4"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Application Overview</h6>
                        </div>
                        <div class="dropdown ms-auto">
                            <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:;">Action</a>
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="d-flex align-items-center ms-auto font-13 gap-2 my-3">
                        <span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1 text-info"></i>Estates</span>
                        <span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1 text-danger"></i>Rooms</span>
                    </div>
                    <div class="chart-container-1">
                        <canvas id="chart5"></canvas>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 g-0 row-group text-center border-top">
                    <div class="col">
                        <div class="p-3">
                            <h4 class="mb-0">1680</h4>
                            <small class="mb-0">Total Rooms <span> <i class="bx bx-up-arrow-alt align-middle"></i> 2.43%</span></small>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3">
                            <h4 class="mb-0">856</h4>
                            <small class="mb-0">Total Rooms Allocated per Week <span> <i class="bx bx-up-arrow-alt align-middle"></i> 12.65%</span></small>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3">
                            <h4 class="mb-0">2400</h4>
                            <small class="mb-0">Total Rooms Allocated per Month <span> <i class="bx bx-up-arrow-alt align-middle"></i> 5.62%</span></small>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3">
                            <h4 class="mb-0">4,562</h4>
                            <small class="mb-0">Total Rooms Allocated Year  <span> <i class="bx bx-up-arrow-alt align-middle"></i> 12.62%</span></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->

</div>
@endsection
