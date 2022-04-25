@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Overview of the month -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Overview of the Month</h4>
                        <ul class="nav nav-pills custom-pills owm" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#users" role="tab"
                                    aria-selected="true">
                                    <span class="text-muted">Users</span>
                                    <h3 class="mb-0 text-dark">15K <span class="text-info font-12"><i
                                                class="mdi mdi-arrow-up"></i>18.6</span></h3>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#revenue" role="tab"
                                    aria-selected="false">
                                    <span class="text-muted">Revenue</span>
                                    <h3 class="mb-0 text-dark">$945 <span class="text-orange font-12"><i
                                                class="mdi mdi-arrow-down"></i>43.6</span></h3>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#conversion" role="tab"
                                    aria-selected="false">
                                    <span class="text-muted">Conversion</span>
                                    <h3 class="mb-0 text-dark">0.23% <span class="text-orange font-12"><i
                                                class="mdi mdi-arrow-down"></i>28.6</span></h3>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="users" role="tabpanel"
                                aria-labelledby="pills-home-tab">
                                <div style="height:400px; width:100%;" class="mt-3 overview1"></div>
                            </div>
                            <div class="tab-pane fade" id="revenue" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <div style="height:300px; width:100%;" class="mt-5 revenue"></div>
                            </div>
                            <div class="tab-pane fade" id="conversion" role="tabpanel" aria-labelledby="pills-contact-tab">
                                <div style="height:400px; width:100%;" class="mt-3 conversation"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Conversation and active users -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- Column -->
            <div class="col-sm-12 col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Conversion Rate</h4>
                        <div style="height:230px; width:100%;" class="mt-3 rate"></div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-sm-12 col-md-6 col-lg-3">
                <div class="card bg-orange">
                    <div class="card-body">
                        <h4 class="card-title text-white">Active Users</h4>
                        <h2 class="text-white">356</h2>
                        <div class="text-center">
                            <div id="activeu" class="mt-4 mb-4"></div>
                            <span class="text-white op-5">Users per Minute</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-sm-12 col-lg-6">
                <div class="card bg-info">
                    <div class="card-body">
                        <h4 class="card-title text-white op-5">Total Earnings</h4>
                        <h2 class="text-white">$6,890.68</h2>
                        <div class="earnings" style="height:145px;"></div>
                        <div class="row">
                            <!-- Column -->
                            <div class="col-sm-12 col-lg-4">
                                <div class="d-flex align-items-center">
                                    <div class="mr-2"><a class="btn btn-circle btn-lg btn-cyan text-white">EA</a></div>
                                    <div class="text-white">
                                        <span class="font-14 op-5 d-block">Product A</span><span
                                            class="font-16 font-medium">$15.56K</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                            <!-- Column -->
                            <div class="col-sm-12 col-lg-4">
                                <div class="d-flex no-block align-items-center">
                                    <div class="mr-2"><a class="btn btn-circle btn-lg btn-cyan text-white">EA</a></div>
                                    <div class="text-white">
                                        <span class="font-14 op-5 d-block">Product B</span><span
                                            class="font-16 font-medium">$15.56K</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                            <!-- Column -->
                            <div class="col-sm-12 col-lg-4">
                                <div class="d-flex no-block align-items-center">
                                    <div class="mr-2"><a class="btn btn-circle btn-lg btn-cyan text-white">EA</a></div>
                                    <div class="text-white">
                                        <span class="font-14 op-5 d-block">Product C</span><span
                                            class="font-16 font-medium">$15.56K</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- table and weather -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-sm-12 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Projects of the Month</h4>
                        <div class="table-responsive">
                            <table class="table v-middle">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">Team Lead</th>
                                        <th class="border-top-0">Project</th>
                                        <th class="border-top-0">Weeks</th>
                                        <th class="border-top-0">Budget</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="mr-2"><img src="/xa/assets/images/users/d1.jpg" alt="user"
                                                        class="rounded-circle" width="45" /></div>
                                                <div class="">
                                                    <h4 class="mb-0 font-16">Hanna Gover</h4><span>hgover@gmail.com</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Elite Admin</td>
                                        <td>35</td>
                                        <td class="font-medium">$96K</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="mr-2"><img src="/xa/assets/images/users/d2.jpg" alt="user"
                                                        class="rounded-circle" width="45" /></div>
                                                <div class="">
                                                    <h4 class="mb-0 font-16 font-medium">Daniel Kristeen</h4>
                                                    <span>Kristeen@gmail.com</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Elite Admin</td>
                                        <td>35</td>
                                        <td class="font-medium">$96K</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="mr-2"><img src="/xa/assets/images/users/d3.jpg" alt="user"
                                                        class="rounded-circle" width="45" /></div>
                                                <div class="">
                                                    <h4 class="mb-0 font-16 font-medium">Julian Josephs</h4>
                                                    <span>Josephs@gmail.com</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Elite Admin</td>
                                        <td>35</td>
                                        <td class="font-medium">$96K</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="mr-2"><img src="/xa/assets/images/users/2.jpg" alt="user"
                                                        class="rounded-circle" width="45" /></div>
                                                <div class="">
                                                    <h4 class="mb-0 font-16 font-medium">Jan Petrovic</h4>
                                                    <span>hgover@gmail.com</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Elite Admin</td>
                                        <td>35</td>
                                        <td class="font-medium">$96K</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="mr-2"><img src="/xa/assets/images/users/d2.jpg" alt="user"
                                                        class="rounded-circle" width="45" /></div>
                                                <div class="">
                                                    <h4 class="mb-0 font-16 font-medium">Daniel Kristeen</h4>
                                                    <span>Kristeen@gmail.com</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Elite Admin</td>
                                        <td>35</td>
                                        <td class="font-medium">$96K</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Temp Guide</h4>
                        <div class="d-flex align-items-center flex-row mt-4">
                            <div class="display-5 text-info"><i class="wi wi-day-showers"></i>
                                <span>73<sup>°</sup></span>
                            </div>
                            <div class="ml-2">
                                <h3 class="mb-0">Saturday</h3><small>Ahmedabad, India</small>
                            </div>
                        </div>
                        <table class="table no-border mini-table mt-3">
                            <tbody>
                                <tr>
                                    <td class="text-muted">Wind</td>
                                    <td class="font-medium">ESE 17 mph</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Humidity</td>
                                    <td class="font-medium">83%</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Pressure</td>
                                    <td class="font-medium">28.56 in</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Cloud Cover</td>
                                    <td class="font-medium">78%</td>
                                </tr>
                            </tbody>
                        </table>
                        <ul class="row list-style-none text-center mt-4">
                            <li class="col-3">
                                <h4 class="text-info"><i class="wi wi-day-sunny"></i></h4>
                                <span class="d-block text-muted">09:30</span>
                                <h3 class="mt-1">70<sup>°</sup></h3>
                            </li>
                            <li class="col-3">
                                <h4 class="text-info"><i class="wi wi-day-cloudy"></i></h4>
                                <span class="d-block text-muted">11:30</span>
                                <h3 class="mt-1">72<sup>°</sup></h3>
                            </li>
                            <li class="col-3">
                                <h4 class="text-info"><i class="wi wi-day-hail"></i></h4>
                                <span class="d-block text-muted">13:30</span>
                                <h3 class="mt-1">75<sup>°</sup></h3>
                            </li>
                            <li class="col-3">
                                <h4 class="text-info"><i class="wi wi-day-sprinkle"></i></h4>
                                <span class="d-block text-muted">15:30</span>
                                <h3 class="mt-1">76<sup>°</sup></h3>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Personal profile and timeline-->
        <!-- ============================================================== -->
        <div class="row">
            <!-- Column -->
            <div class="col-sm-12 col-lg-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="profile-pic mb-3 mt-3">
                            <img src="/xa/assets/images/users/5.jpg" width="150" class="rounded-circle" alt="user" />
                            <h4 class="mt-3 mb-0">Daniel Kristeen</h4>
                            <a href="mailto:danielkristeen@gmail.com">danielkristeen@gmail.com</a>
                        </div>
                        <div class="badge badge-pill badge-light font-16">Dashboard</div>
                        <div class="badge badge-pill badge-light font-16">UI</div>
                        <div class="badge badge-pill badge-light font-16">UX</div>
                        <div class="badge badge-pill badge-info font-16" data-toggle="tooltip" data-placement="top"
                            title="3 more">+3
                        </div>
                    </div>
                    <div class="p-25 border-top mt-3">
                        <div class="row text-center">
                            <div class="col-6 border-right">
                                <a href="#" class="link d-flex align-items-center justify-content-center font-medium"><i
                                        class="mdi mdi-message font-20 mr-1"></i>Message</a>
                            </div>
                            <div class="col-6">
                                <a href="#" class="link d-flex align-items-center justify-content-center font-medium"><i
                                        class="mdi mdi-developer-board font-20 mr-1"></i>Portfolio</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card with image -->
                <div class="card">
                    <img class="card-img-top" src="/xa/assets/images/big/img1.jpg" alt="card">
                    <div class="card-body">
                        <h4 class="card-title">Business development of rules 2018</h4>
                        <span class="label label-danger">Technology</span>
                        <p class="pt-3">I am a very simple card. I am good at containing small bits of information. I am
                            convenient because I require little markup to use effectively.</p>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-sm-12 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Recent Activities</h4>
                        <div class="profiletimeline">
                            <div class="sl-item">
                                <div class="sl-left"><img src="/xa/assets/images/users/1.jpg" alt="user"
                                        class="rounded-circle" /></div>
                                <div class="sl-right">
                                    <div><a href="javascript:void(0)" class="link">John Doe</a> <span class="sl-date">5
                                            minutes ago</span>
                                        <p>assign a new task <a href="javascript:void(0)"> Design weblayout</a></p>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-6 mb-3"><img src="/xa/assets/images/big/img1.jpg"
                                                    alt="" class="img-fluid rounded" /></div>
                                            <div class="col-lg-3 col-md-6 mb-3"><img src="/xa/assets/images/big/img2.jpg"
                                                    alt="" class="img-fluid rounded" /></div>
                                            <div class="col-lg-3 col-md-6 mb-3"><img src="/xa/assets/images/big/img3.jpg"
                                                    alt="" class="img-fluid rounded" /></div>
                                            <div class="col-lg-3 col-md-6 mb-3"><img src="/xa/assets/images/big/img4.jpg"
                                                    alt="" class="img-fluid rounded" /></div>
                                        </div>
                                        <div class="like-comm"><a href="javascript:void(0)" class="link mr-2">2
                                                comment</a> <a href="javascript:void(0)" class="link mr-2"><i
                                                    class="fa fa-heart text-danger"></i> 5 Love</a></div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="sl-item">
                                <div class="sl-left"><img src="/xa/assets/images/users/2.jpg" alt="user"
                                        class="rounded-circle" /></div>
                                <div class="sl-right">
                                    <div><a href="javascript:void(0)" class="link">John Doe</a> <span class="sl-date">5
                                            minutes ago</span>
                                        <div class="mt-3 row">
                                            <div class="col-md-3 col-12"><img src="/xa/assets/images/big/img1.jpg"
                                                    alt="user" class="img-fluid rounded" />
                                            </div>
                                            <div class="col-md-9 col-12">
                                                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec
                                                    odio. Praesent libero. Sed cursus ante dapibus diam. </p> <a
                                                    href="javascript:void(0)" class="btn btn-info"> Design weblayout</a>
                                            </div>
                                        </div>
                                        <div class="like-comm mt-3"><a href="javascript:void(0)" class="link mr-2">2
                                                comment</a> <a href="javascript:void(0)" class="link mr-2"><i
                                                    class="fa fa-heart text-danger"></i> 5 Love</a></div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="sl-item">
                                <div class="sl-left"><img src="/xa/assets/images/users/3.jpg" alt="user"
                                        class="rounded-circle" /></div>
                                <div class="sl-right">
                                    <div><a href="javascript:void(0)" class="link">John Doe</a> <span class="sl-date">5
                                            minutes ago</span>
                                        <p class="mt-2"> Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                            Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi.
                                            Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent
                                            mauris. Fusce nec tellus sed augue semper </p>
                                    </div>
                                    <div class="like-comm mt-3"><a href="javascript:void(0)" class="link mr-2">2
                                            comment</a> <a href="javascript:void(0)" class="link mr-2"><i
                                                class="fa fa-heart text-danger"></i> 5 Love</a></div>
                                </div>
                            </div>
                            <hr>
                            <div class="sl-item">
                                <div class="sl-left"><img src="/xa/assets/images/users/4.jpg" alt="user"
                                        class="rounded-circle" /></div>
                                <div class="sl-right">
                                    <div><a href="javascript:void(0)" class="link">John Doe</a> <span class="sl-date">5
                                            minutes ago</span>
                                        <blockquote class="mt-2">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
