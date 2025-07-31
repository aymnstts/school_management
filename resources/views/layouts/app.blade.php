<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            padding: 48px 0 0;
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
        }
        .sidebar-sticky {
            position: relative;
            top: 0;
            height: calc(100vh - 48px);
            padding-top: .5rem;
            overflow-x: hidden;
            overflow-y: auto;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="{{ route('dashboard') }}">EasySC</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="ml-auto d-flex align-items-center">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="form-inline">
                @csrf
                <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
            </form>
        </div>
    </nav>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <div id="app">
        @yield('content')
    </div>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <div class="sidebar-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('dashboard') }}">
                                <i class="fas fa-tachometer-alt"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle" href="#userManagementSubmenu" data-toggle="collapse" aria-expanded="false">
                                <i class="fas fa-users"></i>
                                User Management
                            </a>
                            <ul class="collapse list-unstyled" id="userManagementSubmenu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('users.create') }}">
                                        <i class="fas fa-user-plus"></i>
                                        Add User
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('usersView') }}">
                                        <i class="fas fa-user"></i>
                                        View Users
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle" href="#studentManagementSubmenu" data-toggle="collapse" aria-expanded="false">
                                <i class="fas fa-user-graduate"></i>
                                Student Management
                            </a>
                            <ul class="collapse list-unstyled" id="studentManagementSubmenu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('students.create') }}">
                                        <i class="fas fa-user-plus"></i>
                                        Add Student
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('students.index') }}">
                                        <i class="fas fa-user"></i>
                                        View Students
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle" href="#classManagementSubmenu" data-toggle="collapse" aria-expanded="false">
                                <i class="fas fa-chalkboard"></i>
                                Class Management
                            </a>
                            <ul class="collapse list-unstyled" id="classManagementSubmenu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('classes.create') }}">
                                        <i class="fas fa-plus"></i>
                                        Add Class
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('classes.index') }}">
                                        <i class="fas fa-list"></i>
                                        View Classes
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle" href="#courseManagementSubmenu" data-toggle="collapse" aria-expanded="false">
                                <i class="fas fa-book"></i>
                                Program Courses
                            </a>
                            <ul class="collapse list-unstyled" id="courseManagementSubmenu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('courses.create') }}">
                                        <i class="fas fa-plus"></i>
                                        Add Course
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('courses.index') }}">
                                        <i class="fas fa-list"></i>
                                        View Courses
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle" href="#attendanceManagementSubmenu" data-toggle="collapse" aria-expanded="false">
                                <i class="fas fa-calendar-check"></i>
                                Attendance Management
                            </a>
                            <ul class="collapse list-unstyled" id="attendanceManagementSubmenu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('attendances.create') }}">
                                        <i class="fas fa-plus"></i>
                                        Record Attendance
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('attendances.index') }}">
                                        <i class="fas fa-list"></i>
                                        View Attendances
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle" href="#timetablesSubMenu" data-toggle="collapse" aria-expanded="false">
                                <i class="fas fa-calendar-alt"></i>
                                Timetable Management
                            </a>
                            <ul class="collapse list-unstyled" id="timetablesSubMenu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('timetables.index') }}">
                                        <i class="fas fa-list"></i>
                                        Manage Timetables
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('timetables.create') }}">
                                        <i class="fas fa-plus"></i>
                                        Create Timetable
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                        
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle" href="#teachersManagementSubmenu" data-toggle="collapse" aria-expanded="false">
                                <i class="fas fa-chalkboard-teacher"></i>
                                Teachers Management
                            </a>
                            <ul class="collapse list-unstyled" id="teachersManagementSubmenu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('teachers.create') }}">
                                        <i class="fas fa-plus"></i>
                                        Add Teacher
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('teachers.index') }}">
                                        <i class="fas fa-list"></i>
                                        View Teachers
                                    </a>
                                </li>
                        
                    </ul>
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle" href="#messageManagementSubmenu" data-toggle="collapse" aria-expanded="false">
                                <i class="fas fa-envelope"></i>
                                Message Management
                            </a>
                            <ul class="collapse list-unstyled" id="messageManagementSubmenu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('messages.create') }}">
                                        <i class="fas fa-plus"></i>
                                        Send Message
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('messages.index') }}">
                                        <i class="fas fa-list"></i>
                                        View Messages
                                    </a>
                                </li>
                            </ul>
                        </li>

                </div>
            </nav>
        </div>
    </div>
    
    
</body>


</html>