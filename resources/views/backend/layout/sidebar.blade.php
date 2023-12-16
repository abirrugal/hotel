                  {{--  Side bar   --}}
                  <div class="sidebar-menu">
                      <div class="sidebar-header">
                          <div class="logo">
                              <a href="{{ route('admin.index') }}"><img src="{{ asset(auth()->user()->image) }}"
                                      alt="logo"></a>
                          </div>
                      </div>
                      <div class="main-menu mb-4">
                          <div class="menu-inner">
                              <nav>
                                  <ul class="metismenu" id="menu" style="margin-bottom: 130px">
                                      {{--  Room   --}}
                                      <li>
                                          <a href="javascript:void(0)" aria-expanded="true"><i
                                                  class="ti-layout-sidebar-left"></i><span>Room Information
                                              </span></a>
                                          <ul class="collapse">
                                              <li><a href="{{ route('admin.room.create') }}">Add</a></li>
                                              <li><a href="{{ route('admin.room') }}">Manage</a></li>
                                          </ul>
                                      </li>

                                      {{--  Reservation   --}}
                                      <li>
                                          <a href="javascript:void(0)" aria-expanded="true"><i
                                                  class="ti-layout-sidebar-left"></i><span>Reservation
                                              </span></a>
                                          <ul class="collapse">
                                              <li><a href="{{ route('admin.reservation.create') }}">Add</a></li>
                                              <li><a href="{{ route('admin.reservation') }}">Manage</a></li>
                                          </ul>
                                      </li>

                                      {{--  Check In   --}}
                                      <li>
                                          <a href="javascript:void(0)" aria-expanded="true"><i
                                                  class="ti-layout-sidebar-left"></i><span>Check In
                                              </span></a>
                                          <ul class="collapse">
                                              <li><a href="{{ route('admin.check_in.create') }}">Add</a></li>
                                              <li><a href="{{ route('admin.check_in') }}">Manage</a></li>
                                          </ul>
                                      </li>

                                      {{--  Front Desk   --}}
                                      <li>
                                          <a href="javascript:void(0)" aria-expanded="true"><i
                                                  class="ti-layout-sidebar-left"></i><span>Hotel Front Desk
                                              </span></a>
                                          <ul class="collapse">
                                              <li><a href="{{ route('admin.reservation_list') }}">Reservation List</a>
                                              </li>
                                              <li><a href="{{ route('admin.room_list') }}">All Room List</a></li>
                                              <li><a href="{{ route('admin.room.free') }}">Free Room Info</a></li>
                                              <li><a href="{{ route('admin.check_in_list') }}">Check In List</a></li>
                                              <li><a href="{{ route('admin.check_out.list') }}">Check Out List</a></li>
                                          </ul>
                                      </li>

                                      {{--  Voucher   --}}
                                      <li>
                                          <a href="javascript:void(0)" aria-expanded="true"><i
                                                  class="ti-layout-sidebar-left"></i><span>Voucher
                                              </span></a>
                                          <ul class="collapse">
                                              {{--  <li><a href="{{route('admin.voucher.create')}}">Add</a></li>  --}}
                                              <li><a href="{{ route('admin.voucher') }}">Active Voucher</a></li>
                                              <li><a href="{{ route('admin.voucher.inactive') }}">Inactive Voucher</a>
                                              </li>
                                              <li><a href="{{ route('admin.trans_mode') }}">Trans Mode</a></li>
                                              <li><a href="{{ route('admin.voucher_type') }}">Voucher type</a></li>
                                          </ul>
                                      </li>

                                      {{--  Account   --}}
                                      <li>
                                          <a href="javascript:void(0)" aria-expanded="true"><i
                                                  class="ti-layout-sidebar-left"></i><span>Accounts
                                              </span></a>
                                          <ul class="collapse">
                                              <li><a href="{{ route('admin.collect') }}">Room wise Collection
                                                      Deatail</a>
                                              </li>
                                              <li><a href="{{ route('admin.balance.sheet') }}">Balance Sheet</a></li>
                                              <li><a href="{{ route('admin.total_balance.sheet') }}">Total Balance
                                                      Sheet</a>
                                              </li>
                                              <li><a href="{{ route('admin.voucher.list') }}">Voucher List</a></li>
                                              <li><a href="{{ route('admin.expense') }}">Expense List</a></li>
                                          </ul>
                                      </li>

                                      {{--  Employee   --}}
                                      <li>
                                          <a href="javascript:void(0)" aria-expanded="true"><i
                                                  class="ti-layout-sidebar-left"></i><span>HR
                                              </span></a>
                                          <ul class="collapse">
                                              {{--  <li><a href="{{route('admin.employee.create')}}">Add</a></li>  --}}
                                              <li><a href="{{ route('admin.employee') }}">Active Employee</a></li>
                                              <li><a href="{{ route('admin.employee.list') }}">Inactive Employee</a>
                                              </li>
                                              <li><a href="{{ route('admin.salary') }}">Salary</a></li>
                                          </ul>
                                      </li>

                                      {{--  All Room Info   --}}
                                      <li>
                                          <a href="{{ route('admin.room_info') }}" aria-expanded="true"><i
                                                  class="ti-layout-sidebar-left"></i><span>All Room Information
                                              </span></a>
                                      </li>
                                      {{--  Room Clean Status   --}}
                                      <li>
                                          <a href="javascript:void(0)" aria-expanded="true"><i
                                                  class="ti-layout-sidebar-left"></i><span>Room Clean Status
                                              </span></a>
                                          <ul class="collapse">
                                              {{--  <li><a href="{{route('admin.room_clean.create')}}">Add</a></li>  --}}
                                              <li><a href="{{ route('admin.room_clean') }}">Manage</a></li>
                                          </ul>
                                      </li>
                                      {{--  Create User   --}}

                                      @if (Illuminate\Support\Facades\Auth::check() && auth()->user()->role_as === 'superadmin')
                                          <li>
                                              <a href="javascript:void(0)" aria-expanded="true"><i
                                                      class="ti-layout-sidebar-left"></i><span>Create User
                                                  </span></a>
                                              <ul class="collapse">

                                                  <li><a href="{{ route('admin.account') }}">Add</a></li>
                                                  <li><a href="{{ route('admin.user') }}">Manage</a></li>
                                              </ul>
                                          </li>
                                      @endif

                                      {{--  Create User Branch  --}}

                                      @if (Illuminate\Support\Facades\Auth::check() && auth()->user()->role_as === 'branch')
                                          <li>
                                              <a href="javascript:void(0)" aria-expanded="true"><i
                                                      class="ti-layout-sidebar-left"></i><span>Create User
                                                  </span></a>
                                              <ul class="collapse">
                                                  <li><a href="{{ route('admin.branch.create') }}">Add</a></li>
                                                  <li><a href="{{ route('admin.branch.user') }}">Manage</a></li>
                                              </ul>
                                          </li>
                                      @endif
                                      {{--  Create Branch   --}}
                                      @if (Illuminate\Support\Facades\Auth::check() && auth()->user()->role_as === 'superadmin')
                                          <li>
                                              <a href="javascript:void(0)" aria-expanded="true"><i
                                                      class="ti-layout-sidebar-left"></i><span>Create Branch
                                                  </span></a>
                                              <ul class="collapse">
                                                  <li><a href="{{ route('admin.branch.new') }}">Add</a></li>
                                                  <li><a href="{{ route('admin.branch.list') }}">Manage</a></li>
                                              </ul>
                                          </li>
                                      @endif
                                  </ul>
                              </nav>
                          </div>
                      </div>
                  </div>
                  {{--  End Side menu  --}}
