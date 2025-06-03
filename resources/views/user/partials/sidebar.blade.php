<!-- Sidebar -->
<div id="sidebar" class="sidebar">
    <a href="javascript:void(0)" class="close-btn" onclick="closeSidebar()">&times;</a>
    <div class="sidebar-header">
        <img src="{{asset('static/logo.png')}}" alt="logo">
    </div>
    <a href="{{ route('home') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
    <a href="{{ route('deposit') }}"><i class="fas fa-money-bill-wave"></i> Deposit</a>
    <a href="{{ route('withdraw') }}"><i class="fas fa-credit-card"></i> Withdrawal</a>
    <a href="{{ route('invest') }}"><i class="fas fa-chart-line"></i> Invest</a>
    <a href="{{ route('transactions') }}"><i class="fas fa-history"></i> Transaction History</a>
    <a href="{{ route('profile') }}"><i class="fas fa-user"></i> Profile</a>
    <a href="{{ route('settings') }}"><i class="fas fa-cog"></i> Settings</a>
    <a href="{{ route('verification') }}"><i class="fas fa-check-circle"></i> Account Verification</a>
    <a href="{{ route('user.logout') }}"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fas fa-sign-out-alt"></i> Logout
    </a>
    <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>

<!-- Overlay -->
<div id="overlay" class="overlay" onclick="closeSidebar()"></div>

<style>
    /* Sidebar styles */
    .sidebar {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1000;
        top: 0;
        left: 0;
        background-color: #000;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
        border-right: 1px solid #333;
    }

    .sidebar a {
        padding: 15px 25px;
        text-decoration: none;
        font-size: 18px;
        color: #dbdbdb;
        display: block;
        transition: 0.3s;
        border-bottom: 1px solid #333;
    }

    .sidebar a:hover {
        color: #fff;
        background-color: #333;
    }

    .sidebar .close-btn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
        color: #dbdbdb;
    }

    .sidebar-header {
        padding: 20px;
        text-align: center;
        border-bottom: 1px solid #333;
    }

    .sidebar-header img {
        width: 150px;
    }

    /* Overlay styles */
    .overlay {
        display: none;
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 999;
        cursor: pointer;
    }
</style>

<script>
    function openSidebar() {
        document.getElementById("sidebar").style.width = "250px";
        document.getElementById("overlay").style.display = "block";
    }

    function closeSidebar() {
        document.getElementById("sidebar").style.width = "0";
        document.getElementById("overlay").style.display = "none";
    }

    // Close sidebar when clicking outside
    window.addEventListener('click', function(event) {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        if (event.target === overlay) {
            closeSidebar();
        }
    });
</script>